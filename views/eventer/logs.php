<?php
/**
 * Created by PhpStorm.
 * User: kukushkina
 * Date: 23.05.17
 * Time: 13:03
 */
?>
<h2>Логи</h2>

<div style="width: 95%">
    <? foreach ($logs as $log) { ?>
        <p>
            <? foreach ($log as $field => $value) { ?>
                <? if ($field == 'timestamp') { ?>
                    <?= date('d/m/Y H:i:s', $value) ?>
                <? } elseif ($field == 'server' || $field == 'request') { ?>
                    <?= $field . ':' ?>
                    <? foreach (json_decode($value, true) as $key => $val) { ?>
                        <?= '[' . $key . ']=>' . $val ?>
                    <? }
                } else { ?>
                    <?= $value ?> |
                <? } ?>
            <? } ?>
        </p>
    <? } ?>
</div>