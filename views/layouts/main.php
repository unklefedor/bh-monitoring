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
</head>
<body>

<?php $this->beginBody() ?>

<div class="wrap">
     <div class="container">
        <?= $content ?>
    </div>
</div>

<style>
    .container{
        width: 95%;
    }
</style>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
