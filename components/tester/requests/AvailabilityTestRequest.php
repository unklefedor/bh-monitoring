<?php

namespace app\components\tester\requests;

use app\components\tester\TesterException;

/**
 * AvailabilityTestRequest.php
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
class AvailabilityTestRequest implements TestRequestInterface
{
    private $url = '';
    private $method = 'GET';
    private $post = [];
    private $contentType = 'text/html';

    /**
     * setUrl
     *
     * @param $url
     *
     * @return $this
     * @throws TesterException
     */
    public function setUrl($url)
    {
        if ( !filter_var($url, FILTER_VALIDATE_URL) ){
            throw new TesterException('Неверный url AvailabilityTestRequest::setUrl' );
        }

        $this->url = $url;

        return $this;
    }

    /**
     * getUrl
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * setMethod
     *
     * @param $method
     *
     * @return $this
     */
    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * getMethod
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * setPost
     *
     * @param array $post
     *
     * @return $this
     */
    public function setPost($post = [])
    {
        $this->post = $post;

        return $this;
    }

    /**
     * getPost
     *
     * @return array
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * setContentType
     *
     * @param string $type
     *
     * @return $this
     */
    public function setContentType($type = '')
    {
        $this->contentType = $type;

        return $this;
    }

    /**
     * getContentType
     *
     * @return string
     */
    public function getContentType()
    {
        return $this->contentType;
    }
}