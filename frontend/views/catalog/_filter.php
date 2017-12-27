<?php
/**
 * Created by PhpStorm.
 * User: админ
 * Date: 27.12.2017
 * Time: 14:43
 */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
?>

<aside class="col-md-2" id="filter">
            <?= Html::beginForm(Url::toRoute([$filter_route, 'slug' => $slug]), 'post', ['data-pjax' => '', 'class' => 'form-inline']) ?>
<h3><?= $filter_title ?>
    <?php if ($check_filter_value) : ?>
        <span class="clear_filter" data-toggle="tooltip" data-placement="right" title="Сбросить фильтр"><?= Html::a('<i class="fa fa-times" aria-hidden="true"></i>', $filter_request_url) ?></span>
    <?php endif; ?>
</h3>
<?= Html::checkboxList('filter_value', $check_filter_value, ArrayHelper::map($filter_value, 'id', 'name')); ?>

<div class="form-group">
    <?= Html::submitButton('Отобрать', ['class' => 'btn btn-sm btn-primary']) ?>
</div>
<?= Html::endForm() ?>
</aside>