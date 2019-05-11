<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MasterPelanggan */

$this->title = 'Update Master Pelanggan: ' . $model->kode_pelanggan;
$this->params['breadcrumbs'][] = ['label' => 'Master Pelanggans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode_pelanggan, 'url' => ['view', 'id' => $model->kode_pelanggan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="master-pelanggan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
