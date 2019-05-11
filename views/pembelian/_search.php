<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PembelianSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pembelian-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'kode_pembelian') ?>

    <?= $form->field($model, 'tanggal_pembelian') ?>

    <?= $form->field($model, 'kode_supplier') ?>

    <?= $form->field($model, 'total_biaya') ?>

    <?= $form->field($model, 'tanggal_dibuat') ?>

    <?php // echo $form->field($model, 'dibuat_oleh') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
