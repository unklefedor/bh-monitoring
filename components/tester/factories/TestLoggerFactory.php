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

use app\components\tester\loggers\TestDbLogger;

/**
 * TestLoggerFactory
 *
 * Class TestLoggerFactory
 *
 * @package app\components\tester\factories
 */
class TestLoggerFactory
{
    /**
     * getTestDbLogger
     *
     * @return TestDbLogger
     */
    public static function getTestDbLogger()
    {
        return new TestDbLogger();
    }
}