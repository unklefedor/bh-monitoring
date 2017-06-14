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
 */?>

<a href="/">Тесты</a><br/>
<a href="/tester/testmanager">Менеджер тестов</a>

<h2>Логи</h2>

<div style="width: 95%">
    <?foreach ($logs as $log) {?>
        <p>
            <?foreach ($log as $field=>$value){?>
                <?if ($field == 'timestamp'){?>
                    <?=date('d/m/Y H:i:s',$value)?>
                <?}else{?>
                    <?=$value?> |
                <?}?>
            <?}?>
        </p>
    <?}?>
</div>