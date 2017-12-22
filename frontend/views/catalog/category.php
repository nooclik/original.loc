<?php
/**
 * Created by PhpStorm.
 * User: админ
 * Date: 13.12.2017
 * Time: 11:51
 */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

$this->title = 'Категория';
Pjax::begin();
?>
<div class="row">
    <aside class="col-md-3" id="filter">
        <?= Html::beginForm() ?>
        <h3>Брэнд</h3>
            <?= Html::checkboxList('brand', $check_brand, \yii\helpers\ArrayHelper::map($brands, 'id', 'name')); ?>
        <?= Html::submitButton('Отобрать',['class' => 'btn btn-sm btn-primary']) ?>
        <?= Html::a('Сбросить', Url::to(['catalog/category', 'slug' => Yii::$app->request->get('slug')])) ?>
        <?= Html::endForm() ?>
    </aside>
    <div class="col-md-9">
        <?= $this->render('_items', compact('items')); ?>
    </div>
</div>
<?php Pjax::end() ?>