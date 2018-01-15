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

    <?= $this->render('_filter', compact('slug', 'check_filter_value', 'filter_value', 'filter_title', 'filter_rout', 'filter_request_url')) ?>

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
</div>
<?php Pjax::end();