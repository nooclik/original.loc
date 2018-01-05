<?php
/**
 * Created by PhpStorm.
 * User: Админ
 * Date: 04.01.2018
 * Time: 21:27
 */
use yii\helpers\Html;

$this->title = 'Основные настройки';
?>
<div class="row">
    <div class="col-md-12">
        <?= Html::beginForm(['setting/general-settings'], 'post') ?>
        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>
        <div class="form-group">
            <label>Отображать цены </label>
            <?= Html::dropDownList('show-price', $showPrice, ['0' => 'Нет', '1' => 'Да'], ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <label>Тип фильтра</label>
            <?= Html::dropDownList('type-filter', $typeFilter, $types, ['class' => 'form-control']); ?>
        </div>
        <div class="form-group">
            <label>Количество элементов на странице категории</label>
            <?= Html::input('number', 'count-page', $countPage , ['class' => 'form-control']) ?>
        </div>
        <?= Html::endForm() ?>
    </div>
</div>
