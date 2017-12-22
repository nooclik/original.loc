<?php
/**
 * Created by PhpStorm.
 * User: админ
 * Date: 15.12.2017
 * Time: 20:20
 */
use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="row" id="brands">
    <div class="col-md-12">
        <ul>
            <?php foreach ($model as $item): ?>
                <li>
                    <?php if ($item->description): ?>
                        <?= Html::a($item->name, Url::to(['catalog/brand', 'slug' => $item->slug]), ['class'=> 'color-tooltip','data-toggle' => 'tooltip', 'data-placement' => 'right',  'title' => $item->description]) ?>
                    <?php else : ?>
                        <?= Html::a($item->name, ['catalog/brand', 'slug' => $item->slug]) ?>
                    <?php endif; ?>

                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<?php
$this->registerJS ("
$(document).ready(function(){
    $('[data-toggle=\"tooltip\"]').tooltip(); 
});

");