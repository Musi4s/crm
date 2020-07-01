<?php

/* @var $this yii\web\View */

$this->title = 'Тарифы';

?>
<? if (Yii::$app->session->hasFlash('errorTarif')) : ?>
    <script>
        alert("<?= Yii::$app->session->getFlash('errorTarif') ?>");
    </script>
<? endif; ?>
<div class="page-container">
    <div class="container">
        <div class="tarif">
            <h1 class="server__title"><?= $this->title ?></h1>
            <div class="tarif-list">
            <?php foreach ($tarifs as $tarif){ ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="pricingTable">
                        <h3 class="title"><?= $tarif->name ?></h3>
                        <div class="price-value">
                        <span class="month">per month</span>
                        <span class="amount">
                        <span class="currency">$</span>
                        <?= $tarif->price ?>
                        </span>
                        </div>
                        <ul class="pricing-content">
                        <li>50GB Disk Space</li>
                        <li>50 Email Accounts</li>
                        <li>50GB Monthly Bandwidth</li>
                        <li>10 Subdomains</li>
                        <li>15 Domains</li>
                        </ul>
                        <a href="/personal/order?code=<?= $tarif['code'] ?>" class="pricingTable-signup"">Заказать</a>
                        </div>
                        </div>
                <? } ?>
                </div>
            </div>
        </div>
    </div>
</div>