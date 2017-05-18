<?php
/**
 * TestInterface.php
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

/**
 * Interface TestInterface
 *
 * @package app\components\tester\tests
 */
interface TestInterface
{
    /**
     * load
     *
     * @param $data
     *
     * @return mixed
     */
    public function load($data);

    /**
     * getUrl
     *
     * @return mixed
     */
    public function getUrl();

    /**
     * getType
     *
     * @return mixed
     */
    public function getType();

    /**
     * getTransport
     *
     * @return mixed
     */
    public function getTransport();

    /**
     * getTimeLimit
     *
     * @return mixed
     */
    public function getTimeLimit();

    /**
     * getPositiveCode
     *
     * @return mixed
     */
    public function getPositiveCode();

    /**
     * getFetchContent
     *
     * @return mixed
     */
    public function getFetchContent();
}