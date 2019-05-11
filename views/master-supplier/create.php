<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MasterSupplier */

$this->title = 'Create Master Supplier';
$this->params['breadcrumbs'][] = ['label' => 'Master Suppliers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-supplier-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
