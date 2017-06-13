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
 * Ответ на эвент
 */

use app\components\eventer\EventerException;
use app\components\eventer\LogInterface;
use app\components\eventer\service\Event;
use app\components\pusher\PushManager;
use app\components\pusher\PushManagerException;
use app\components\pusher\PushMessageFactory;

/**
 * EventEmailReactor
 *
 * Class EventEmailReactor
 *
 * @package app\components\eventer\reactors
 */
class EventPushReactor implements EventReactorInterface
{
    /**
     * @param LogInterface $event
     * @return mixed|void
     * @throws EventerException
     */
    public function run(LogInterface $event)
    {
        try {
            $pushManager = new PushManager();
            $data['date'] = date('Y:m:d H:i:s');
            $data['link'] = '/eventer/'.$event->getLink();
            $data['text'] = $event->getText();

            $pushMessage = PushMessageFactory::getAvailabilityMessage($data);
            $pushManager->pushToAll($pushMessage);
        } catch (PushManagerException $e) {
            throw new EventerException('PushMessage Init Error');
        }
    }
}