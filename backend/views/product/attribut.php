<?php
/**
 * Created by PhpStorm.
 * User: админ
 * Date: 30.10.2017
 * Time: 15:32
 */

use common\models\Attribute;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use yii\helpers\Html;


$attributs = ArrayHelper::map(Attribute::find()->select('id, name')->asArray()->all(), 'id', 'name');
$val = ArrayHelper::map(\common\models\AttributeValue::find()->select('id, name')->asArray()->all(), 'id', 'name');

?>
    <div class="row">
        <div class="col-md-6">
            <?php
            Pjax::begin(['enablePushState' => false]);
            $formAttribut = ActiveForm::begin(['options' => ['data-pjax' => true]]);
            ?>
            <?=
            $formAttribut->field($attributModel, 'attribut_id')->widget(Select2::classname(), [
                'data' => $attributs,
                'id' => '123',
                'options' => ['placeholder' => 'Выберите атрибут ...', 'id' => 'attribut_id'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]) ?>
            <?=
            $formAttribut->field($attributModel, 'attribu_value_id')->widget(DepDrop::classname(), [
                'options' => ['id' => 'variation_id'],
                'type' => DepDrop::TYPE_SELECT2,
                'pluginOptions' => [
                    'depends' => ['attribut_id'],

                    'placeholder' => 'Выберите значение...',
                    'url' => Url::to(['/product/subcat'])
                ]]);

            echo Html::submitButton('Добавить', ['class' => 'btn btn-primary']);
            ActiveForm::end();
            Pjax::end(); ?>
        </div>
        <div class="col-md-6">
            <?php
            Pjax::begin(['enablePushState' => false]);
            ?>
            <table class="table">
                <thead>
                <th>Атрибут</th>
                <th>Значение</th>
                </thead>
                <?php foreach ($dataProductAttribut as $attribut): ?>
                    <tr>
                        <td>
                            <?= $attribut->attributName->name ?>
                        </td>
                        <td>
                            <?= $attribut->valueName->name ?>
                        </td>
                        <td>
                            <i class="glyphicon glyphicon-trash attribut_send" data-id="<?= $attribut->id ?>"
                               style="cursor: pointer;"></i>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <?php
            $url = Url::toRoute('product/attribut-delete');
            $this->registerJs("
$('.attribut_send').on('click', function(){
    var id = $(this).data('id');
    $.ajax({
        type: 'POST',
        data: {'id' : id},
        url: '$url',
        success: function(){
            $.pjax.reload({container: '#p1'});
        }
    });   
});
");
            Pjax::end();
            ?>
        </div>
    </div>
<?php

$js = <<<JS
$('#p0').on('pjax:success', function() {
    $.pjax.reload({container: '#p1', timeout:2000});
})
JS;
$this->registerJs($js, $this::POS_READY);