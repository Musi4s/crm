<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';

?>

<div class="register-block">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container">
        <?php $form = ActiveForm::begin(['id' => 'form-register']); ?>
        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'login')->textInput() ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <div class="form-group">
            <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>