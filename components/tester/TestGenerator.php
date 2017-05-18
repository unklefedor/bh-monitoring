<?php
/**
 * TestGenerator.php
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

namespace app\components\tester;
use app\components\tester\factories\TestLoggerFactory;
use app\components\tester\factories\TestNotifierFactory;
use app\components\tester\factories\TestRequestFactory;
use app\components\tester\factories\TestResponseCheckerFactory;
use app\components\tester\factories\TestResponseFactory;
use app\components\tester\factories\TestTransportFactory;
use app\components\tester\tests\TestManager;

/** TestGenerator
 *
 * Class TestGenerator
 *
 * @package app\components\tester
 */
class TestGenerator
{
    /**
     * runAvailabilityTests
     *
     * @param TestManager $testManager
     *
     * @return array
     */
    public function runAvailabilityTests(TestManager $testManager)
    {
        $result = [];

        foreach ($testManager->getAvailabilityTests() as $test) {
            $response = TestResponseFactory::getTestCurlResponse();
            $tester = new Tester(
                TestTransportFactory::getTestCurlTransport(
                    TestRequestFactory::getAvailabilityTestRequest($test)
                ),
                $response
            );

            $tester->runTest()->runCheck(
                TestResponseCheckerFactory::getAvailabilityTestCurlResponseChecker($test),
                TestLoggerFactory::getTestDbLogger(),
                [
                    TestNotifierFactory::getEmailNotifier('unklefedor@gmail.com'),
                    TestNotifierFactory::getPushNotifier()
                ]
            );

            $result[] = $response;
        }

        return $result;
    }
}