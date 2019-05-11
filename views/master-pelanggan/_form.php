<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MasterPelanggan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="master-pelanggan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode_pelanggan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_pelanggan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_telp_pelanggan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_pelanggan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
