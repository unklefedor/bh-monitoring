<?php
/**
 * Created by PhpStorm.
 * User: kukushkina
 * Date: 23.05.17
 * Time: 13:03
 */
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
<h2>Логи</h2>

<div style="width: 95%">

    <? foreach ($logs as $log) { ?>
    <div class="log_container">

        <span><?= date('d/m/Y H:i:s', $log['timestamp']) ?> | </span>
        <span><?= $log['ip'] ?> | </span>
        <span><?= $log['api_id'] ?> | </span>
        <span><?= $log['url'] ?> | </span>
        <span><?= $log['level'] ?> | </span>
        <span><?= $log['type'] ?> | </span>
        <span><?= $log['text'] ?> | </span>
        <span><?= $log['code'] ?> | </span>
        <p class="more">Подробно</p>
        <div class="pre">
            <pre><?= var_export(json_decode($log['server'], true), true) ?>
                <?= var_export(json_decode($log['request'], true), true) ?>
            </pre>
        </div>
    </div>
    <div>
        <? } ?>
        <? echo LinkPager::widget([
            'pagination' => $pages,
        ]); ?>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('body').on('click', '.more', function () {
            var container = $(this).closest('.log_container');
            var pre = container.find('div.pre');
            if (pre.hasClass('active')) {
                pre.removeClass('active')
            } else {
               pre.addClass('active')
            }
        })
    })
</script>