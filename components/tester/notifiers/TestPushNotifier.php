<?php
/**
 * TestEmailNotifier.php
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

use app\components\pusher\PushManager;
use app\components\pusher\PushManagerException;
use app\components\pusher\PushMessageFactory;
use app\components\pusher\Subscription;
use app\components\pusher\SubscriptionManager;
use app\components\tester\checkers\TestResponseCheckerInterface;
use app\components\tester\TesterException;
use app\components\tester\tests\TestInterface;

/**
 * TestPushNotifier
 *
 * Class TestPushNotifier
 *
 * @package app\components\tester\notifiers
 */
class TestPushNotifier implements TestNotifierInterface
{
    private $test;

    public function __construct(TestInterface $test)
    {
        $this->test = $test;
    }

    /**
     * notify
     *
     * @param TestResponseCheckerInterface $checker
     *
     * @return void
     * @throws TesterException
     */
    public function notify(TestResponseCheckerInterface $checker)
    {
        $data['date'] = date('Y:m:d H:i:s');
        $data['link'] = $checker->getUrl();

        if ($checker->getError()) {
            $data['text'] = 'Error: ' . $checker->getError();
        }

        if ($checker->getWarn()) {
            $data['text'] = 'Warn: ' . $checker->getWarn();
        }

        if ($checker->getDebug()) {
            $data['text'] = 'Debug: ' . $checker->getDebug();
        }

        try {
            $pushMessage = PushMessageFactory::getAvailabilityMessage($data);

            $pushManager = new PushManager();
            $subsManager = new SubscriptionManager();
            $subscriptions = $subsManager->getSubscribersForTest($this->test);
            foreach ($subscriptions as $subscription) {
                $pushManager->pushTo($pushMessage, $subscription);
            }
        } catch (PushManagerException $e) {
            throw new TesterException('PushMessage Init Error');
        }
    }
}