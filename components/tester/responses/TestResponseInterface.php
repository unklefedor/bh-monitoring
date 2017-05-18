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

/** TestResponseInterface
 *
 * Class TestResponseInterface
 *
 * @package frontend\components
 */
interface TestResponseInterface
{
    /**
     * getUrl
     *
     * @return mixed
     */
    public function getUrl();

    /**
     * setInfo
     *
     * @param $data
     *
     * @return mixed
     */
    public function setInfo($data);

    /**
     * getCode
     *
     * @return mixed
     */
    public function getCode();

    /**
     * getResult
     *
     * @return void
     */
    public function getResult();

    /**
     * getDuration
     *
     * @return void
     */
    public function getDuration();

    /**
     * getSize
     *
     * @return mixed
     */
    public function getSize();

    /**
     * getRaw
     *
     * @return mixed
     */
    public function getRaw();

    /**
     * setData
     *
     * @param $result
     *
     * @return mixed
     */
    public function setResult($result);

    /**
     * getContent
     *
     * @return mixed
     */
    public function getContent();
}