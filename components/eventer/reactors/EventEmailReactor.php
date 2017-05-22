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

use app\components\eventer\EventerException;
use app\components\eventer\service\Event;
use app\components\mailer\MailManager;
use app\components\mailer\MailManagerException;

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
     * @return mixed
     * @throws EventerException
     */
    public function run(Event $event)
    {
        try {
            (new MailManager())
                ->setHtmlBody($event->getText())
                ->send();
        } catch (MailManagerException $e) {
            throw new EventerException('PushMessage Init Error');
        }
    }
}