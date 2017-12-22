<?php
/**
 * Created by PhpStorm.
 * User: Админ
 * Date: 11.12.2017
 * Time: 22:40
 */
namespace frontend\widgets\slick;

use Yii;
use yii\bootstrap\Widget;
use yii\helpers\Html;

class SlickWidget extends Widget
{
    public $items = [];
    public $options = [];
    public $a = 3;
    public function init()
    {
        parent::init();
        self::regPlugin();
    }

    public function run()
    {
        return $this->render('slider', ['items' => $this->items, 'options' => $this->options]);
    }

    private function regPlugin()
    {
        $slidesToShow = $this->options['slidesToShow']; //Количество отображаемых
        $speed =  $this->options['speed'] ? $this->options['speed'] : 300; //Скорость
        $autoplay = $this->options['autoplay'] ? $this->options['autoplay'] : 'true'; //Автопрокрутка
        $dots = $this->options['dots'] ? $this->options['dots'] : 'true'; //Точки

        $view = Yii::$app->getView();
        $view->registerJs("
            $('.slick').slick({
              dots: $dots,
              infinite: true,
              autoplay: $autoplay,
              autoplaySpeed: 2000,
              speed: $speed,
              slidesToShow: $slidesToShow,
              slidesToScroll: $slidesToShow,
              responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                  }
                },
                {
                  breakpoint: 600,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                  }
                },
                {
                  breakpoint: 480,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
              ]
            });
         ");
    }
}