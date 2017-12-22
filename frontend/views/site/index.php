<?php
use yii\bootstrap\Carousel;
use common\models\Product;
use common\models\Carousel as Slider;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="jumbotron">
            <?php
            if (!empty(Slider::getSlides())) {
                Slider::$height = '350px';
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
    <div class="row">
        <div class="col-md-3 col-sm-1"><img src="/frontend/web/uploads/images/1512916882.jpg" width="250px  " alt=""></div>
        <div class="col-md-3 col-sm-1"><img src="/frontend/web/uploads/images/1512916882.jpg" width="250px  " alt=""></div>
        <div class="col-md-3 col-sm-1"><img src="/frontend/web/uploads/images/1512916882.jpg" width="250px  " alt=""></div>
        <div class="col-md-3 col-sm-1"><img src="/frontend/web/uploads/images/1512916882.jpg" width="250px  " alt=""></div>
        <div class="col-md-3 col-sm-1"><img src="/frontend/web/uploads/images/1512916882.jpg" width="250px  " alt=""></div>
        <div class="col-md-3 col-sm-1"><img src="/frontend/web/uploads/images/1512916882.jpg" width="250px  " alt=""></div>
        <div class="col-md-3 col-sm-1"><img src="/frontend/web/uploads/images/1512916882.jpg" width="250px  " alt=""></div>
        <div class="col-md-3 col-sm-1"><img src="/frontend/web/uploads/images/1512916882.jpg" width="250px  " alt=""></div>
    </div>
</div>



