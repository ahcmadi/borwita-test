<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Penjualan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penjualan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode_penjualan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_penjualan')->textInput() ?>

    <?= $form->field($model, 'kode_pelanggan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_biaya')->textInput() ?>

    <?= $form->field($model, 'tanggal_dibuat')->textInput() ?>

    <?= $form->field($model, 'dibuat_oleh')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
