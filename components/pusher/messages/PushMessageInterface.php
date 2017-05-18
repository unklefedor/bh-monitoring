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

namespace app\components\pusher\messages;

/**
 * Interface PushMessageInterface
 *
 * @package app\components\pusher\messages
 */
interface PushMessageInterface
{
    /**
     * PushMessageInterface constructor.
     *
     * @param $data
     */
    public function __construct($data);

    /**
     * flush
     *
     * @return mixed
     */
    public function flush();
}