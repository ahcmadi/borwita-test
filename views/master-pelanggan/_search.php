<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MasterPelangganSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="master-pelanggan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'kode_pelanggan') ?>

    <?= $form->field($model, 'nama_pelanggan') ?>

    <?= $form->field($model, 'no_telp_pelanggan') ?>

    <?= $form->field($model, 'alamat_pelanggan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
