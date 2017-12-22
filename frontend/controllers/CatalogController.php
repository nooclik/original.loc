<?php
/**
 * Created by PhpStorm.
 * User: админ
 * Date: 13.12.2017
 * Time: 11:49
 */

namespace frontend\controllers;


use common\models\Category;
use common\models\Product;
use common\models\ProductCategory;
use common\models\Brand;
use yii\db\Query;
use yii\web\Controller;
use yii\helpers\Html;
use Yii;

class CatalogController extends Controller
{
    public function actionCategory($slug)
    {
        $items = ProductCategory::find()->with('product')->where(['category_id' => $this->findCategoryBySlug($slug)])->all();
        $brands = Yii::$app->db->createCommand('SELECT DISTINCT (p.brand_id) AS id, b.name FROM product p LEFT JOIN brand b ON p.brand_id = b.id WHERE p.id IN 
                                          (SELECT DISTINCT pc.product_id FROM product_category pc WHERE pc.category_id = :id) ORDER BY b.name')
            ->bindValue(':id', $this->findCategoryBySlug($slug))->queryAll();

        if ($post = Yii::$app->request->post()) {
            $items = Product::find()->where(['brand_id' => $post['brand']])->all();
            /*$items = Yii::$app->db->createCommand('SELECT * FROM product p WHERE  p.brand_id IN (:list)')
                ->bindValue(':list', implode(', ', $post['brand']))->queryAll();
            */
            $check_brand = $post['brand'];
        }

        return $this->render('category', compact('items', 'brands', 'check_brand'));
    }

    public function actionProduct($slug)
    {
        $model = $this->findModelProductBySlug($slug);
        return $this->render('product', compact('model', 'slug'));
    }

    public function actionBrands (){

        $model = Product::find()->select('product.brand_id, brand.name, brand.image, brand.description, brand.slug')->distinct()->joinWith('brand')->all();
        return $this->render('brands', compact('model'));
    }

    public function actionBrand($slug) {

        $items = Product::find()->where(['brand_id' => $this->findBrandBySlug($slug)])->all();
        return $this->render('brand', compact('items'));
    }

    protected function findModelProductBySlug($slug)
    {
        if (($model = Product::findOne(['slug' => $slug])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException();
        }
    }

    protected function findCategoryBySlug($slug) {
        $category = Category::find()->where(['slug' => $slug])->one();
        return $category->id;
    }

    protected function findBrandBySlug($slug) {
        $brand = Brand::find()->where(['slug' => $slug])->one();
        return $brand->id;
    }

    protected function findModelCategoryBySlug($slug)
    {
        if (($model = Category::findOne(['slug' => $slug])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException();
        }
    }
}