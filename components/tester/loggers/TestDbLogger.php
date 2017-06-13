<?php
/**
 * ${FILE_NAME}
 *
 * PHP version 7
 *
 * @category   CategoryName
 * @package    PackageName
 * @author     unklefedor
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    SVN: $Id$
 * @link       http://breadhead.ru
 */

namespace app\components\tester\loggers;

use app\components\tester\checkers\TestResponseCheckerInterface;
use yii\data\ActiveDataProvider;
use yii\db\cubrid\Schema;
use yii\db\Query;
use yii\helpers\ArrayHelper;

/** TestDbLogger
 *
 * Class TestDbLogger
 *
 * @package app\components\tester\loggers
 */
class TestDbLogger implements TestLoggerInterface
{
    private $db = null;
    private $tableName = 'monitor_test_log';

    /** @var TestResponseCheckerInterface $checker */
    private $checker = null;

    /**
     * TestDbLogger constructor.
     */
    public function __construct()
    {
        $this->db = \Yii::$app->getDb();

        $this->dbCheck();
    }

    /**
     * dbCheck
     *
     * @return void
     */
    private function dbCheck()
    {
        if (!$this->db->getTableSchema($this->tableName)) {
            $this->createTable();
        }
    }
    /**
     * createTable
     *
     * @return void
     */
    private function createTable()
    {
        $this->db->createCommand()->createTable($this->tableName, [
            'id' => Schema::TYPE_PK,
            'checker' => Schema::TYPE_STRING,
            'url' => Schema::TYPE_STRING,
            'text' => Schema::TYPE_STRING,
            'level' => Schema::TYPE_STRING,
            'content' => Schema::TYPE_STRING,
            'timestamp' => Schema::TYPE_INTEGER
        ])->execute();
    }

    /**
     * setError
     *
     * @return void
     */
    private function setError()
    {
        if ($this->checker->getError()) {
            $this->setLog([
                'level' => 'error',
                'text' => $this->checker->getError()
            ]);
        }
    }

    /**
     * setWarn
     *
     * @return void
     */
    private function setWarn()
    {
        if ($this->checker->getWarn()) {
            $this->setLog([
                'level' => 'warn',
                'text' => $this->checker->getWarn()
            ]);
        }
    }

    /**
     * setDebug
     *
     * @return void
     */
    private function setDebug()
    {
        if ($this->checker->getDebug()) {
            $this->setLog([
                'level' => 'debug',
                'text' => $this->checker->getDebug()
            ]);
        }
    }

    /**
     * setLog
     *
     * @param $data
     *
     * @return void
     */
    private function setLog($data)
    {
        $params = [
            'checker' => $this->checker->getClass(),
            'url' => $this->checker->getUrl(),
            'timestamp' => time(),
            'content' => $this->checker->getContent()
        ];

        $data = array_merge($data, $params);
        $this->addLogEntity($data);
    }

    /**
     * @param array $filter
     */
    private function deleteLog(array $filter)
    {
        if (!empty($filter)) {
            $this->deleteLogEntity($filter);
        }
    }

    /**
     * addLogEntity
     *
     * @param $data
     *
     * @return void
     */
    private function addLogEntity($data)
    {
        $this->db->createCommand()->insert($this->tableName, $data)->execute();
    }

    /**
     * @param $cond
     */
    private function deleteLogEntity($cond)
    {
        $this->db->createCommand()->delete($this->tableName, $cond)->execute();
    }

    /**
     * setErrorState
     *
     * @param TestResponseCheckerInterface $checker
     *
     * @return void
     */
    public function setErrorState(TestResponseCheckerInterface $checker)
    {
        $this->checker = $checker;

        $this->setError();
        $this->setWarn();
        $this->setDebug();
    }

    /**
     *
     */
    public function removeLogs($filter)
    {
        $this->deleteLog($filter);
    }

    /**
     * getLogs
     *
     * @param array $filter
     *
     * @return mixed
     */
    public function getLogs($filter = [])
    {
        return (new Query())->select('*')->from($this->tableName)->where($filter)->all();
    }



    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params = [])
    {
        $query = (new Query())->select('*')->from($this->tableName)->orderBy(['id'=>SORT_DESC]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => ArrayHelper::getValue($params, 'id'),
            'timestamp' => ArrayHelper::getValue($params, 'timestamp'),
        ]);

        $query->andFilterWhere(['like', 'text', ArrayHelper::getValue($params, 'text')])
            ->andFilterWhere(['like', 'url', ArrayHelper::getValue($params, 'url')])
            ->andFilterWhere(['like', 'checker', ArrayHelper::getValue($params, 'checker')])
            ->andFilterWhere(['like', 'level', ArrayHelper::getValue($params, 'level')])
            ->andFilterWhere(['like', 'content', ArrayHelper::getValue($params, 'content')]);

        return $dataProvider;
    }

    /**
     * getLogs
     *
     * @param array $filter
     *
     * @return mixed
     */
    public function getStat($filter = [])
    {
        $query = (new Query())->select(['url', 'checker', 'level', 'COUNT(url) AS cnt'])->from($this->tableName)->where($filter)->groupBy(['url', 'checker', 'level'])->orderBy(['cnt'=>SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $dataProvider;
    }
}