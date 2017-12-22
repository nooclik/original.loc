<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */

?>


<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i>' : '<i class="fa fa-save"></i>', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'form' => 'general_form']) ?>
            <?= Html::a('<i class="fa fa-reply"></i>', Yii::$app->request->referrer, ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="active"><a href="#general" data-toggle="tab">Основное</a></li>
            <li><a href="#variation" data-toggle="tab">Вариации</a></li>
            <li><a href="#attribut" data-toggle="tab">Атрибуты</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="general">
                <?= $this->render('general', compact('form', 'model', 'brand', 'category', 'stock_status')) ?>
            </div>
            <div class="tab-pane" id="variation">
                <?= $this->render('variation', compact('stock_status', 'variationModel', 'variations', 'productVariations')) ?>
            </div>
            <div class="tab-pane" id="attribut">
                <?= $this->render('attribut', compact('attributModel', 'dataProductAttribut')) ?>
            </div>
        </div>
    </div>
</div>
