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

namespace app\components\tester\requests;

/**
 * Interface TestRequestInterface
 *
 * @package frontend\components
 */
interface TestRequestInterface
{
    /**
     * setUrl
     *
     * @param $url
     *
     * @return mixed
     */
    public function setUrl($url);

    /**
     * getUrl
     *
     * @return mixed
     */
    public function getUrl();

    /**
     * setMethod
     *
     * @param $method
     *
     * @return mixed
     */
    public function setMethod($method);

    /**
     * getMethod
     *
     * @return mixed
     */
    public function getMethod();

    /**
     * setPost
     *
     * @param array $post
     *
     * @return mixed
     */
    public function setPost($post = []);

    /**
     * getPost
     *
     * @return mixed
     */
    public function getPost();

    /**
     * setContentType
     *
     * @param string $type
     *
     * @return mixed
     */
    public function setContentType($type = '');

    /**
     * getContentType
     *
     * @return mixed
     */
    public function getContentType();
}