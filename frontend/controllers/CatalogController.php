<?php
/**
 * Created by PhpStorm.
 * User: админ
 * Date: 13.12.2017
 * Time: 11:49
 */

namespace frontend\controllers;


use common\models\Category;
use common\models\Options;
use common\models\Product;
use common\models\ProductCategory;
use common\models\Brand;
use yii\web\Controller;
use Yii;
use yii\data\Pagination;

class CatalogController extends Controller
{
    public function actionCategory($slug)
    {
        $model = ProductCategory::find()->with('product')->where(['category_id' => $this->findCategoryBySlug($slug)]);
        $filter_value = Yii::$app->db->createCommand('SELECT DISTINCT (p.brand_id) AS id, b.name FROM product p LEFT JOIN brand b ON p.brand_id = b.id WHERE p.id IN 
                                          (SELECT DISTINCT pc.product_id FROM product_category pc WHERE pc.category_id = :id) ORDER BY b.name')
            ->bindValue(':id', $this->findCategoryBySlug($slug))->queryAll();

        if ($post = Yii::$app->request->post()) {
            $model = Product::find()->joinWith('productCategory')
                ->where(['category_id' => $this->findCategoryBySlug($slug)])
                ->andWhere(['brand_id' => $post['filter_value']])
                ;

            $check_filter_value = $post['filter_value'];
        }

        $pages = new Pagination(['totalCount' => $model->count(), 'defaultPageSize' => Options::CountElementOnPage()]);

        $items = $model->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('category', compact('items', 'pages', 'filter_value', 'check_filter_value', 'slug'));
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

    public function actionSelective ()
    {
        $items = Product::find()->where(['selective' => 1])->all();
        $filter_value = Category::find()->select('id, name')->all();

        if ($post = Yii::$app->request->post()) {
            $items = ProductCategory::find()->joinWith('product')->where(['category_id' => $post['filter_value'], 'product.selective' => 1])->all();
            $check_filter_value = $post['filter_value'];
        }
        return $this->render('selective', compact('items', 'filter_value', 'check_filter_value'));
    }

    public function actionBrand($slug) {

        $model = Product::find()->where(['brand_id' => $this->findBrandBySlug($slug)]);

        $pages = new Pagination(['totalCount' => $model->count(), 'defaultPageSize' => 12,]);
        $items = $model->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('brand', compact('items', 'pages'));
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