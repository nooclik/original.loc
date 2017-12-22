<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'custom'
    ]) ?>

    <?= $form->field($model, 'meta_tag_title')->textInput() ?>

    <?= $form->field($model, 'meta_tag_description')->textarea(['rows' => 4]) ?>

    <?= $form->field($model, 'meta_tag_keywords')->textInput()->hint('Укажите через запятую') ?>

    <?= $form->field($model, 'parent_id')->dropDownList($category, ['prompt' => 'Выберите категорию']) ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'status')->dropDownList($status) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Отмена', Yii::$app->request->referrer, ['class' => 'btn btn-link', 'data-confirm' => 'Вы уверены?']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
