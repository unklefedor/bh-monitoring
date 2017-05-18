<?php
/**
 * Eventer.php
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

/**
 * Класс - менеджер евентов.
 * Зарегистрированный внешний сервис может послать евент сюда
 * и Eventer обработает событие и произведен необходимое
 * действие. Например, сайт сообщает сюда о 500ой ошибке,
 * Eventer получает событие и обрабатывает соответствующим
 * образом, к примеру, отправляет push-уведомление или
 * Email с отчетом.
 */

namespace app\components\eventer;

use app\components\eventer\reactors\EventReactorInterface;
use app\components\eventer\service\EventReciever;

/** Eventer
 *
 * Class Eventer
 *
 * @package frontend\components\eventer
 */
class Eventer
{
    private $event = null;

    /**
     * setEvent
     *
     * @param $data
     *
     * @return $this
     */
    public function setEvent($data)
    {
        $this->event = (new EventReciever())->newEvent($data);

        return $this;
    }

    /**
     * react
     *
     * @param EventReactorInterface $reactor
     *
     * @return void
     */
    public function react(EventReactorInterface $reactor)
    {
        $reactor->run($this->event);
    }
}