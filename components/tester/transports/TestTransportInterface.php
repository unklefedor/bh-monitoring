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

/**
 * Interface TestTransport
 *
 * @package frontend\components
 */
interface TestTransportInterface
{
    /**
     * run
     *
     * @return mixed
     */
    public function run();

    /**
     * setAuth
     *
     * @param        $login
     * @param        $pass
     * @param string $type
     *
     * @return mixed
     */
    public function setAuth($login, $pass = '', $type = '');

    /**
     * getResult
     *
     * @return mixed
     */
    public function getResult();

    /**
     * getInfo
     *
     * @return mixed
     */
    public function getInfo();
}