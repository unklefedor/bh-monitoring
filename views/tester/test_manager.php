<?php
/**
 * test_manager.php
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
use yii\helpers\ArrayHelper; ?>

<a href="/">Тесты</a><br/>
<a href="/tester/log">Логи</a>
<div>
    <h2>Добавить новый тест</h2>
    <p style="color:red; font-size: 16px"><?=$error?></p>
    <form action="/site/testmanager" method="post">
        <input id="form-token" type="hidden" name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->csrfToken?>"/>
        <table>
            <tr>
                <th>Url</th>
                <th>Transport</th>
                <th>Type</th>
                <th>Positive code</th>
                <th>Time limit</th>
            </tr>
            <tr>
                <td><input type="text" name="new_test[url]" value="<?=ArrayHelper::getValue($post, 'url', '')?>"></td>
                <td><input type="text" readonly name="new_test[transport]" value="<?=ArrayHelper::getValue($post, 'transport', 'curl')?>"></td>
                <td><input type="text" readonly name="new_test[type]" value="<?=ArrayHelper::getValue($post, 'type', 'availability')?>"></td>
                <td><input type="text" name="new_test[positive_code]" value="<?=ArrayHelper::getValue($post, 'positive_code', '200')?>"></td>
                <td><input type="text" name="new_test[time_limit]" value="<?=ArrayHelper::getValue($post, 'time_limit', '5')?>"></td>
            </tr>
        </table>
        <input type="submit" value="Добавить">
    </form>

    <h2>Тесты</h2>
    <table>
        <tr>
            <th>Url</th>
            <th>Transport</th>
            <th>Type</th>
            <th>Positive code</th>
            <th>Time limit</th>
        </tr>

        <style>
            td, th {
                padding: 10px 15px;
            }
            tr {
                border-bottom: 1px solid black;
            }
        </style>
        <?foreach ($tests as $test){?>
            <tr>
                <td><?=$test->getUrl();?></td>
                <td><?=$test->getTransport()?></td>
                <td><?=$test->getType()?></td>
                <td><?=$test->getPositiveCode()?></td>
                <td><?=$test->getTimeLimit()?></td>
            </tr>
        <?}?>
    </table>
</div>
