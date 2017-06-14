<?php
/**
 * Created by PhpStorm.
 * User: kukushkina
 * Date: 31.05.17
 * Time: 17:59
 */

namespace app\components\eventer;

/**
 * Interface LogInterface
 * @package app\components\eventer
 */
interface LogInterface
{
    /**
     * @return mixed
     */
    public function getText();

    /**
     * @return mixed
     */
    public function getUrl();

    /**
     * @return mixed
     */
    public function getTimestamp();

    /**
     * @return mixed
     */
    public function getLink();

    /**
     * getLevel
     *
     * @return mixed
     */
    public function getLevel();

    /**
     * getType
     *
     * @return mixed
     */
    public function getType();
}