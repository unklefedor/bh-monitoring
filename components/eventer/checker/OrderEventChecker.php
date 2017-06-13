<?php
/**
 * Created by PhpStorm.
 * User: kukushkina
 * Date: 25.05.17
 * Time: 18:26
 */

namespace app\components\eventer\checker;

/**
 * Class OrderEventChecker
 * @package app\components\eventer\checker
 */
class OrderEventChecker implements EventCheckerInterface
{

    private $event;
    private $res = true;

    /**
     * OrderEventChecker constructor.
     * @param $event
     */
    public function __construct($event)
    {
        $this->event = $event;
        $this->check();
    }

    /**
     * @return bool
     */
    public function hasError()
    {
        return $this->res;
    }


    private function check()
    {

    }


}