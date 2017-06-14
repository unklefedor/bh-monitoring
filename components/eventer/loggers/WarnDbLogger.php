<?php
/**
 * Created by PhpStorm.
 * User: kukushkina
 * Date: 31.05.17
 * Time: 19:33
 */

namespace app\components\eventer\loggers;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\helpers\ArrayHelper;

/**
 * Class WarnDbLogger
 * @package app\components\eventer\loggers
 */
class WarnDbLogger implements EventLoggerInterface
{

    private $tablename = 'warns';

    /**
     * @return mixed
     */
    public function getLogs()
    {
        return (new Query())->select('*')->from($this->tablename)->orderBy('timestamp DESC');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return (new Query())->select('*')->from($this->tablename)->where(['id'=>$id]);
    }

    /**
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params = [])
    {
        $query = (new Query())->select('*')->from($this->tablename)->orderBy(['id'=>SORT_DESC]);

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
            ->andFilterWhere(['like', 'type', ArrayHelper::getValue($params, 'type')])
            ->andFilterWhere(['like', 'level', ArrayHelper::getValue($params, 'level')]);

        return $dataProvider;
    }
}