<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Brand */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<div class="brand-form">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                <?= Html::a('Отмена', Yii::$app->request->referrer, ['class' => 'btn btn-link', 'data-confirm' => 'Вы уверены?']) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?php if ($model->image) : ?>
                <div class="thumnail">
                    <?= Html::img(Yii::getAlias('@images').'/'.$model->image); ?>
                </div>
            <?php endif; ?>
            <Label for="brand-file">Изображение</Label>
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
                    'browseLabel' => 'Выберите изображение',
                ],
                'options' => ['accept' => 'image/*']
            ]);
            ?>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>

</div>
