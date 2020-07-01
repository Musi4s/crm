<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Войти в CRM';

?>

<div class="register-block">
    <h1><?= Html::encode($this->title) ?></h1>
    <span>Введите ваш логин и пароль</span>
    <? if (Yii::$app->session->hasFlash('successRegister')) : ?>
        <p class="success"><?= Yii::$app->session->getFlash('successRegister') ?></p>
    <? endif; ?>
    <div class="container">
        <?php $form = ActiveForm::begin(['id' => 'form-login']); ?>
        <?= $form->field($model, 'login')->textInput() ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'rememberMe')->checkbox() ?>
        <div class="form-group">
            <?= Html::submitButton('Войти', ['class' => 'btn btn-primary']) ?>
        </div>
        <p>
            <a href="/register">Нет аккаунта? Создать!</a>
        </p>
        <p>
            <a href="/recovery">Забыли пароль? Восстановить!</a>
        </p>
        <?php ActiveForm::end(); ?>
    </div>
</div>