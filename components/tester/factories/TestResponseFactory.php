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

use app\components\tester\responses\TestCurlResponse;

/** TestResponseFactory
 *
 * Class TestResponseFactory
 *
 * @package frontend\components
 */
class TestResponseFactory
{
    /**
     * getTestCurlResponseEntity
     *
     * @return TestCurlResponse
     */
    public static function getTestCurlResponse()
    {
        return new TestCurlResponse();
    }
}