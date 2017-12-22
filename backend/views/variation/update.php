<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Variation */

$this->title = 'Изменить вариацию: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Вариации', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="variation-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
