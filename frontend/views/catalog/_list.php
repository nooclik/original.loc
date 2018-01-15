<?php
/**
 * Created by PhpStorm.
 * User: Админ
 * Date: 13.01.2018
 * Time: 17:37
 */
use yii\helpers\Html;

?>

    <div class="image-container">
        <?= Html::img(\common\models\Product::getImage($model->image)) ?>
    </div>
    <div class="name-container">
        <?= Html::a($model->name, \yii\helpers\Url::to(['catalog/product', 'slug' => $model->slug])) ?>
    </div>

<?php
/*
$this->registerJS('
$(document).ready(function(){
    //$(".container").each(function(){
        var highestBox = 0;
        $(".item", this).each(function(){
            if($(this).height() > highestBox) {
                highestBox = $(this).height();
            }
        });
        $(".item" ,this).height(highestBox);
    //});
});
');
*/