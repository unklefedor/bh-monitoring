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

    private $from;
    private $to;
    private $htmlBody;
    private $subject;

    /**
     * @param mixed $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @param mixed $to
     */
    public function setTo($to)
    {
        $this->to = $to;
    }

    /**
     * @param mixed $htmlBody
     */
    public function setHtmlBody($htmlBody)
    {
        $this->htmlBody = $htmlBody;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

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