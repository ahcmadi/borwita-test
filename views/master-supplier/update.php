<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MasterSupplier */

$this->title = 'Update Master Supplier: ' . $model->kode_supplier;
$this->params['breadcrumbs'][] = ['label' => 'Master Suppliers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode_supplier, 'url' => ['view', 'id' => $model->kode_supplier]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="master-supplier-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
