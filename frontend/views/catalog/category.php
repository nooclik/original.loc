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
        <aside class="col-md-2" id="filter">
            <?= Html::beginForm(Url::toRoute(['catalog/category', 'slug' => $slug]), 'post', ['data-pjax' => '', 'class' => 'form-inline']) ?>
            <h3>Брэнд
                <?php if ($check_brand) : ?>
                    <span class="clear_filter"><?= Html::a('x', Url::to(['catalog/category', 'slug' => Yii::$app->request->get('slug')])) ?></span>
                <?php endif; ?>
            </h3>
            <?= Html::checkboxList('brand', $check_brand, \yii\helpers\ArrayHelper::map($brands, 'id', 'name')); ?>

            <div class="form-group">
                <?= Html::submitButton('Отобрать', ['class' => 'btn btn-sm btn-primary']) ?>
            </div>
            <?= Html::endForm() ?>
        </aside>
        <div class="col-md-10">
            <?= $this->render('_items', compact('items')); ?>
        </div>
    </div>
<?php Pjax::end();

$this->registerJS('
$(document).on("pjax:send", function() {
  
})
$(document).on("pjax:complete", function() {
  
})
');


