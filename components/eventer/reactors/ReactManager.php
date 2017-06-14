<?php
/**
 * Created by PhpStorm.
 * User: kukushkina
 * Date: 25.05.17
 * Time: 17:55
 */

namespace app\components\eventer\reactors;

use app\components\eventer\checker\EventChecker;
use app\components\eventer\checker\EventCheckerFactory;
use app\components\eventer\factories\EventReactorFactory;
use app\components\eventer\LogInterface;

/**
 * Class ReactManager
 * @package app\components\eventer\reactors
 */
class ReactManager
{
    /** @var LogInterface $event */
    private $event;
    private $reactors = [];

    /**
     * ReactManager constructor.
     * @param $event
     */
    public function __construct(LogInterface $event)
    {
        $this->event = $event;
        $this->checkEvent();
    }

    /**
     * @return array
     */
    public function returnReactors()
    {
        return $this->reactors;
    }

    /**
     * Проверяет значимость эвента
     * если это ошибка или проблема,
     * водключает активные реакторы
     */
    private function checkEvent()
    {
        if ($this->event->getLevel() == 'error') {
           $this->activeReactors();
        }

        if ($this->event->getType() == 'info') {
            if (EventChecker::hasError(EventCheckerFactory::getEventChecker($this->event))) {
                $this->activeReactors();
            }
        }
    }

    /**
     * Подключает активные реакторы
     */
    private function activeReactors()
    {
        $this->reactors = [
            EventReactorFactory::getEventEmailReactor(),
            EventReactorFactory::getEventPushReactor()
        ];
    }
}