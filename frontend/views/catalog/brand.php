<?php
/**
 * Created by PhpStorm.
 * User: админ
 * Date: 15.12.2017
 * Time: 21:31
 */

use yii\widgets\ListView;
use yii\widgets\Pjax;

?>
    <div class="row">
        <?php Pjax::begin(); ?>
        <div class="col-md-3" id="filter">
            <?= $this->render('_filter-brand', compact('model', 'slug', 'minPrice', 'maxPrice')); ?>
        </div>
        <div class="col-md-9">
            <?=
            ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_items',
                'options' => ['id' => 'items', 'class' => 'list-view row'],
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
        <?php Pjax::end(); ?>
    </div>
<?php

