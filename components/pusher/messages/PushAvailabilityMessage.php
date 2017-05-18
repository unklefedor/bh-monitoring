<?php
/**
 * PushAvailabilityMessage.php
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

namespace app\components\pusher\messages;

use app\components\pusher\PushManagerException;

/** PushAvailabilityMessage
 *
 * Class PsuhAvailabilityMessage
 *
 * @package app\components\pusher\messages
 */
class PushAvailabilityMessage implements PushMessageInterface
{
    private $data = [
        'type' => 'availability'
    ];

    /**
     * PushAvailabilityMessage constructor.
     *
     * @param $data
     *
     * @throws PushManagerException
     */
    public function __construct($data)
    {
        if (!isset($data['text']) || !$data['text']) {
            throw new PushManagerException('Push Message Text is Null');
        }

        if (!isset($data['link']) || !$data['link']) {
            throw new PushManagerException('Push Message URL is Null');
        }

        if (!isset($data['date']) || !$data['date']) {
            throw new PushManagerException('Push Message Date is Null');
        }

        $this->data = array_merge($this->data,[
            'date' => $data['date'],
            'link' => $data['link'],
            'text' => $data['text']
        ]);
    }

    /**
     * flush
     *
     * @return mixed
     */
    public function flush()
    {
        return json_encode($this->data);
    }
}