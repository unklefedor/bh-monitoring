<?php

namespace app\controllers;

use app\components\eventer\EventerException;
use app\components\eventer\factories\EventLoggerFactory;
use app\components\eventer\factories\EventReactorFactory;
use app\components\eventer\loggers\LogManager;
use app\components\pusher\PushManagerException;
use app\components\pusher\Subscription;
use app\components\eventer\Eventer;
use yii\web\Controller;

/** EventerController
 *
 * Class SiteController
 *
 * @package app\controllers
 */
class EventerController extends Controller
{
    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;

        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

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
     * actionPushevent
     *
     * @TODO
     *
     * @return string
     */
    public function actionPushevent()
    {
        try {
            (new Eventer())
                ->setEvent(\Yii::$app->request->post())
                ->react([
                    EventReactorFactory::getEventEmailReactor(),
                    EventReactorFactory::getEventPushReactor()
                ]);

        } catch (EventerException $e){
            return $e->getMessage();
        }
    }

    /**
     * actionLog
     *
     * @TODO
     *
     * @return string
     */
    public function actionLog()
    {
        $logManager = new LogManager(EventLoggerFactory::getEventDbLogger());

        return $this->render('logs', ['logs' => $logManager->getLogs()]);
    }

    /**
     * Displays homepage.
     *
     * @TODO
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * actionRegistersubscription
     *
     * @return string
     */
    public function actionRegistersubscription()
    {
        try {
            (new Subscription())->loadSubscriptionJSON(\Yii::$app->request->post('subscription'))->save();
        } catch (PushManagerException $e){
            return $e->getMessage();
        }
    }
}
