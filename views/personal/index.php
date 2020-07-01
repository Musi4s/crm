<?php

/* @var $this yii\web\View */

$this->title = 'Личный кабинет ' . \Yii::$app->user->identity->login;

?>

<div class="page-container">
    <div class="container">
        <div class="server">
            <h1 class="server__title">Наши сервера</h1>
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
        <div class="order">
            <h2 class="order__title">Мои заказы</h2>
            <div class="order-list">
                <? if ($countOrder < 1) : ?>
                    <span class="">Список заказов пуст</span>
                <? else: ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID Заказа</th>
                                <th scope="col">Тариф</th>
                                <th scope="col">Время заказа</th>
                                <th scope="col">Статус</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php foreach ($orders as $order) { ?>
                        <tr>
                            <th scope="row"><?= $order->id ?></th>
                                <td><?= \app\models\Order::getTarif($order->tarif) ?></td>
                                <td><?= $order->date ?></td>
                                <td><?= \app\models\Order::getStatus($order->status) ?></td>
                        </tr>
                    <? } ?>
                        </tbody>
                    </table>
                <? endif; ?>
            </div>
        </div>
    </div>
</div>