<?php
/**
 * Created by PhpStorm.
 * User: kukushkina
 * Date: 22.05.17
 * Time: 13:40
 */

namespace app\components\mailer;

use app\components\mailer\config\MailManagerConfigInterface;

class MailManager
{
    private $mailer;

    /**
     * MailManager constructor.
     * @param MailManagerConfigInterface $config
     */
    public function __construct(MailManagerConfigInterface $config)
    {
        $this->mailer = \Yii::$app->getMailer;
        $this->init($config);
    }


    /**
     * @param $config
     */
    private function init($config)
    {
        /** @var MailManagerConfigInterface $config */
        $this->mailer->setHtmlBody($config->getHtmlBody())
            ->setFrom($config->getFrom())
            ->setTo($config->getTo())
            ->setSubject($config->getSubject());
    }

    /**
     * @param $from
     * @return $this
     */
    public function setFrom($from)
    {
        $this->mailer->setFrom($from);

        return $this;
    }

    /**
     * @param $to
     * @return $this
     */
    public function setTo($to)
    {
        $this->mailer->setTo($to);

        return $this;
    }

    /**
     * @param $data
     * @return $this
     */
    public function setHtmlBody($data)
    {
        $this->mailer->setHtmlBody($data);

        return $this;
    }

    /**
     * @param $subject
     * @return $this
     */
    public function setSubject($subject)
    {
        $this->mailer->setSubject($subject);

        return $this;
    }


    public function send()
    {
        $this->mailer->compose()->send();
    }

}