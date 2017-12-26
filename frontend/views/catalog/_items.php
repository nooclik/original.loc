<?php
/**
 * Created by PhpStorm.
 * User: админ
 * Date: 15.12.2017
 * Time: 21:39
 * отредактировано
 */
use yii\helpers\Html;
use common\models\Product;
use yii\helpers\Url;

?>
<section class="row" id="items">
    <?php foreach ($items as $item) : ?>
        <?php
        if (isset($item->product)):
            foreach ($item->product as $product): ?>
                <article class="col-xs-12 col-sm-12 col-md-3 item">
                    <div class="image-container">
                        <?= Html::img(Product::getImage($product->image)) ?>
                    </div>
                    <div class="name-container">
                        <?= Html::a($product->name, Url::to(['catalog/product', 'slug' => $product->slug])) ?>
                    </div>
                </article>
            <?php endforeach; ?>
            <?php
        else :?>
            <article class="col-xs-12 col-sm-12 col-md-3 item">
                <div class="image-container">
                    <?= Html::img(Product::getImage($item->image)) ?>
                </div>
                <div class="name-container">
                    <?= Html::a($item->name, Url::to(['catalog/product', 'slug' => $item->slug])) ?>
                </div>
            </article>
        <? endif;
    endforeach; ?>
</section>
