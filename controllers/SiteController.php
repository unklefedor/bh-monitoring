<?php

namespace app\controllers;

use app\components\tester\factories\TestLoggerFactory;
use app\components\tester\loggers\LogManager;
use app\components\tester\TestGenerator;
use app\components\tester\tests\TestManager;
use app\components\tester\tests\TestManagerException;
use yii\web\Controller;

/** SiteController
 *
 * Class SiteController
 *
 * @package app\controllers
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    /**
     * actionTestManager
     *
     * @return string
     */
    public function actionTestmanager()
    {
        $error = '';
        $testManager = new TestManager();

        $post = \Yii::$app->request->post('new_test', []);
        if (\Yii::$app->request->isPost && $post){
            try {
                $testManager->AddTest($post);
                $post = [];
            } catch (TestManagerException $e) {
                $error = $e->getMessage();
            }
        }

        return $this->render('test_manager',[
            'tests' => $testManager->getTests(),
            'transports' => $testManager->getTransports(),
            'types' => $testManager->getTypes(),
            'error' => $error,
            'post' => $post
        ]);
    }

    /**
     * actionLog
     *
     * @return string
     */
    public function actionLog()
    {
        $logManager = new LogManager(TestLoggerFactory::getTestDbLogger());

        return $this->render('logs', [
            'logs' => $logManager->getLogs()
        ]);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $testManager = new TestManager();
        $testGenerator = new TestGenerator();
        $result['availability'] = $testGenerator->runAvailabilityTests($testManager);

        return $this->render('index', ['result' => $result]);
    }

}
