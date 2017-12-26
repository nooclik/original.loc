<?php
/**
 * Created by PhpStorm.
 * User: админ
 * Date: 12.12.2017
 * Time: 8:11
 */
use frontend\widgets\slick\SlickAsset;
use yii\helpers\Html;

?>
    <div class="row">
        <div class="col-md-12">
            <div class="slick">
                <?php foreach ($items as $item): ?>
                    <div style="width: 250px;">
                        <div class="image-container">
                            <?= Html::img(\common\models\Product::getImage($item->image), ['width' => '250px  ']); ?>
                        </div>
                        <?= Html::a($item->name, \yii\helpers\Url::to(['catalog/product', 'slug' => $item->slug])) ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php
SlickAsset::register($this);
