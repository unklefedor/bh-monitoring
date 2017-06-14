<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\PushNotifierAsset;
use yii\bootstrap\ButtonDropdown;
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
<?php $menu = ['/' => 'Тесты', '/tester/testmanager/' => ['Менеджер тестов', 'items' => ['/tester/testmanager/' => 'Менеджер тестов', '/tester/log' => 'Логи', '/tester/logstat' => 'Статистика ошибок']], '/tester/testmanager/' => 'Менеджер тестов', '/eventer' => 'Менеджер эвентов'];
$items = [
    [
        'label' => 'Тесты',
        'url' => '/'
    ],
    [
        'label' => 'Менеджер тестов',
        'options' => [
            'class' => 'btn',
            'style' => 'margin:5px'
        ],
        'dropdown' => ['items' => [
            ['label' => 'Тесты', 'url' => '/tester/testmanager/'],
            ['label' => 'Логи', 'url' => '/tester/log'],
            ['label' => 'Статистика ошибок', 'url' => '/tester/logstat']
        ]]],
    [
        'label' => 'Менеджер эвентов',
        'options' => [
            'class' => 'btn',
            'style' => 'margin:5px'
        ],
        'dropdown' => ['items' => [
            ['label' => 'Тесты', 'url' => '/eventer/'],
            ['label' => 'Логи', 'url' => '/eventer/log'],
            ['label' => 'Предупреждения', 'url' => '/eventer/warn'],
            ['label' => 'Правила мониторинга эветнов', 'url' => '/eventer/rule']
        ]]]
]?>
<div class="wrap">
     <div class="container">
         <div class="pull-right">
             <button class="btn btn-primary js-subscribe" data-status="yes">Подписаться</button>
             <button class="btn js-subscribe" data-status="no">Отписаться</button>
         </div>
         <?
         foreach ($items as $item) {
             if (isset($item['dropdown'])) {
                 echo ButtonDropdown::widget($item);
             } else {
                 echo Html::a($item['label'], $item['url'], ['class' => 'btn btn-default']);
             }
         }?>
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
