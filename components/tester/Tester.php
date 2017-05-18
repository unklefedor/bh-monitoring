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

namespace app\components\tester;

use app\components\tester\checkers\ResponseCheckerException;
use app\components\tester\checkers\TestResponseCheckerInterface;
use app\components\tester\loggers\TestLoggerInterface;
use app\components\tester\notifiers\TestNotifierInterface;
use app\components\tester\responses\TestResponseInterface;
use app\components\tester\transports\TestTransportInterface;

/** Tester
 *
 * Class Tester
 *
 * @package frontend\components
 */
class Tester
{
    private $transport = null;
    private $response = null;
    private $checker = null;

    /**
     * Tester constructor.
     *
     * @param TestTransportInterface $transport
     * @param TestResponseInterface  $response
     */
    public function __construct(TestTransportInterface $transport, TestResponseInterface $response)
    {
        $this->transport = $transport;
        $this->response = $response;
    }

    /**
     * runTest
     *
     * @return $this
     */
    public function runTest()
    {
        $this->transport->run();
        $this->response->setResult($this->transport->getResult())->setInfo($this->transport->getInfo());

        return $this;
    }

    /**
     * runCheck
     *
     * @param TestResponseCheckerInterface $checker
     * @param TestLoggerInterface|null     $logger
     * @param array                        $notifiers
     *
     * @return $this
     */
    public function runCheck(TestResponseCheckerInterface $checker, TestLoggerInterface $logger = null, $notifiers = [])
    {
        $this->checker = $checker;

        try {
            $this->checker->run($this->response);
        } catch (ResponseCheckerException $e) {
            if ( $logger ) {
                $logger->setErrorState($this->checker);
            }

            if ($notifiers) {
                foreach ($notifiers as $notifier) {
                    $notifier->notify($this->checker);
                }
            }
        }

        return $this;
    }
}