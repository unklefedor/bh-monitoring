<?/** @var TestResponseInterface $res */?>
<th>
    <h2>Тест доступности</h2>
    <table border="1" >
        <tr>
        <th>
            Url
        </th>
        <th>
            Code
        </th>
        <th>
            Time
        </th>
        <th>
            Size
        </th>
        </tr>
        <?php
        foreach ($result['availability'] as $res) {?>
            <tr>
                <td>
                    <?=$res->getUrl()?><p>
                </td>
                <td>
                    <?=$res->getCode()?><p>
                </td>
                <td>
                    <?=$res->getDuration()?><p>
                </td>
                <td>
                    <?=$res->getSize()?><p>
                </td>
            </tr>
        <?}?>
    </table>
</p>
<style>
    .row div{
        border-bottom:1px solid;
        border-right:1px solid;
    }
</style>