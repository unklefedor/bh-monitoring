<?php

/**
 * EventDbLogger.php
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

namespace app\components\eventer\loggers;

use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\helpers\ArrayHelper;

/**
 * Class EventDbLogger
 */
class EventDbLogger implements EventLoggerInterface
{
    private $tablename = 'events';

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
            'code' => ArrayHelper::getValue($params, 'code'),
            'timestamp' => ArrayHelper::getValue($params, 'timestamp'),
        ]);

        $query->andFilterWhere(['like', 'text', ArrayHelper::getValue($params, 'text')])
            ->andFilterWhere(['like', 'url', ArrayHelper::getValue($params, 'url')])
            ->andFilterWhere(['like', 'type', ArrayHelper::getValue($params, 'type')])
            ->andFilterWhere(['like', 'level', ArrayHelper::getValue($params, 'level')])
            ->andFilterWhere(['like', 'server', ArrayHelper::getValue($params, 'server')])
            ->andFilterWhere(['like', 'request', ArrayHelper::getValue($params, 'request')])
            ->andFilterWhere(['like', 'ip', ArrayHelper::getValue($params, 'ip')]);

        return $dataProvider;
    }
}