<a href="/tester/testmanager">Менеджер тестов</a><br/>
<a href="/tester/log">Логи</a></br>

<a href="/eventer">ЭВЕНТЕР</a>

<div>
    <h2>Тест доступности</h2>

    <? /** @var TestResponseInterface $res */
    use app\components\tester\responses\TestResponseInterface;

    foreach ($result['availability'] as $res){?>
        <p><?=$res->getUrl()?> | Code: <?=$res->getCode()?> | Time: <?=$res->getDuration()?> | Size: <?=$res->getSize()?><p>
    <?}?>
</p>
