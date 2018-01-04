<?php
/**
 * Created by PhpStorm.
 * User: админ
 * Date: 15.12.2017
 * Time: 21:31
 */

use yii\widgets\Pjax;
Pjax::begin();
?>

<?= $this->render ('_items', compact('items','pages')); ?>

<?php
Pjax::end();
