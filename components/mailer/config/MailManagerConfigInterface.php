<?php
/**
 * Created by PhpStorm.
 * User: kukushkina
 * Date: 22.05.17
 * Time: 14:58
 */


namespace app\components\mailer\config;

/**
 * Interface MailManagerConfigInterface
 * @package app\components\mailer\config
 */
interface MailManagerConfigInterface
{
    public function getFrom();
    public function getHtmlBody();
    public function getTo();
    public function getSubject();

}