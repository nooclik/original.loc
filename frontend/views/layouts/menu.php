<?php
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use common\models\Category;
use yii\helpers\Url;


NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);

$menuItems = [
    ['label' => 'Главная', 'url' => ['/site/index']],
    ['label' => 'Мужские', 'url' => Url::to(['catalog/category', 'slug' => 'muzhskiye'])],
    ['label' => 'Женские', 'url' => Url::to(['catalog/category', 'slug' => 'zhenskiye'])],
    ['label' => 'Унисекс', 'url' => Url::to(['catalog/category', 'slug' => 'uniseks'])],
    ['label' => 'Бренд', 'url' => Url::to(['catalog/brands'])],
    ['label' => 'Селектив', 'url' => Url::to(['catalog/selective'])],

];
if (Yii::$app->user->isGuest) {
    //$menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    //$menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
} else {
    $menuItems[] = '<li>'
        . Html::beginForm(['/site/logout'], 'post')
        . Html::submitButton(
            'Logout (' . Yii::$app->user->identity->username . ')',
            ['class' => 'btn btn-link logout']
        )
        . Html::endForm()
        . '</li>';
}
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $menuItems,
    'activateParents' => true,
]);
NavBar::end();
