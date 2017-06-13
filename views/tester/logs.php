<?php
/**
 * logs.php
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
use yii\bootstrap\ActiveForm;
use yii\grid\GridView; ?>

<div class="container">

    <a href="/">Тесты</a><br/>
    <a href="/tester/testmanager">Менеджер тестов</a><br/>
    <a href="/tester/logstat">Статистика ошибок</a><br/>
    <h2><?=$this->title?></h2>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'checker',
            'url',
            'text',
            'level',
            'content:html',
            'timestamp:datetime'
        ],
    ]); ?>
</div>
