<?php
/**
 * Created by PhpStorm.
 * User: kukushkina
 * Date: 31.05.17
 * Time: 19:00
 */

namespace app\controllers;
use app\components\eventer\eventTester\EventTesterManager;
use app\components\eventer\rules\RuleManager;
use yii\web\Controller;

class TestController extends Controller
{
    public function actionIndex()
    {

        $test = new EventTesterManager(new RuleManager());
        $test->checkRules();
    }
}