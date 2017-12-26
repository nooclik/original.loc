<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="product-index">

        <p>
            <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?php Pjax::begin() ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'id' => 'gvProduct',
            'filterModel' => $searchModel,
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'id',
                    'headerOptions' => [
                        'style' => 'width: 65px;',
                    ]
                ],
                [
                    'attribute' => 'image',
                    'value' => function ($model) {
                        return $model->image ? \common\models\Product::getImage($model->image) : Yii::getAlias("@images") . '/no_image.gif';
                    },
                    'format' => 'image',
                    'contentOptions' => ['class' => 'icon'],
                    'headerOptions' => [
                        'style' => 'width: 65px;',
                    ],
                ],
                'sku',
                [
                    'attribute' => 'name',
                    'value' => function ($model) {
                        return Html::a($model->name, ['product/update', 'id' => $model->id]);
                    },
                    'format' => 'raw',
                ],
                //'description',
                //'meta',
                //'tags',
                // 'brand_id',

                'price',
                // 'quantity',
                // 'image',
                [
                    'attribute' => 'stock_status_id',
                    'filter' =>
                        [
                            1 => 'В наличии',
                            2 => 'Нет в наличии',
                            3 => 'Под заказ',
                        ],
                    'value' => function ($data) {
                        switch ($data->stock_status_id) {
                            case 1:
                                return 'В наличии';
                                break;
                            case 2:
                                return 'Нет в наличии';
                                break;
                            case 3:
                                return 'Под заказ';
                                break;
                        }
                    },
                ],

                [
                    'attribute' => 'date_publish',
                    'format' => ['date', 'd.m.Y'],
                ],

                [
                    'class' => 'yii\grid\ActionColumn',
                    'buttons' => [
                        'quick_edit' => function ($url, $model, $key) {
                            return '<span title="Быстрое редактирование" data-id = "' . $model->id . '" class="quick_edit fa fa-file-text-o" aria-hidden="true"></span>';
                        },
                    ],
                    'template' => '{view} {update}  {quick_edit} {delete}',
                ]
            ],
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
    <div class="modal modal-info fade in" id="modal-info" style="display: none; padding-right: 17px;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="modal_name">Название:</label>
                            <input type="text" id="modal_name" class="form-control">
                            <input type="hidden" id="modal_id">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="modal_price">Стоимость:</label>
                            <input type="number" id="modal_price" class="form-control" min="0" step="0.1">
                        </div>
                        <div class="col-md-4">
                            <label for="modal_quantity">Количество:</label>
                            <input type="number" id="modal_quantity" class="form-control" value="0" min="0" step="1">
                        </div>
                        <div class="col-md-4">
                            <label for="modal_status">Статус:</label>
                            <select id="modal_status" class="form-control">
                                <option value="1">В наличии</option>
                                <option value="2">Под заказ</option>
                                <option value="3">Нет в наличии</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline" id="save_modal">Сохранить</button>
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php
$urlGetData = Url::toRoute(['product/get-data-for-quick-edit']);
$urlSaveData = Url::toRoute(['product/quick-edit']);
$this->registerJs("
    $('#save_modal').click(function(){
        var id = $('#modal_id').val();;
        var name = $('#modal_name').val();
        var price = $('#modal_price').val();
        var quantity = $('#modal_quantity').val();
        var status = $('#modal_status').val();
            
            $.ajax({
                type: 'POST',
                url : '$urlSaveData',
                data: {'id': id, 'name': name, 'price': price, 'quantity': quantity, 'status': status},
                success: function () {
                   $.pjax.reload({container: '#p0'});
                }
            });
    });
    $(document).on({
    ready: function() {
        $('body').on('click','.quick_edit', function(){
            var id = $(this).data('id');
                
                $.ajax({
                    type: 'POST',
                    url : '$urlGetData',
                    data: {'id' : id},
                    success: function (data) {
                        $('.modal-title').text(data.name);
                        $('#modal_id').val(id);
                        $('#modal_name').val(data.name);
                        $('#modal_price').val(data.price);
                        $('#modal_quantity').val(data.quantity);
                        $('#modal_status').val(data.stock_status_id);
                        $('.modal').modal();
                    }
                });
        });
    }});    
");
