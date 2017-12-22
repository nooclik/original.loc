<?php

namespace frontend\widgets\slick;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class SlickAsset extends AssetBundle
{
    public $sourcePath = '@frontend/widgets/slick/assets';
    public $basePath = '@frontend/widgets/slick/assets';
    public $css = [
        'css/slick.css',
        'css/slick-theme.css',
    ];
    public $js = [
        'js/slick.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
