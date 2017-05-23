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

namespace app\components\tester\factories;

use app\components\tester\notifiers\TestEmailNotifier;
use app\components\tester\notifiers\TestPushNotifier;

/**
 * TestNotifierFactory
 *
 * Class TestNotifierFactory
 *
 * @package app\components\tester\factories
 */
class TestNotifierFactory
{
    /**
     * getEmailNotifier
     *
     * @return TestEmailNotifier
     */
    public static function getEmailNotifier()
    {
        return new TestEmailNotifier();
    }

    /**
     * getPushNotifier
     *
     * @return TestPushNotifier
     */
    public static function getPushNotifier()
    {
        return new TestPushNotifier();
    }
}