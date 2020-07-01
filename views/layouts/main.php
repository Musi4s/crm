<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="<?= Yii::$app->controller->id; ?> <?= !Yii::$app->user->isGuest ? 'auth' : '' ?>">
    <?php $this->beginBody() ?>

    <div class="wrapper">
        <div class="header">
            <div class="nav">
                <div class="logo">
                    <a href="/"><img src="/images/logo_light.png" alt=""></a>
                </div>
                <? if (Yii::$app->user->isGuest) : ?>
                <div class="autentical">
                    <a href="/login">Авторизоваться</a>
                </div>
                <? else: ?>
                <div class="hello">
                    <span>Приветствуем, <?= \Yii::$app->user->identity->username ?></span>
                </div>
                <div class="header__block">
                    <div class="tarifs">
                        <a href="/personal/tarifs">Тарифы</a>
                    </div>
                    <div class="logout">
                        <a href="/login/logout">Выйти</a>
                    </div>
                </div>
                <? endif; ?>
            </div>
            <!-- /.nav -->
            <? if (\Yii::$app->user->identity->isAdmin == 1) : ?>
            <div class="admin-panel">
                <a href="/admin">Админ панель</a>
            </div>
            <? endif; ?>
            <?= $content ?>
            <div class="footer">
                <div class="container-fluid">
                    <p>© <?= date('Y') ?> <a href="/" target="_blank" title="Бесплатная CRM система онлайн" alt="Бесплатная CRM система онлайн">FreeCRM</a></p>
                </div>
            </div>
        </div>
    </div>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>