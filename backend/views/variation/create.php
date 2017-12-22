<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Variation */

$this->title = 'Создать вариацию';
$this->params['breadcrumbs'][] = ['label' => 'Вариации', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="variation-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
