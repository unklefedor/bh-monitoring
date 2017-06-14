<?php
/**
 * Test.php
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

namespace app\components\tester\tests;

/** Test
 *
 * Class Test
 *
 * @package app\components\tester\tests
 */
class Test implements TestInterface
{
    private $id = 0;
    private $url = '';
    private $transport = '';
    private $type = '';
    private $positive_code = 0;
    private $time_limit = 0;
    private $fetch_content = false;

    /**
     * load
     *
     * @param $data
     *
     * @return void
     */
    public function load($data)
    {
        $this->checkData($data);
        $this->setData($data);
    }

    /**
     * setData
     *
     * @param $data
     *
     * @return void
     */
    private function setData($data)
    {
        $this->id = $data['id'];
        $this->url = $data['url'];
        $this->transport = $data['transport'];
        $this->type = $data['type'];
        $this->positive_code = $data['positive_code'];
        $this->time_limit = $data['time_limit'];
        $this->fetch_content = isset($data['get_content'])?$data['get_content']:false;
    }

    /**
     * getAsArray
     *
     * @return array
     */
    public function getAsArray()
    {
        return [
            'id' => $this->id,
            'url' => $this->url,
            'transport' => $this->transport,
            'type' => $this->type,
            'positive_code' => $this->positive_code,
            'time_limit' => $this->time_limit
        ];
    }

    /**
     * checkData
     *
     * @param $data
     *
     * @return void
     * @throws TestManagerException
     */
    private function checkData($data)
    {
        if (!isset($data['url']) || !filter_var($data['url'], FILTER_VALIDATE_URL)) {
            throw new TestManagerException('Url Error');
        }

        if (!isset($data['transport'])) {
            throw new TestManagerException('Transport Error');
        }

        if (!isset($data['type'])) {
            throw new TestManagerException('Type Error');
        }

        if (!isset($data['positive_code']) || !is_numeric($data['positive_code']) || $data['positive_code'] <= 0) {
            throw new TestManagerException('Positive Code Error');
        }

        if (!isset($data['time_limit']) || !is_numeric($data['time_limit']) || $data['time_limit'] <= 0) {
            throw new TestManagerException('Time Limit Error');
        }
    }

    /**
     * getId
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * getUrl
     *
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * getType
     *
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * getTransport
     *
     * @return mixed
     */
    public function getTransport()
    {
        return $this->transport;
    }

    /**
     * getTimeLimit
     *
     * @return mixed
     */
    public function getTimeLimit()
    {
        return $this->time_limit;
    }

    /**
     * getPositiveCode
     *
     * @return mixed
     */
    public function getPositiveCode()
    {
        return $this->positive_code;
    }

    /**
     * getFetchContent
     *
     * @return void
     */
    public function getFetchContent()
    {
        return $this->fetch_content;
    }
}