<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\PushNotifierAsset;
use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
PushNotifierAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <link rel="manifest" href="/manifest.json">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>-->
</head>
<body>

<?php $this->beginBody() ?>
<?php $menu = ['/' => 'Тесты', '/tester/testmanager/' => 'Менеджер тестов', '/tester/log' => 'Логи', '/tester/logstat' => 'Статистика ошибок', '/eventer' => 'эвенте']; ?>
<div class="wrap">
     <div class="container">
         <div class="pull-right">
             <button class="btn btn-primary js-subscribe" data-status="yes">Подписаться</button>
             <button class="btn js-subscribe" data-status="no">Отписаться</button>
         </div>
         <ul class="nav nav-tabs">
         <?foreach ($menu as $url => $name) {
             $active = Yii::$app->request->url == $url;?>
             <li class="<?=$active?'active':''?>"><a href="<?=$url?>"><?=$name?></a></li>
         <?}?>
         </ul>
         <br />
        <?= $content ?>
    </div>
</div>

<style>
    .container{
        width: 85%;
    }
</style>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
