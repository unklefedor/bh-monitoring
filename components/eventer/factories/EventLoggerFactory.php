<?php
/**
 * Created by PhpStorm.
 * User: kukushkina
 * Date: 23.05.17
 * Time: 13:00
 */

namespace app\components\eventer\factories;

/**
 * Class EventLoggerFactory
 * @package app\components\eventer\factories
 */
class EventLoggerFactory
{
    /**
     * @return \EventDbLogger
     */
    public static function getEventDbLogger()
    {
        return new \EventDbLogger();
    }
}