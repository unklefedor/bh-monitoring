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

use app\components\tester\requests\AvailabilityTestRequest;
use app\components\tester\tests\TestInterface;

/** TestRequestFactory
 *
 * Class TestRequestFactory
 *
 * @package frontend\components
 */
class TestRequestFactory
{
    /**
     * getAvailabilityTestRequest
     *
     * @param TestInterface $test
     *
     * @return AvailabilityTestRequest
     */
    public static function getAvailabilityTestRequest(TestInterface $test)
    {
        $obj = new AvailabilityTestRequest();
        $obj->setUrl($test->getUrl());

        return $obj;
    }
}