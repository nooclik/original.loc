<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use kartik\select2\Select2;
use kartik\file\FileInput;
use yii\helpers\Url;

?>
<?php $form = ActiveForm::begin(
    ['options' =>
        ['enctype' => 'multipart/form-data', 'id' =>'general_form'],
    ]); ?>
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Название товара']) ?>
            <?= $form->field($model, 'description')->widget(CKEditor::className(), [
                'options' => ['rows' => 6],
                'preset' => 'custom'
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <?= $form->field($model, 'brand_id')->widget(Select2::classname(), [
                'data' => $brand,
                'options' => ['placeholder' => 'Выберите бренд ...'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]) ?>

            <?= $form->field($model, 'category')->widget(Select2::classname(), [
                'data' => $category,
                'options' => ['placeholder' => 'Выберите категорию ...'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]) ?>

            <?= $form->field($model, 'sku')->textInput(['maxlength' => true, 'placeholder' => 'Артикул товара']) ?>
            <?= $form->field($model, 'tags')->widget(Select2::classname(), [
                //'data' => $data,
                'options' => ['placeholder' => 'Введите тэги ...', 'multiple' => true],
                'pluginOptions' => [
                    'tags' => true,
                    'tokenSeparators' => [',', ' ', '.'],
                    'maximumInputLength' => 25
                ],
            ]) ?>
            <?= $form->field($model, 'meta_tag_title')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'meta_tag_description')->textarea(['rows' => 4]) ?>
            <?= $form->field($model, 'meta_tag_keywords')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'stock_status_id')->dropDownList($stock_status) ?>
            <?= $form->field($model, 'price')->textInput(['maxlength' => true, 'type' => 'number', 'min' => 0, 'step' => 0.1, 'placeholder' => 'Стоимость товара']) ?>
            <?= $form->field($model, 'quantity')->textInput(['type' => 'number', 'min' => 0, 'placeholder' => 'Количество товара в наличии']) ?>
            <?php if ($model->image) : ?>
                <div class="thumbnail">
                    <?= Html::img(\common\models\Product::getImage($model->image)) ?>
                </div>
            <?php endif; ?>
            <?=
            FileInput::widget([
                'attribute' => 'file',
                'model' => $model,
                'pluginOptions' => [
                    'showCaption' => false,
                    'showRemove' => false,
                    'showUpload' => false,
                    'browseClass' => 'btn btn-primary btn-block',
                    'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                    'browseLabel' => 'Выберите изображение'
                ],
                'options' => ['accept' => 'image/*']
            ]);
            ?>
        </div>
    </div>
<?php ActiveForm::end();