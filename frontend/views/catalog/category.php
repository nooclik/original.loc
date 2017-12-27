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
$filter_title = 'Брэнд';
$filter_rout = 'catalog/category';
$filter_request_url = Url::to(['catalog/category', 'slug' => Yii::$app->request->get('slug')])
?>
    <div class="row">
        <?= $this->render('_filter', compact('slug', 'check_filter_value', 'filter_value', 'filter_title', 'filter_rout', 'filter_request_url')) ?>

        <div class="col-md-10">
            <?= $this->render('_items', compact('items')); ?>
        </div>
    </div>
<?php Pjax::end();

$this->registerJS('
$(document).on("pjax:send", function() {
  
});
$(document).on("pjax:complete", function() {
  
});
$(function () {
  $(\'[data-toggle="tooltip"]\').tooltip()
})
');


