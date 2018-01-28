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
use yii\widgets\ListView;

?>
<?= Html::a(
    "<div class=\"image-container\">" . Html::img(Product::getImage($model->image)) . "</div>" .
    "<div class='name-container'>" . $model->name . '</div>',
    Url::to(['catalog/product', 'slug' => $model->slug])
) ?>

