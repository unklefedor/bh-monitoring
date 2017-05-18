<?php
/**
 * PushReleaser.php
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

namespace app\components\pusher;

use app\components\pusher\messages\PushMessageInterface;
use Minishlink\WebPush\WebPush;

/** PushReleaser
 *
 * Class PushReleaser
 *
 * @package app\components\pusher
 */
class PushReleaser
{
    /**
     * releasePush
     *
     * @param Subscription         $subscription
     * @param PushMessageInterface $message
     *
     * @return void
     */
    public function releasePush(Subscription $subscription, PushMessageInterface $message)
    {
        $auth = array(
            'VAPID' => array(
                'subject' => 'mailto:unklefedor@breadhead.ru',
                'publicKey' => PushManager::$publicKey,
                'privateKey' => PushManager::$privateKey,
            ),
        );

        $webPush = new WebPush($auth);
        $webPush->sendNotification(
            $subscription->getEndpoint(),
            $message->flush(),
            $subscription->getP256dh(),
            $subscription->getAuthKey(),
            true
        );
    }
}