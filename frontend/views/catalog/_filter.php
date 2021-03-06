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

    <?php if (isset($brand)): ?>
    <?= $form->field($model, 'brand_id')->widget(Select2::classname(), [
        'data' => $brand,
        'options' => ['placeholder' => 'Выберите категорию...', 'id' => 'brand_filter'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
    <?php endif; ?>

    <?php if (isset($minPrice) && isset($maxPrice)) : ?>
        <?= $form->field($model, 'minPrice')->input('number', ['placeholder' => $minPrice]) ?>
        <?= $form->field($model, 'maxPrice')->input('number', ['placeholder' => $maxPrice]) ?>
    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton('Отобрать', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('X', Url::to(['category', 'slug' => $slug]), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$url = Url::toRoute(['catalog/total-count']);
$this->registerJS("
    $('#brand_filter').on('change', function(){
        $.ajax({
            type: 'POST',
            url: '$url',
            data: {'id': $(this).val(), 'slug': '$slug'},
            success: function (response) {
                console.log(response);
            }
        });
    });
");