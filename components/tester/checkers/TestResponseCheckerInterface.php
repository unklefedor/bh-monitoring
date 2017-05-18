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

/**
 * Interface TestResponseCheckerInterface
 *
 * @package app\components\tester\checkers
 */
interface TestResponseCheckerInterface
{
    /**
     * TestResponseCheckerInterface constructor.
     *
     * @param TestInterface $test
     */
    public function __construct(TestInterface $test);

    /**
     * run
     *
     * @param TestResponseInterface $response
     *
     * @return mixed
     */
    public function run(TestResponseInterface $response);

    /**
     * getClass
     *
     * @return mixed
     */
    public function getClass();

    /**
     * getUrl
     *
     * @return mixed
     */
    public function getUrl();

    /**
     * getError
     *
     * @return mixed
     */
    public function getError();

    /**
     * getWarn
     *
     * @return mixed
     */
    public function getWarn();

    /**
     * getDebug
     *
     * @return mixed
     */
    public function getDebug();

    /**
     * getContent
     *
     * @return mixed
     */
    public function getContent();
}