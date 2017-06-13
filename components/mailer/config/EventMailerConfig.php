<?php
/**
 * Created by PhpStorm.
 * User: kukushkina
 * Date: 22.05.17
 * Time: 15:02
 */

namespace app\components\mailer\config;

/**
 * Class EventMailerConfig
 * @package app\components\mailer\config
 */
class EventMailerConfig implements MailManagerConfigInterface
{

    private $from = 'monitor@breadhead.ru';
    private $to = ['unklefedor@gmail.com'];
    private $htmlBody;
    private $subject = 'Monitor notification';


    /**
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @return mixed
     */
    public function getHtmlBody()
    {
        return $this->htmlBody;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }
}