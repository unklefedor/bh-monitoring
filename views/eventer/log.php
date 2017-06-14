<?php
/**
 * Created by PhpStorm.
 * User: kukushkina
 * Date: 23.05.17
 * Time: 13:03
 */
use yii\grid\GridView;
use yii\widgets\LinkPager;

?>

<style>
    .pre {
        display: none;
    }

    .pre.active {
        display: block;
    }
    .more {
        width: 70px;
        cursor: pointer;
        background-color: #eed3d7;
    }
</style>
<h2><?=$this->title?></h2>

<div style="width: 95%">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            'timestamp:datetime',
            'id',
            'ip',
            'api_id',
            'url',
            'level',
            'type',
            'text',
            'code',
            [
                'header' => 'Подробно',
                'format' => 'raw',
                'value' => function($data) {
                    if ($data['server']) {
                        return '<p class="more js-more">Подробно</p><div class="pre"><pre>'.
                        var_export(json_decode($data['server'], true), true).
                        var_export(json_decode($data['request'], true), true).
                        '</pre></div>';
                    } else {
                        return '';
                    }

                }
            ],

        ],
    ]); ?>
</div>
