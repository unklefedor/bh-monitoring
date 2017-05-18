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

namespace app\components\tester\transports;

use app\components\tester\requests\TestRequestInterface;

/**
 * TestCurlTransport
 *
 * Class TestCurlTransport
 *
 * @package app\components\tester
 */
class TestCurlTransport implements TestTransportInterface
{
    private $request = null;
    private $transport = null;
    private $result = null;
    private $info = [];

    private $headers = [];

    /**
     * TestCurlTransport constructor.
     *
     * @param TestRequestInterface $request
     */
    public function __construct(TestRequestInterface $request)
    {
        $this->request = $request;
        $this->init();
    }

    /**
     * init
     *
     * @return void
     */
    private function init()
    {
        $this->initTransport();
        $this->setReturnTransfer();
        $this->setRequest();
    }

    /**
     * initTransport
     *
     * @return void
     */
    private function initTransport()
    {
        $this->transport = curl_init($this->request->getUrl());

        curl_setopt($this->transport, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($this->transport, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($this->transport, CURLOPT_CONNECTTIMEOUT, 5);
    }

    /**
     * setReturnTransfer
     *
     * @param $v
     *
     * @return void
     */
    public function setReturnTransfer($v = true)
    {
        curl_setopt($this->transport, CURLOPT_RETURNTRANSFER, $v);
    }

    /**
     * initHeaders
     *
     * @return void
     */
    private function initHeaders()
    {
        curl_setopt($this->transport, CURLOPT_HTTPHEADER, $this->headers);
    }

    /**
     * setRequest
     *
     * @return void
     */
    private function setRequest()
    {
        $this->headers[] = "Content-type: " . $this->request->getContentType();
        curl_setopt($this->transport, CURLOPT_CUSTOMREQUEST, $this->request->getMethod());
        curl_setopt($this->transport, CURLOPT_POSTFIELDS, $this->request->getPost());
    }

    /**
     * setAuth
     *
     * @param        $login
     * @param string $pass
     * @param string $type
     *
     * @return $this
     */
    public function setAuth($login, $pass = '', $type = '')
    {
        $this->headers[] = "Authorization: Basic " . $login . ':' . $pass;

        return $this;
    }

    /**
     * run
     *
     * @return void
     */
    public function run()
    {
        $this->initHeaders();
        $this->result = curl_exec($this->transport);
        $this->info = curl_getinfo($this->transport);
        $this->info['content'] = curl_multi_getcontent($this->transport);

        curl_close($this->transport);
    }


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
     * getInfo
     *
     * @return array
     */
    public function getInfo()
    {
        return $this->info;
    }
}