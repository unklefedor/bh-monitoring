<?php
/**
 * Created by PhpStorm.
 * User: kukushkina
 * Date: 26.05.17
 * Time: 16:28
 */

use yii\helpers\ArrayHelper; ?>

<h2>Правила мониторинга</h2>

<div>
    <h2>Добавить новое правило</h2>
    <p style="color:red; font-size: 16px"><?=$error?></p>
    <form action="/eventer/rule" method="post">
        <input id="form-token" type="hidden" name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->csrfToken?>"/>
        <table>
            <tr>
                <th>Url</th>
                <th>Type</th>
                <th>Frequency</th>
                <th>Start Period</th>
                <th>End Period</th>
            </tr>
            <tr>
                <td><input type="text" name="new_rule[url]" value="<?=ArrayHelper::getValue($post, 'url', '')?>"></td>
                <td><input type="text" name="new_rule[type]" value="<?=ArrayHelper::getValue($post, 'type', 'order')?>"></td>
                <td><input type="text" name="new_rule[frequency]" value="<?=ArrayHelper::getValue($post, 'frequency', '15')?>"></td>
                <td><input type="text" name="new_rule[start_period]" value="<?=ArrayHelper::getValue($post, 'start_period', '12')?>"></td>
                <td><input type="text" name="new_rule[end_period]" value="<?=ArrayHelper::getValue($post, 'end_period', '22')?>"></td>
            </tr>
        </table>
        <input type="submit" value="Добавить">
    </form>

    <h2>Тесты</h2>
    <table>
        <tr>
            <th>Url</th>
            <th>Type</th>
            <th>Frequency</th>
            <th>Start Period</th>
            <th>End Period</th>
        </tr>

        <style>
            td, th {
                padding: 10px 15px;
            }
            tr {
                border-bottom: 1px solid black;
            }
        </style>

        <?if(isset($rules)) {
            /** @var \app\components\eventer\rules\Rule $rule */
            foreach ($rules as $rule) {
                ?>
                <tr>
                    <td><?= $rule->getUrl(); ?></td>
                    <td><?= $rule->getType() ?></td>
                    <td><?= $rule->getFrequency() ?></td>
                    <td><?= $rule->getStartPeriod() ?></td>
                    <td><?= $rule->getEndPeriod() ?></td>
                    <td><a href="/eventer/deleterule?id=<?=$rule->getId()?>" style="cursor: pointer">Удалить</a></td>
                </tr>
            <?
            }
        }?>
    </table>
</div>
