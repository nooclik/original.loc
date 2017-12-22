<?php
/**
 * Created by PhpStorm.
 * User: админ
 * Date: 13.12.2017
 * Time: 18:54
 */
use yii\helpers\Html;
use common\models\Product;
use yii\helpers\Url;

$this->title = 'Товар';
$this->params['breadcrumbs'][] = ['label' => $model->categoryName, 'url' => \yii\helpers\Url::to(['catalog/category'])];
$this->params['breadcrumbs'][] = $this->title;
$attributes = Product::loadAttribute($model->id);
$variations = Product::loadVariation($model->id);
?>
<div id="product">
    <div class="row">
        <div class="col-md-12">
            <h1><?= Html::encode($model->name) ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="thumbnail">
                <?= Html::img(Product::getImage($model->image)) ?>
            </div>
        </div>

        <div class="col-md-9">
            <?php if ($model->brand->image): ?>
                <div class="brand-icon">
                    <?= Html::img(Product::getImage($model->brand->image)) ?>
                </div>
            <?php endif; ?>

            <div>
                <table class="table">
                    <?php if ($model->sku): ?>
                        <tr>
                            <td><strong>Артикул: </strong></td>
                            <td><?= Html::encode($model->sku) ?></td>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <td><strong>Категория: </strong></td>
                        <td><?= Html::encode($model->categoryName) ?></td>
                    </tr>
                    <?php if ($model->price) : ?>
                        <tr>
                            <td><strong>Стоимость: </strong></td>
                            <td><?= Html::encode($model->price) ?></td>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <td><strong>Бренд: </strong></td>
                        <td><?= Html::a($model->brand->name, Url::to(['catalog/brand', 'slug' => $model->brand->slug])) ?></td>
                    </tr>
                    <tr>
                        <td><strong>Наличие: </strong></td>
                        <td><?= Html::encode($model->status->name) ?></td>
                    </tr>
                    <?php if ($model->stock_status_id == 1 && $model->quantity): ?>
                        <tr>
                            <td><strong>Доступное количество: </strong></td>
                            <td><?= Html::encode($model->quantity) ?></td>
                        </tr>
                    <?php endif; ?>

                    <?php if ($attributes): ?>
                        <?php foreach ($attributes as $key => $value): ?>
                            <tr>
                                <td><strong> <?= $key ?>:</strong></td>
                                <td><span class="attribut-value"> <?= $value ?> </span></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </table>
            </div>
            <?php if ($model->description) : ?>
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <h4>Описание товара:</h4>
                            <?= $model->description ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php if ($variations): ?>
        <div class="row" id="varation-list">
            <div class="col-md-12">
                <h4>Вариации товара</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Название</th>
                            <th>Артикул</th>
                            <th>Количество</th>
                            <th>Цена</th>
                        </tr>
                        </thead>
                        <?php foreach ($variations as $variation): ?>
                            <tr>
                                <td class="thumbnail"><?= $variation['image'] ? Html::img(Product::getImage($variation['image'])) : Html::img(Product::getImage($model->image)) ?></td>
                                <td><?= Html::encode($variation['name']) ?></td>
                                <td><?= Html::encode($variation['sku']) ?></td>
                                <td><?= Html::encode($variation['quantity']) ?></td>
                                <td><?= Html::encode($variation['price']) ?></td>
                                <td><?= Html::button('<i class="fa fa-shopping-cart" aria-hidden="true"></i> Заказать', ['class' => 'btn btn-info']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php ?>
            </div>
        </div>
    <?php endif; ?>

</div>

