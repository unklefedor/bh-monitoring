<?php
/**
 * Created by PhpStorm.
 * User: kukushkina
 * Date: 29.05.17
 * Time: 13:50
 */

namespace app\controllers;
use yii\web\Controller;


class AnimController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}