<?php

/**
 * EventLoggerInterface.php
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
 * Interface EventLoggerInterface
 * @package app\components\tester\loggers
 */
interface EventLoggerInterface
{
    /**
     * @return mixed
     */
    public function getLogs();
}