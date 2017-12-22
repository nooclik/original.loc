<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = 'Товар';
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">

    <?= $this->render('_form', compact('model', 'stock_status', 'brand', 'meta', 'category', 'variationModel', 'variations', 'dataProviderVariation', 'productVariations', 'attributModel', 'dataProductAttribut')) ?>

</div>
