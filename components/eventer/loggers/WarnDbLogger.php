<?php
/**
 * Created by PhpStorm.
 * User: kukushkina
 * Date: 31.05.17
 * Time: 19:33
 */

namespace app\components\eventer\loggers;
use yii\db\Query;

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
}