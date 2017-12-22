<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = 'Изменить товар: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="product-update">

    <?= $this->render('_form', compact('model', 'stock_status', 'brand', 'meta', 'category', 'variationModel', 'variations', 'productVariations', 'attributModel', 'dataProductAttribut')) ?>

</div>
