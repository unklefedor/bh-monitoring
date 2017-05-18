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

use app\components\tester\requests\TestRequestInterface;
use app\components\tester\transports\TestCurlTransport;

/** TestTransportFactory
 *
 * Class TestTransportFactory
 *
 * @package frontend\components
 */
class TestTransportFactory
{
    /**
     * getTestCurlTransport
     *
     * @param TestRequestInterface $request
     *
     * @return TestCurlTransport
     */
    public static function getTestCurlTransport(TestRequestInterface $request)
    {
        return new TestCurlTransport($request);
    }
}