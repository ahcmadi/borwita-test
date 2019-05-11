<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MasterSupplier */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="master-supplier-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode_supplier')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_supplier')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_telp_supplier')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_pelanggan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
