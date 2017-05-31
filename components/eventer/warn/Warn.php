<?php
/**
 * Created by PhpStorm.
 * User: kukushkina
 * Date: 31.05.17
 * Time: 18:03
 */

namespace app\components\eventer\warn;

use yii\db\Connection;
use yii\db\Schema;
use app\components\eventer\LogInterface;
use Yii;

/**
 * Class Warn
 * @package app\components\eventer\warn
 */
class Warn implements LogInterface
{

    private $text;
    private $url;
    private $timestamp;
    private $level;
    private $type;
    private $id;

    private $table = 'warns';


    public function load($data)
    {
        if (isset($data['text'])) {
            $this->text = $data['text'];
        }
        if (isset($data['url'])) {
            $this->url = $data['url'];
        }
        if (isset($data['timestamp'])) {
            $this->timestamp = $data['timestamp'];
        }
        if (isset($data['level'])) {
            $this->level = $data['level'];
        }
        if (isset($data['type'])) {
            $this->type = $data['type'];
        }

        $this->save();
        return $this;
    }


    private function save()
    {
        $this->dbCheck();

        \Yii::$app->db->createCommand()->insert($this->table, [
            'text' => $this->text,
            'url' => $this->url,
            'level' => $this->level,
            'type' => $this->type,
            'timestamp' => $this->timestamp,
        ])->execute();
        $this->id = \Yii::$app->db->getLastInsertID();
        return $this;
    }


    /**
     * dbCheck
     *
     * @return void
     */
    private function dbCheck()
    {
        if (!Yii::$app->db->getTableSchema($this->table)) {
            $this->createTable();
        }
    }

    /**
     * createTable
     *
     * @return void
     */
    private function createTable()
    {
        Yii::$app->db->createCommand()->createTable($this->table, [
            'id' => Schema::TYPE_PK,
            'url' => Schema::TYPE_STRING,
            'text' => Schema::TYPE_STRING,
            'type' => Schema::TYPE_STRING,
            'level' => Schema::TYPE_STRING,
            'timestamp' => Schema::TYPE_INTEGER,
        ])->execute();
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}