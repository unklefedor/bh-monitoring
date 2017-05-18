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

namespace app\components\tester\loggers;

use app\components\tester\checkers\TestResponseCheckerInterface;


/**
 * Interface TestLoggerInterface
 *
 * @package app\components\tester\loggers
 */
interface TestLoggerInterface
{
    /**
     * TestLoggerInterface constructor.
     */
    public function __construct();

    /**
     * setErrorState
     *
     * @param TestResponseCheckerInterface $checker
     *
     * @return mixed
     */
    public function setErrorState(TestResponseCheckerInterface $checker);

    /**
     * getLogs
     *
     * @param array $filter
     *
     * @return mixed
     */
    public function getLogs($filter = []);
}