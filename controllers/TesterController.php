<?php

namespace app\controllers;

use app\components\pusher\PushManager;
use app\components\pusher\Subscription;
use app\components\pusher\SubscriptionManager;
use app\components\tester\factories\TestLoggerFactory;
use app\components\tester\loggers\LogManager;
use app\components\tester\TestGenerator;
use app\components\tester\tests\Test;
use app\components\tester\tests\TestManager;
use app\components\tester\tests\TestManagerException;
use yii\db\Query;
use yii\web\Controller;

/** TesterController
 *
 * Class SiteController
 *
 * @package app\controllers
 */
class TesterController extends Controller
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

        $action = \Yii::$app->request->post('action');
        if ($action == 'add') {
            $post = \Yii::$app->request->post('new_test', []);
            if (\Yii::$app->request->isPost && $post) {
                try {
                    $testManager->addTest($post);
                    $post = [];
                } catch (TestManagerException $e) {
                    $error = $e->getMessage();
                }
            }
        } elseif ($action == 'subscribe') {
            $post = \Yii::$app->request->post('form', []);
            parse_str($post, $form);
            if (\Yii::$app->request->isPost && $form) {
                try {
                    $subsManager = new SubscriptionManager();
                    $tests = $testManager->search(['id' => $form['subscribe_test_id']]);

                    $record = (new Subscription())->loadSubscriptionJSON(\Yii::$app->request->post('subscription'))->save();

                    foreach ($tests as $test) {
                        $testInt = new Test();
                        $testInt->load($test);
                        $subsManager->setSubscriberForTest($testInt, $record);

                    };
                    $post = [];
                } catch (TestManagerException $e) {
                    $error = $e->getMessage();
                }
            }
        }

        $this->view->title = 'Добавить новый тест';

        return $this->render('test_manager', [
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
        $dataProvider = $logManager->search(\Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 20;

        $this->view->title = 'Логи';

        $params = \Yii::$app->request->queryParams;
        unset($params['page']);
        if ($params) {
            $this->view->title .= ' по фильтру: '.implode(' + ', array_keys(\Yii::$app->request->queryParams));
        };

        return $this->render('logs', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * actionLog
     *
     * @return string
     */
    public function actionLogstat()
    {
        $errors = [];
        $logManager = new LogManager(TestLoggerFactory::getTestDbLogger());

        if (\Yii::$app->request->post('action') == 'delete') {
            if (\Yii::$app->request->post('date_before')) {
                $timestamp = strtotime(\Yii::$app->request->post('date_before').' 23:59:59');
                $logManager->removeLogs(['<=', 'timestamp',  $timestamp]);
            } else {
                $errors['date_before'] = 'Не указана дата';
            }
        };
        $logManager = new LogManager(TestLoggerFactory::getTestDbLogger());
        $dataProvider = $logManager->getStat(\Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 20;

        $this->view->title = 'Статистика ошибок';

        $date = new \DateTime('-30 days');
        return $this->render('logStat', [
            'dataProvider' => $dataProvider,
            'date' => (
                isset($errors['date_before']) || \Yii::$app->request->post('date_before')
                ? \Yii::$app->request->post('date_before')
                : $date->format('Y-m-d')),
            'errors' => $errors
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
