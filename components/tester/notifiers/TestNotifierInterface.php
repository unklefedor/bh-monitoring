<?php
/**
 * TestNotifierInterface.php
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

namespace app\components\tester\notifiers;

use app\components\tester\checkers\TestResponseCheckerInterface;

/**
 * Interface TestNotifierInterface
 *
 * @package app\components\tester\notifiers
 */
interface TestNotifierInterface
{
    /**
     * notify
     *
     * @param TestResponseCheckerInterface $checker
     *
     * @return mixed
     */
    public function notify(TestResponseCheckerInterface $checker);
}