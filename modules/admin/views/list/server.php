<?php

/* @var $this yii\web\View */

$this->title = 'Сервера';

?>

<div class="admin-order">
    <h1><?= $this->title ?></h1>
    <div class="server">
            <div class="server-list">
            <? if ($countServer < 1) : ?>
                    <span class="">Список серверов пуст</span>
                <? else: ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID сервера</th>
                                <th scope="col">Тариф</th>
                                <th scope="col">Дата заказа сервера</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php foreach ($servers as $server) { ?>
                        <tr>
                            <th scope="row"><?= $server->id ?></th>
                                <td><?= $server->name ?></td>
                                <td><?= $server->date ?></td>
                        </tr>
                    <? } ?>
                        </tbody>
                    </table>
                <? endif; ?>
                </div>
        </div>
</div>