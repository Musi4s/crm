<?php

/* @var $this yii\web\View */

$this->title = ($type == 'new') ? 'Новые заказы' : 'Подтвержденные заказы';

?>

<div class="admin-order">
    <h1><?= $this->title ?></h1>
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
                                <td>
                                    <?= \app\models\Order::getStatus($order->status) ?> 
                                    <? if ($order->status == 'new') : ?>
                                        <a href="/admin/order/status?id=<?= $order->id ?>&type=<?= $order->status ?>">(подтвердить)</a>
                                    <? endif; ?>
                                </td>
                        </tr>
                    <? } ?>
                        </tbody>
                    </table>
                <? endif; ?>
            </div>
</div>