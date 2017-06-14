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
use yii\grid\DataColumn;
use yii\grid\GridView; ?>


<h2><?=$this->title?></h2>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    //'filterModel' => $searchModel,
    'columns' => [
        [
            'class' => DataColumn::className(), // this line is optional
            'attribute' => 'cnt',
            'format' => 'raw',
            'value' => function ($data) {
                return '<a target="_blank" href="/tester/log?'.http_build_query(['url'=>$data['url'], 'checker' => $data['checker'], 'level' => $data['level']]).'">'.$data['cnt'].'</a>';
            },
        ],
        'checker',
        'url',
        'level',
    ],
]); ?>


<?php $form = ActiveForm::begin(); ?>
    <input type="hidden" name="action" value="delete">
    <h3>Очистка логов</h3>
    <div class="form-group<?=isset($errors['date_before']) ? ' has-error' : ''?>">
        <label class="control-label">Дата</label>
        <input type="date" class="form-control" name="date_before" style="width:160px" value="<?=$date?>">
        <span class="help-block"><?=\yii\helpers\ArrayHelper::getValue($errors, 'date_before')?></span>
    </div>
    <div class="form-group">
        <?= \yii\bootstrap\Html::submitButton('Удалить', ['class' => 'btn btn-primary', 'data' => [
            'confirm' => 'Are you sure you want to delete all logs before that date?',
            'method' => 'post',
        ],]) ?>
    </div>
<?php ActiveForm::end(); ?>
