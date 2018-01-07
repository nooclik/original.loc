<?php
/**
 * Created by PhpStorm.
 * User: админ
 * Date: 15.12.2017
 * Time: 21:31
 */

use yii\widgets\Pjax;

//Pjax::begin();
?>
    <div class="row">
            <?= $this->render('_filter', compact('filter_value')); ?>
        <div class="col-md-10">
            <?= $this->render('_items', compact('items', 'pages')); ?>
        </div>
    </div>
<?php
//Pjax::end();
