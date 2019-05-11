<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pembelian */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pembelian-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kode_pembelian')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_pembelian')->textInput() ?>

    

    <div class="form-group field-pembelian-kode_supplier required">
    <label class="control-label" for="pembelian-kode_supplier">Total Biaya</label>
  
    <select id="pembelian-kode_supplier" class="form-control" name="Pembelian[kode_supplier]" aria-required="true">
        <?php foreach ($supplier as $key => $value): ?>
            <option value="<?= $value->kode_supplier?>"><?= $value->nama_supplier?></option>
        <?php endforeach ?>
    </select>

    <div class="help-block"></div>
    </div>

    <!-- <?= $form->field($model, 'kode_supplier')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'total_biaya')->textInput() ?>

    <!--  <?= $form->field($model, 'tanggal_dibuat')->textInput() ?> 

     <?= $form->field($model, 'dibuat_oleh')->textInput(['maxlength' => true]) ?>  -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
