<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DetailPembelian */

$this->title = 'Update Detail Pembelian: ' . $model->kode_pembelian;
$this->params['breadcrumbs'][] = ['label' => 'Detail Pembelians', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode_pembelian, 'url' => ['view', 'kode_pembelian' => $model->kode_pembelian, 'kode_barang' => $model->kode_barang]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detail-pembelian-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
