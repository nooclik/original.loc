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

<?php Pjax::begin(); ?>
    <div class="row">
        <div class="col-md-3" id="filter">
            <?= $this->render('_filter', [
                'model' => $modelSearch,
                'slug' => $slug,
                'brand' => $brand,
            ]) ?>
        </div>
        <div class="col-md-9">
            <?=
            ListView::widget([
                'dataProvider' => $dataProvider,
                'options' => ['id' => 'items', 'class' => 'list-view row'],
                'itemView' => '_items',
                'itemOptions' => [
                    'tag' => 'div',
                    'class' => 'item col-md-4 col-xs-12',
                ],
                'pager' => [
                    'firstPageLabel' => '<<',
                    'lastPageLabel' => '>>',
                    'nextPageLabel' => '>',
                    'prevPageLabel' => '<',
                    'maxButtonCount' => 10,
                ],
                'layout' => "{items}\n{pager}",
            ]);
            ?>
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


