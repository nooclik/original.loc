<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Attribute */

$this->title = 'Изменить атрибут: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Атрибуты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="attribute-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
