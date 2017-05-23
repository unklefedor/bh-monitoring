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
class LogManager
{
    private $logger = null;

    /**
     * LogManager constructor.
     * @param EventLoggerInterface $logger
     */
    public function __construct(EventLoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @return mixed
     */
    public function getLogs()
    {
        return $this->logger->getLogs();
    }
}