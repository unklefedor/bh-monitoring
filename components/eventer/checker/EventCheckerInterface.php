<?php
/**
 * Created by PhpStorm.
 * User: kukushkina
 * Date: 25.05.17
 * Time: 18:25
 */

namespace app\components\eventer\checker;

/**
 * Interface EventCheckerInterface
 * @package app\components\eventer\checker
 */
interface EventCheckerInterface
{
    public function __construct($event);
    public function hasError();
}