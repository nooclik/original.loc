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
        'action' => Url::to(['brand', 'slug'=>$slug]),
        'method' => 'get',
        'options' => ['data-pjax' => true]
    ]); ?>

    <?= $form->field($model, 'name')->input('text', ['placeholder' => 'Введите текст для поиска']) ?>


    <?php if (isset($minPrice) && isset($maxPrice)) : ?>
        <?= $form->field($model, 'minPrice')->input('number', ['placeholder' => $minPrice]) ?>
        <?= $form->field($model, 'maxPrice')->input('number', ['placeholder' => $maxPrice]) ?>
    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton('Отобрать', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('X', Url::to(['brand', 'slug'=>$slug]), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
