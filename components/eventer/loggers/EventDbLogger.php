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

use yii\db\Query;

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
}