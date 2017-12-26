<?php
use yii\bootstrap\Carousel;
use common\models\Product;
use common\models\Carousel as Slider;

/* @var $this yii\web\View */

$this->title = 'Оригинал - и только';
?>
<div class="jumbotron">
    <?php
    if (!empty(Slider::getSlides())) {
        Slider::$height = '420px';
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
    <?php
    $model = Product::find()->select('image, name, slug')->all();
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

    <?php $items = Product::find()->orderBy(['date_publish' => SORT_DESC])->limit(8)->all(); ?>
    <?= $this->render('/catalog/_items', compact('items')) ?>
</div>



