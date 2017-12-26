<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\file\FileInput;
use yii\widgets\Pjax;
use kartik\select2\Select2;
use yii\helpers\Url;

Pjax::begin(['enablePushState' => false, 'id' => 'variation_pjax']);
$formVariation = ActiveForm::begin(['options' => ['data-pjax' => true, 'enctype' => 'multipart/form-data']]);
?>
    <div class="row">
        <div class="col-md-6">
            <?= $formVariation->field($variationModel, 'product_id')->textInput(['value' => $variationModel->product, 'type' => 'hidden'])->label(false) ?>
            <?=
            $formVariation->field($variationModel, 'variation_id')->widget(Select2::classname(), [
                'data' => $variations,
                'options' => ['placeholder' => 'Выберите вариацию ...'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]) ?>
            <?= $formVariation->field($variationModel, 'sku')->textInput(['placeholder' => 'Артикул вариации']) ?>
            <?= $formVariation->field($variationModel, 'price')->textInput(['id' => 'variation_price', 'maxlength' => true, 'type' => 'number', 'min' => 0, 'step' => 0.1, 'placeholder' => 'Стоимость товара']) ?>
            <?= $formVariation->field($variationModel, 'quantity')->textInput(['id' => 'variation_quantity', 'type' => 'number', 'min' => 0, 'placeholder' => 'Количество товара в наличии']) ?>
            <?= $formVariation->field($variationModel, 'stock_status_id')->dropDownList($stock_status) ?>
            <?=
            FileInput::widget([
                'attribute' => 'file',
                'model' => $variationModel,
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
            <br>
            <?= Html::submitButton($variationModel->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $variationModel->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>

        <div class="col-md-6 variation_list">
            <table class="table">
                <thead>
                <th>Изображение</th>
                <th>Вариация</th>
                <th>Цена</th>
                <th>Количество</th>
                <th>Статус</th>
                <th></th>
                </thead>
                <?php if ($productVariations) : ?>
                    <?php foreach ($productVariations as $variation): ?>
                        <tr>
                            <td><div class="thumbnail"><?= $variation->image ? Html::img(\common\models\Product::getImage($variation->image)) : Html::img(Yii::getAlias("@images").'/no_image.gif') ?></div></td>
                            <td><?= $variation->name->name ?></td>
                            <td><?= $variation->price ?></td>
                            <td><?= $variation->quantity ?></td>
                            <td>
                                <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'update' => $variation->id, 'id' => $variationModel->product]) ?>
                                <i class="glyphicon glyphicon-trash variation_send"
                                   data-id= <?= $variation->id ?> style="cursor: pointer"></i>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif ?>
            </table>
        </div>
    </div>
<?php
$url = Url::toRoute('product/variation-delete');
$this->registerJs("
$('.variation_send').on('click', function(){
    var id = $(this).data('id');
    $.ajax({
        type: 'POST',
        data: {'id' : id},
        url: '$url',
        success: function(){
            $.pjax.reload({container: '#variation_pjax'});
        }
    });   
});
");
Pjax::end();
