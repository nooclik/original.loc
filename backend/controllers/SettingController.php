<?php
/**
 * Created by PhpStorm.
 * User: Админ
 * Date: 12.12.2017
 * Time: 20:02
 */

namespace backend\controllers;

use yii\data\ActiveDataProvider;
use yii\web\Controller;
use common\models\Carousel;
use Yii;
Use common\models\Options;

class SettingController extends Controller
{
    public function actionCarousel(){

        $model = new Carousel();

        $query = Carousel::find();
        $dataProvider = new ActiveDataProvider(['query' => $query]);

        if ($model->load(Yii::$app->request->post()) ) {
            $model->save();
        }

        return $this->render('carousel', compact('dataProvider', 'model'));
    }

    public function actionDeleteCarouselItem ($id) {
        Carousel::findOne($id)->delete();
        $this->redirect('carousel');
    }

    public function actionGeneralSettings () {


        if ($post = Yii::$app->request->post()) {
            Options::updateAll(['option_value' => $post['show-price']], ['=', 'option_name', 'show_price']);
            Options::updateAll(['option_value' => $post['type-filter']], ['=', 'option_name', 'filter_type']);
            Options::updateAll(['option_value' => $post['count-page']], ['=', 'option_name', 'page_count']);
        }

        $showPrice = Options::ShowPrice();
        $typeFilter = Options::FilterType();
        $countPage = (int) Options::CountElementOnPage();
        $types = Options::TYPE_FILTER;

        return $this->render('general-settings', compact('showPrice', 'typeFilter', 'types', 'countPage'));
    }



}