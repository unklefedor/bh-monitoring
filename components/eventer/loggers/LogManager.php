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


namespace app\components\eventer\loggers;

/**
 * Class LogManager
 *
 * @package app\components\eventer\loggers
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
     * @param null $id
     * @return mixed
     */
    public function getLogs($id = null)
    {
        if ($id) {
            $logs = $this->logger->getById($id);
        } else {
            $logs = $this->logger->getLogs();
        }

        return $logs;
    }

    /**
     * @param $params
     *
     * @return mixed
     */
    public function search($params)
    {
        return $this->logger->search($params);
    }
}