<?php
/**
 * Created by PhpStorm.
 * User: админ
 * Date: 27.12.2017
 * Time: 14:43
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\select2\Select2;

?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => Url::to(['category', 'slug' => $slug]),
        'method' => 'get',
        'options' => ['data-pjax' => true]
    ]); ?>


    <?= $form->field($model, 'name')->input('text', ['placeholder' => 'Введите текст для поиска']) ?>

    <?= $form->field($model, 'brand_id')->widget(Select2::classname(), [
        'data' => $brand,
        'options' => ['placeholder' => 'Выберите категорию...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?php // echo $form->field($model, 'brand_id') ?>

    <?php // echo $form->field($model, 'sku') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'quantity') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'stock_status_id') ?>

    <?php // echo $form->field($model, 'date_publish') ?>

    <?php // echo $form->field($model, 'date_update') ?>

    <div class="form-group">
        <?= Html::submitButton('Отобрать', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('X', Url::to(['category', 'slug' => $slug]), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
