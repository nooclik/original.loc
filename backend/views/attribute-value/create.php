<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AttributeValue */

$this->title = 'Создать значение';
$this->params['breadcrumbs'][] = ['label' => 'Значения атрибутов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attribute-value-create">

    <?= $this->render('_form', [
        'model' => $model,
        'attr' => $attr,
    ]) ?>

</div>
