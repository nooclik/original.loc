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
use yii\widgets\ListView;

$this->title = 'Категория';

$filter_title = 'Брэнд';
$filter_rout = 'catalog/category';
$filter_request_url = Url::to(['catalog/category', 'slug' => Yii::$app->request->get('slug')]);
?>
    <div class="row">
        <?= $this->render('_filter', compact('slug', 'check_filter_value', 'filter_value', 'filter_title', 'filter_rout', 'filter_request_url', 'sex')) ?>
        <?php Pjax::begin(['enablePushState' => false]); ?>
        <div class="col-md-10">
            <?=
            ListView::widget([
                'dataProvider' => $items,
                'options' => ['id' => 'items', 'class' => 'list-view row'],
                'itemView' => '_items',
                'itemOptions' => [
                    'tag' => 'div',
                    'class' => 'item col-md-3 col-xs-12',
                ],
                'pager' => [
                    'firstPageLabel' => '<<',
                    'lastPageLabel' => '>>',
                    'nextPageLabel' => '>',
                    'prevPageLabel' => '<',
                    'maxButtonCount' => 10,
                ],
            ]);
            ?>
        </div>
        <?php Pjax::end(); ?>
    </div>
<?php

$this->registerJS('
$(document).on("pjax:send", function() {
  
});
$(document).on("pjax:complete", function() {
  
});
$(function () {
  $(\'[data-toggle="tooltip"]\').tooltip()
})
');


