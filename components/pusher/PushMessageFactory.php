<?php
/**
 * PushMessageFactory.php
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

namespace app\components\pusher;

use app\components\pusher\messages\PushAvailabilityMessage;

/** PushMessageFactory
 *
 * Class PushMessageFactory
 *
 * @package app\components\pusher
 */
class PushMessageFactory
{
    /**
     * getAvailabilityMessage
     *
     * @param $data
     *
     * @return PushAvailabilityMessage
     */
    public static function getAvailabilityMessage($data)
    {
        return new PushAvailabilityMessage($data);
    }
}