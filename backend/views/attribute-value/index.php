<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AttributeValueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Значения атрибутов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attribute-value-index">

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'attribute_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
