<?php
/**
 * Created by PhpStorm.
 * User: kukushkina
 * Date: 25.05.17
 * Time: 18:45
 */

namespace app\components\eventer\checker;

/**
 * Class EventChecker
 * @package app\components\eventer\checker
 */
class EventChecker
{
    /**
     * Возвращает true, если с эвентами что-то не так
     *
     * @param EventCheckerInterface $checker
     * @return mixed
     */
    public static function hasError(EventCheckerInterface $checker)
    {
        return $checker->hasError();
    }
}