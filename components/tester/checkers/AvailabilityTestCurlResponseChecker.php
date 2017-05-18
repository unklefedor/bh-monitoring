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

namespace app\components\tester\checkers;

use app\components\tester\responses\TestResponseInterface;
use app\components\tester\tests\TestInterface;

/** TestCurlResponseChecker
 *
 * Class TestCurlResponseChecker
 *
 * @package app\components\tester\checkers
 */
class AvailabilityTestCurlResponseChecker implements TestResponseCheckerInterface
{
    private $url = '';
    private $error = '';
    private $warn = '';
    private $debug = '';
    /** @var TestResponseInterface $response */
    private $response = null;

    private $warn_duration = 5;
    private $positive_code = 200;

    /**
     * AvailabilityTestCurlResponseChecker constructor.
     *
     * @param TestInterface $test
     */
    public function __construct(TestInterface $test)
    {
        $this->warn_duration = $test->getTimeLimit();
        $this->positive_code = $test->getPositiveCode();
    }

    /**
     * run
     *
     * @param TestResponseInterface $response
     *
     * @return void
     * @throws ResponseCheckerException
     */
    public function run(TestResponseInterface $response)
    {
        $this->response = $response;
        $this->url = $response->getUrl();

        if ($response->getCode() != $this->positive_code){
            $this->error = 'Test Availability Failed, response code: '.$response->getCode();
            throw new ResponseCheckerException($this->error);
        }

        if ($response->getDuration() > $this->warn_duration){
            $this->warn = 'Test Duration of '.$this->warn_duration.' Was Exceeded, duration: '.$response->getDuration();
            throw new ResponseCheckerException($this->warn);
        }

        if ($this->debug){
            throw new ResponseCheckerException($this->debug);
        }
    }

    /**
     * getClass
     *
     * @return mixed
     */
    public function getClass()
    {
        return self::class;
    }

    /**
     * getUrl
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * getError
     *
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * getWarn
     *
     * @return string
     */
    public function getWarn()
    {
        return $this->warn;
    }

    /**
     * getDebug
     *
     * @return string
     */
    public function getDebug()
    {
        return $this->debug;
    }

    /**
     * getContent
     *
     * @return mixed
     */
    public function getContent()
    {
        return $this->response->getContent();
    }
}