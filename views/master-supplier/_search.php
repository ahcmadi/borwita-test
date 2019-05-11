<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MasterSupplierSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="master-supplier-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'kode_supplier') ?>

    <?= $form->field($model, 'nama_supplier') ?>

    <?= $form->field($model, 'no_telp_supplier') ?>

    <?= $form->field($model, 'alamat_pelanggan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
