<?php
/**
 * EventEmailReactor.php
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

/**
 * Ответ на евент
 */

use app\components\eventer\service\Event;

/**
 * EventEmailReactor
 *
 * Class EventEmailReactor
 *
 * @package app\components\eventer\reactors
 */
class EventEmailReactor implements EventReactorInterface
{
    /**
     * run
     *
     * @param Event $event
     *
     * @return mixed
     */
    public function run(Event $event)
    {
        // TODO: Implement run() method.
    }
}