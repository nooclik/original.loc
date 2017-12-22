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

    public function actionDelete ($id) {
        Carousel::findOne($id)->delete();

        $this->redirect('carousel');
    }

}