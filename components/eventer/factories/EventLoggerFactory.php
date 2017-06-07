<?php
/**
 * Created by PhpStorm.
 * User: kukushkina
 * Date: 23.05.17
 * Time: 13:00
 */

namespace app\components\eventer\factories;
use app\components\eventer\loggers\EventDbLogger;
use app\components\eventer\loggers\WarnDbLogger;

/**
 * Class EventLoggerFactory
 * @package app\components\eventer\factories
 */
class EventLoggerFactory
{
    /**
     * @return EventDbLogger
     */
    public static function getEventDbLogger()
    {
        return new EventDbLogger();
    }

    /**
     * @return WarnDbLogger
     */
    public static function getWarnDbLogger()
    {
        return new WarnDbLogger();
    }
}