<?php
use yii\bootstrap\Carousel;
use common\models\Product;
use common\models\Carousel as Slider;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

/* @var $this yii\web\View */

$this->title = 'Оригинал - и только';
?>
<div class="jumbotron">
    <?php
    if (!empty(Slider::getSlides())) {
        Slider::$height = 'auto';
        Slider::$width = '100%';
        echo Carousel::widget([
            'items' => Slider::getSlides(),
            'options' => [
                'style' => 'width:100%;' // Задаем ширину контейнера
            ],
        ]);
    }
    ?>
</div>

<div class="container">
    <div class="block_title">
        <h3>Селективная
            парфюмерия <?= Html::a('смотреть все', Url::to(['catalog/selective']), ['class' => 'all_product']) ?></h3>
    </div>
    <?php
    $model = Product::find()->select('image, name, slug')->where(['selective' => 1])->all();
    echo \frontend\widgets\slick\SlickWidget::widget(
        [
            'items' => $model,
            'options' =>
                [
                    'slidesToShow' => '4',
                ]
        ]
    ); ?>
</div>

<div class="container">
    <div class="block_title">
        <h3>Новинки товара</h3>
    </div>
    <?php ?>
    <?=
    ListView::widget([
        'dataProvider' => $items,
        'itemView' => '/catalog/_items',
        'options' => ['id' => 'items', 'class' => 'list-view'],
        'itemOptions' => [
            'tag' => 'div',
            'class' => 'item col-md-3',
        ],
        'layout' => '{items}',
    ]);
    ?>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="block_title">
                <h3>Алфавитный указатель</h3>
            </div>
            <div>
                <table id="index-array">
                    <tr>
                        <?php foreach ($indexArray as $index): ?>
                            <td><?= Html::a($index, Url::toRoute(['catalog/brands', 'index' => $index])) ?></td>
                        <?php endforeach; ?>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>