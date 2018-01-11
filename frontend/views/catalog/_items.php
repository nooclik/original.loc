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
use yii\widgets\LinkPager;
use yii\bootstrap\Alert;

?>

<section class="row" id="items">
    <?php if (count($items) != 0) : ?>
        <?php foreach ($items as $item) : ?>
            <?php
            if (isset($item->product)):
                foreach ($item->product as $product): ?>
                    <article class="col-sm-6 col-md-3 item">
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
                <article class="col-sm- col-md-3 item">
                    <div class="image-container">
                        <?= Html::img(Product::getImage($item->image)) ?>
                    </div>
                    <div class="name-container">
                        <?= Html::a($item->name, Url::to(['catalog/product', 'slug' => $item->slug])) ?>
                    </div>
                </article>
            <? endif;
        endforeach; ?>
    <?php else : ?>
        <div class="alert alert-info">
            По вашему запросу ничего не найдено
        </div>
    <?php endif; ?>
</section>
<?php if ($pages) : ?>
    <div class="row">
        <div class="col-md-12">
            <?= LinkPager::widget([
                'pagination' => $pages,
            ])
            ?>
        </div>
    </div>
<?php endif; ?>



