<?php
/**
 * TestEmailNotifier.php
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

namespace app\components\tester\notifiers;

use app\components\mailer\config\EventMailerConfig;
use app\components\mailer\MailManager;
use app\components\tester\checkers\TestResponseCheckerInterface;
use app\components\tester\TesterException;

/** TestEmailNotifier
 *
 * Class TestEmailNotifier
 *
 * @package app\components\tester\notifiers
 */
class TestEmailNotifier implements TestNotifierInterface
{
    private $email;
    private $mailer;

    /**
     * TestEmailNotifier constructor.
     *
     * @param $email
     *
     * @throws TesterException
     */
    public function __construct($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw new TesterException(self::class.': Email Not Valid');
        }

        $this->email = $email;
        $this->mailer = \Yii::$app->getMailer();
    }

    /**
     * notify
     *
     * @param TestResponseCheckerInterface $checker
     *
     * @return mixed
     */
    public function notify(TestResponseCheckerInterface $checker)
    {
        $data = 'Date: '.date('Y:m:d H:i:s').'<br/>'.
            'Checker: '.$checker->getClass().'<br/>'.
            'Url: '.$checker->getUrl().'<br/>';

        if ($checker->getError()) {
            $data .= 'Error: '.$checker->getError().'<br/>';
        }

        if ($checker->getWarn()) {
            $data .= 'Warn: '.$checker->getWarn().'<br/>';
        }

        if ($checker->getDebug()) {
            $data .= 'Debug: '.$checker->getDebug().'<br/>';
        }

        (new MailManager(new EventMailerConfig()))
            ->setHtmlBody($data)
            ->send();
    }
}