<?php
/**
 * Event.php
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
use app\components\eventer\EventerException;

/** Event
 *
 * Class Event
 *
 * @package frontend\components\eventer
 */
class Event
{

    private $level = '';
    private $type = '';
    private $code = 0;
    private $server = [];
    private $request = [];
    private $timestamp = 0;
    private $url = '';
    private $text = '';
    private $ip = '';

    private $table = 'events';

    /**
     * load
     *
     * @param $data
     *
     * @return $this
     * @throws EventerException
     */
    public function load($data)
    {
        if (isset($data['level'])){
            $this->level = $data['level'];
        }

        if (!isset($data['type']) || !$data['type']){
            throw new EventerException('Unknown Event Type');
        }
        $this->type = $data['type'];

        if (isset($data['code'])){
            $this->code = $data['code'];
        }

        if (isset($data['server'])){
            $this->server = $data['server'];
        }

        if (isset($data['request'])){
            $this->request = $data['request'];
        }

        if (!isset($data['timestamp']) || !$data['timestamp']){
            throw new EventerException('Unknown Event Timestamp');
        }
        $this->timestamp = $data['timestamp'];

        if (!isset($data['url']) || !$data['url']){
            throw new EventerException('Unknown Event Url');
        }
        $this->url = $data['url'];

        if (!isset($data['text']) || !$data['text']){
            throw new EventerException('Unknown Event Text');
        }
        $this->text = $data['text'];

        if (isset($data['ip'])){
            $this->ip = $data['ip'];
        }

        return $this->save();
    }

    /**
     * save
     *
     * @return $this
     */
    private function save()
    {
        \Yii::$app->db->createCommand()->insert($this->table, [
            'level' => $this->level,
            'type' => $this->type,
            'code' => $this->code,
            'server' => json_encode($this->server),
            'request' => json_encode($this->request),
            'timestamp' => $this->timestamp,
            'url' => $this->url,
            'text' => $this->text,
            'ip' => $this->ip
        ])->execute();

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

}