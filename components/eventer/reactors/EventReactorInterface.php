<?php
/**
 * EventReactorInterface.php
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

namespace app\components\eventer\reactors;

use app\components\eventer\LogInterface;
use app\components\eventer\service\Event;

/**
 * Interface EventReactorInterface
 *
 * @package app\components\eventer\reactors
 */
interface EventReactorInterface
{
    /**
     * run
     *
     * @param LogInterface|Event $event
     * @return mixed
     */
    public function run(LogInterface $event);
}