<?php
/**
 * Created by PhpStorm.
 * User: kukushkina
 * Date: 25.05.17
 * Time: 18:14
 */

namespace app\components\eventer\checker;

/**
 * Class EventCheckerFactory
 * @package app\components\eventer\checker
 */
class EventCheckerFactory
{
    /**
     * @param $event
     * @return OrderEventChecker  |null
     */
    public static function getEventChecker($event)
    {
        $checker = null;

        switch ($event->type) {
            case 'order':
                $checker = new OrderEventChecker($event);
                break;
        }

        return $checker;
    }

}