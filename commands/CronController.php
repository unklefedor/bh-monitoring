<?php
/**
 * CronController.php
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

namespace app\commands;

use app\components\eventer\eventTester\EventTesterManager;
use app\components\eventer\rules\RuleManager;
use app\components\tester\TestGenerator;
use app\components\tester\tests\TestManager;
use yii\console\Controller;

/** CronController
 *
 * Class CronController
 *
 * @package app\controllers
 */
class CronController extends Controller
{
    /**
     * actionRuntest
     *
     * @return void
     */
    public function actionRuntest()
    {
        $testManager = new TestManager();
        $testGenerator = new TestGenerator();
        $result['availability'] = $testGenerator->runAvailabilityTests($testManager);

        foreach ($result['availability'] as $response){
            echo $response->getUrl().' | Code: '.$response->getCode().' | Time: '.$response->getDuration(). '| Size: '.$response->getSize()."\r\n";
        }
    }

    public function actionCheckevent()
    {
        $testEventer = new EventTesterManager(new RuleManager());
        $testEventer->checkRules();
    }
}