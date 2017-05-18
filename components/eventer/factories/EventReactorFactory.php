<?php

namespace app\components\eventer\factories;

use app\components\eventer\reactors\EventEmailReactor;

/**
 * EventReactorFactory.php
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
class EventReactorFactory
{
    /**
     * getEventEmailReactor
     *
     * @return EventEmailReactor
     */
    public static function getEventEmailReactor()
    {
        return new EventEmailReactor();
    }
}