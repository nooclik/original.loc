<?php
/**
 * Created by PhpStorm.
 * User: админ
 * Date: 27.12.2017
 * Time: 14:36
 */

use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\widgets\ListView;

$this->title = 'Селективная парфюмерия';
$filter_title = 'Пол';
$filter_rout = 'catalog/selectvie';
$filter_request_url = Url::to(['catalog/selective']);
?>

<?php Pjax::begin() ?>
    <div class="row">

        <div class="col-md-3" id="filter">
            <?= $this->render('_filter-selective',
                [
                    'model' => $modelSearch,
                    'minPrice' => $minPrice,
                    'maxPrice' => $maxPrice,
                ]); ?>
        </div>

        <div class="col-md-9">
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'options' => ['id' => 'items', 'class' => 'list-view row'],
                'itemView' => '_items',
                'itemOptions' => [
                    'tag' => 'div',
                    'class' => 'item col-md-4 col-xs-12',
                ],
                'layout' => "{items}\n{pager}",
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
    </div>
<?php Pjax::end();