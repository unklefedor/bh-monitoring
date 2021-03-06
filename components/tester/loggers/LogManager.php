<?php
/**
 * LogManager.php
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

/** LogManager
 *
 * Class LogManager
 *
 * @package app\components\tester\loggers
 */
class LogManager
{
    private $logger = null;

    /**
     * LogManager constructor.
     *
     * @param TestLoggerInterface $logger
     */
    public function __construct(TestLoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * getLogs
     *
     * @return mixed
     */
    public function getLogs()
    {
        return $this->logger->getLogs();
    }
}