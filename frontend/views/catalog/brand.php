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
            <?= $this->render('_filter', compact('filter_value')); ?>
        <?php Pjax::begin(); ?>
        <div class="col-md-10">
            <?=
            ListView::widget([
                'dataProvider' => $items,
                'itemView' => '_items',
                'options' => ['id' => 'items', 'class' => 'list-view row'],
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
                'layout' => "{summary}\n{items}\n{pager}",
            ]);
            ?>
        </div>
        <?php Pjax::end(); ?>
    </div>
<?php

