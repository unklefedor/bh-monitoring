<?php
/**
 * ${FILE_NAME}
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

namespace app\components\tester\responses;

/** TestResponse
 *
 * Class TestResponse
 *
 * @package frontend\components
 */
class TestCurlResponse implements TestResponseInterface
{
    /*
    [url] => http://yamiyami.ru/catalog
    [content_type] => text/html; charset=UTF-8
    [http_code] => 200
    [header_size] => 956
    [request_size] => 76
    [filetime] => -1
    [ssl_verify_result] => 0
    [redirect_count] => 0
    [total_time] => 0.715883
    [namelookup_time] => 2.2E-5
    [connect_time] => 0.010458
    [pretransfer_time] => 0.010482
    [size_upload] => 0
    [size_download] => 1331914
    [speed_download] => 1860519
    [speed_upload] => 0
    [download_content_length] => -1
    [upload_content_length] => 0
    [starttransfer_time] => 0.481935
    [redirect_time] => 0
    [redirect_url] =>
    [primary_ip] => 194.87.219.25
    [certinfo] => []
    [primary_port] => 80
    [local_ip] => 92.53.123.240
    [local_port] => 51178
     */
    private $info = [];
    private $result = null;

    /**
     * getResult
     *
     * @return null
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * setResult
     *
     * @param $result
     *
     * @return $this
     */
    public function setResult($result)
    {
        $this->result = $result;

        return $this;
    }

    /**
     * getUrl
     *
     * @return mixed
     */
    public function getUrl()
    {
        return $this->info['url'];
    }

    /**
     * setInfo
     *
     * @param $info
     *
     * @return $this
     */
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * getCode
     *
     * @return mixed
     */
    public function getCode()
    {
        return $this->info['http_code'];
    }

    /**
     * getDuration
     *
     * @return mixed
     */
    public function getDuration()
    {
        return $this->info['total_time'];
    }

    /**
     * getRaw
     *
     * @return array
     */
    public function getRaw()
    {
        return $this->info;
    }

    /**
     * getSize
     *
     * @return mixed
     */
    public function getSize()
    {
        return $this->info['size_download'];
    }

    /**
     * getContent
     *
     * @return mixed
     */
    public function getContent()
    {
        return $this->info['content'];
    }
}