<?php
/**
 * PushManager.php
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
use yii\db\Query;

/** PushManager
 *
 * Class PushManager
 *
 * @package app\components\pusher
 */
class PushManager
{
    public static $SUBSCRIPTIONS_TABLE = 'subscriptions';
    public static $publicKey = 'BLzNMA6TLEF9Rs9FSJKgPyrBVFmQZXo1_oWPKKSQqRNU9Dker69j7zEQGuGYCAMc4A17CvpXxiuavBhIZz-ZlZE';
    public static $privateKey = 'AkReFPPjgXS3QayqMUsaPctCtFCus_tCqNQugJuXgxE';

    /**
     * pushToAll
     *
     * @param PushMessageInterface $message
     *
     * @return void
     */
    public function pushToAll(PushMessageInterface $message)
    {
        $releaser = new PushReleaser();
        foreach ((new Query())->select('*')->from(self::$SUBSCRIPTIONS_TABLE)->all() as $subscriptionData) {
            $subscription = (new Subscription())->loadSubscription(
                $subscriptionData['endpoint'],
                $subscriptionData['p256dh'],
                $subscriptionData['auth_key']
            );

            $releaser->releasePush($subscription, $message);
        }
    }

    /**
     * @param PushMessageInterface $message
     * @param Subscription         $subscription
     */
    public function pushTo(PushMessageInterface $message, Subscription $subscription)
    {
        $releaser = new PushReleaser();
        $releaser->releasePush($subscription, $message);
    }
}