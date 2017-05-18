<?php
/**
 * EventReciever.php
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

namespace app\components\eventer\service;

/**
 * Получение, валидация, сохранение event
 */
use app\components\eventer\EventerException;
use yii\db\Query;

/**
 * EventReciever
 *
 * Class EventReciever
 *
 * @package frontend\components\eventer
 */
class EventReciever
{
    private $hosts_table = 'hosts';

    /**
     * newEvent
     *
     * @param $data
     *
     * @return Event
     * @throws EventerException
     */
    public function newEvent($data)
    {
        if (!isset($data['event']) || !$data['event']){
            throw new EventerException('Event Validation Failed');
        }

        if (!isset($data['hash_key']) || !$data['hash_key'] || !isset($data['api_id']) || !$data['api_id']){
            throw new EventerException('Hash_key Validation Failed');
        }

        $this->validateRequest($data['api_id'], $data['hash_key'], $data['event']);
        $data['event'] = json_decode($data['event'], true);

        return (new Event())->load($data['event']);
    }

    /**
     * validateRequest
     *
     * @param $api_id
     * @param $hash_key
     * @param $event
     *
     * @return void
     * @throws EventerException
     */
    private function validateRequest($api_id, $hash_key, $event)
    {
        if (!$client = (new Query())->select('*')->from($this->hosts_table)->where('active = true AND api_id = "'.$api_id.'"' )->one()){
            throw new EventerException('Host Validation Failed');
        }

        if ($hash_key !== $this->generateHash($client, $event)){
            throw new EventerException('Host Validation Failed');
        }
    }

    /**
     * generateHash
     *
     * @param $client
     * @param $event
     *
     * @return string
     */
    private function generateHash($client, $event)
    {
        return md5($client['api_id'].'-'.$client['secret_key']).'-'.md5($event);
    }
}