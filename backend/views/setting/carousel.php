<?php
/**
 * Created by PhpStorm.
 * User: Админ
 * Date: 12.12.2017
 * Time: 20:04
 */
use yii\grid\GridView;
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\bootstrap\ActiveForm;

$this->title = 'Нстройка слайдшоу';
?>
    <div class="row">
        <div class="col-md-12">
            <?= Html::button('Добавить слайд', ['class' => 'btn btn-primary', 'id' => 'slide_add']) ?>
            <?php Pjax::begin() ?>
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' =>
                    [
                        [
                            'attribute' => 'image',
                            'value' => function ($model) {
                                return Html::img(Yii::getAlias('@images').'/'.$model->image);
                            },
                        'format' => 'raw',
                            'contentOptions' => ['class' => 'icon'],
                            'headerOptions' => ['width' => '50px;']
                        ],
                        'name',
                        'caption',
                        [
                                'class' => 'yii\grid\ActionColumn',
                            'template' => '{delete}',
                        ],
                    ]
            ]);
            Pjax::end()
            ?>
        </div>
    </div>

<?php
Pjax::begin();
$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'id' => 'modal_form']]); ?>
    <div class="modal modal-info fade in" id="modal-info" style="display: none; padding-right: 17px;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Новый слайд</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                            <?= $form->field($model, 'name')->textInput(['placeholder' => 'Название слайда']) ?>
                            <?= $form->field($model, 'caption')->textarea(['placeholder' => 'Текст слайда']) ?>
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
                            <input type="hidden" id="modal_id">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" form="modal_form" class="btn btn-outline" id="save_modal">Сохранить</button>
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
<?php
ActiveForm::end();
Pjax::end()
?>
<?php
$this->registerJS("
    $(document).on('click', '#slide_add', function(){
        $('.modal').modal();
        //$('#kvFileinputModal').remove();
        //$('.modal-backdrop').remove();
    });
    
    $('#save_modal').click(function(){
        //
    });
");

