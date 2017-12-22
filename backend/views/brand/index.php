<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BrandSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Бренды';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-index">

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'image',
                'value' => function ($model) {
                    return $model->image ? Yii::getAlias("@images").'/'.$model->image : Yii::getAlias("@images").'/no_image.gif';
                },
                'format' => 'image',
                'contentOptions' => ['class' => 'icon'],
                'headerOptions' => [
                    'style' => 'width: 65px;',
                ],
            ],
            //'id',
            'name',
            //'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
