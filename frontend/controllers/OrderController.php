<?php
/**
 * Created by PhpStorm.
 * User: Админ
 * Date: 26.12.2017
 * Time: 19:28
 */

namespace frontend\controllers;

use yii\web\Controller;
use Yii;
use common\models\Order;

class OrderController extends Controller
{
    public function actionOrder ($product_id, $variation_id) {
        $model = Yii::$app->db->createCommand('SELECT p.name AS product, v.name AS variation, pv.price, pv.sku FROM product p LEFT JOIN product_variation pv ON p.id = pv.product_id LEFT JOIN variation v ON pv.variation_id = v.id WHERE pv.variation_id = :variation_id AND pv.product_id = :product_id')
            ->bindValue(':product_id', $product_id)
            ->bindValue('variation_id', $variation_id)
            ->queryOne();

        $order = new Order();
        $order->product_id = $product_id;
        $order->variation_id = $variation_id;

        if ($post = Yii::$app->request->post()) {
            $order->quantity = $post['quantity'];
            $order->price = $model['price'];
            $order->save();
        }

        return $this->render('order', compact('model'));
    }

}