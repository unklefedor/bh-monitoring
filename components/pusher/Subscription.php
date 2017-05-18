<?php
/**
 * Subscription.php
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
use yii\db\Query;


/** Subscription
 *
 * Class Subscription
 *
 * @package app\components\pusher
 */
class Subscription
{
    private $endpoint;
    private $p256dh;
    private $auth_key;

    /**
     * loadSubscriptionJSON
     *
     * @param $json
     *
     * @return $this
     * @throws PushManagerException
     */
    public function loadSubscriptionJSON($json)
    {
        $data = json_decode($json, true);
        if (
            !isset($data['endpoint']) || !$data['endpoint']
            &&
            !isset($data['auth']) || !$data['auth']
            &&
            !isset($data['p256dh']) || !$data['p256dh']
        ) {
            throw new PushManagerException('Subscription Init Error');
        }

        $this->setEndpoint($data['endpoint']);
        $this->setP256dh($data['p256dh']);
        $this->setAuthKey($data['auth']);

        return $this;
    }

    /**
     * save
     *
     * @return $this
     * @throws PushManagerException
     */
    public function save()
    {
        $hash = md5($this->endpoint.$this->p256dh.$this->auth_key);

        if (!(new Query())->select('*')->from(PushManager::$SUBSCRIPTIONS_TABLE)->where(['hash'=>$hash])->one()) {
            try {
                \Yii::$app->getDb()->createCommand()->insert(PushManager::$SUBSCRIPTIONS_TABLE, ['endpoint' => $this->endpoint, 'p256dh' => $this->p256dh, 'auth_key' => $this->auth_key, 'hash' => $hash])->execute();
            } catch (\Exception $e) {
                throw new PushManagerException($e->getMessage());
            }
        }

        return $this;
    }

    /**
     * loadSubscription
     *
     * @param $endpoint
     * @param $p256dh
     * @param $auth_key
     *
     * @return $this
     */
    public function loadSubscription($endpoint, $p256dh, $auth_key)
    {
        $this->setEndpoint($endpoint);
        $this->setP256dh($p256dh);
        $this->setAuthKey($auth_key);

        return $this;
    }

    /**
     * setEndpoint
     *
     * @param $endpoint
     *
     * @return void
     */
    private function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    /**
     * setP256dh
     *
     * @param $p256dh
     *
     * @return void
     */
    private function setP256dh($p256dh)
    {
        $this->p256dh = $p256dh;
    }

    /**
     * setAuthKey
     *
     * @param $auth
     *
     * @return void
     */
    private function setAuthKey($auth)
    {
        $this->auth_key = $auth;
    }

    /**
     * @return mixed
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * @return mixed
     */
    public function getP256dh()
    {
        return $this->p256dh;
    }

    /**
     * @return mixed
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }
}