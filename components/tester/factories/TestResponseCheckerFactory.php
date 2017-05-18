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

use app\components\tester\checkers\AvailabilityTestCurlResponseChecker;
use app\components\tester\tests\TestInterface;

/** TestResponseCheckerFactory
 *
 * Class TestResponseCheckerFactory
 *
 * @package app\components\tester
 */
class TestResponseCheckerFactory
{
    /**
     * getAvailabilityTestCurlResponseChecker
     *
     * @param TestInterface $test
     *
     * @return AvailabilityTestCurlResponseChecker
     */
    public static function getAvailabilityTestCurlResponseChecker(TestInterface $test)
    {
        return new AvailabilityTestCurlResponseChecker($test);
    }
}