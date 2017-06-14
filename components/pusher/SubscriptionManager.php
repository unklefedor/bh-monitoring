<?php
/**
 * Created by PhpStorm.
 * User: Katrin
 * Date: 14.06.2017
 * Time: 16:29
 */

namespace app\components\pusher;

use app\components\tester\tests\TestInterface;
use yii\db\Query;

/**
 * Class SubscriptionManager
 *
 * @package app\components\pusher
 */
class SubscriptionManager
{
    public static $NOTIFY_TYPE_TEST = 'test';
    public static $NOTIFY_TYPE_EVENT = 'event';
    public static $NOTIFY_TYPE_RULE = 'rule';
    public static $NOTIFY_TYPE_WARNING = 'warning';
    private $db = null;
    private $tableName = 'notify_subscriptions';

    /**
     * SubscriptionManager constructor.
     */
    public function __construct()
    {
        $this->db = \Yii::$app->getDb();
    }

    /**
     * @param TestInterface $test
     *
     * @return array
     */
    public function getSubscribersForTest(TestInterface $test)
    {
        $subscriptions = [];
        foreach ($this->getSubscribers(['notify_id'=>$test->id, 'notify_type' => self::$NOTIFY_TYPE_TEST]) as $subscriptionData) {
            $subscription = (new Subscription())->loadSubscription(
                $subscriptionData['endpoint'],
                $subscriptionData['p256dh'],
                $subscriptionData['auth_key']
            );
            $subscriptions[] = $subscription;
        }

        return $subscriptions;
    }

    /**
     * @param TestInterface $test
     * @param Subscription  $subscription
     */
    public function setSubscriberForTest(TestInterface $test, Subscription $subscription)
    {
        $params = [
            'notify_id' => $test->getId(),
            'notify_type' => self::$NOTIFY_TYPE_TEST,
            'subscription_id' => $subscription->getId(),
        ];

        if (!$this->getSubscribers($params)) {
            $this->db->createCommand()->insert($this->tableName, $params)->execute();
        }
    }

    /**
     * @param $cond
     */
    public function deleteSubscriber($cond)
    {
        $this->db->createCommand()->delete($this->tableName, $cond)->execute();
    }

    /**
     * @param $filter
     *
     * @return array
     */
    public function getSubscribers($filter)
    {
        return (new Query())->select('*')->from($this->tableName)->where($filter)->innerJoin(PushManager::$SUBSCRIPTIONS_TABLE, PushManager::$SUBSCRIPTIONS_TABLE.'.id = '.$this->tableName.'.subscription_id')->all();
    }
}