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
use frontend\models\SelectiveSearch;
use common\models\Brand;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use Yii;
use frontend\models\ProductSearch;
use frontend\models\BrandSearch;

class CatalogController extends Controller
{
    public function actionCategory($slug)
    {

        $modelSearch = new ProductSearch();
        $brand = ArrayHelper::map(
            Product::find()->select('brand_id as id, brand.name as name')->distinct()->joinWith('brand')->joinWith('categorys')
                ->where(['product_category.category_id' => $this->findCategoryBySlug($slug)])->all(), 'id', 'name'
        );
        $dataProvider = $modelSearch->search(Yii::$app->request->queryParams, $slug, $where = 'category.slug');

        return $this->render('category', compact('modelSearch', 'dataProvider', 'slug', 'brand'));
    }

    public function actionProduct($slug)
    {
        $model = $this->findModelProductBySlug($slug);
        return $this->render('product', compact('model', 'slug'));
    }

    public function actionBrands()
    {

        if (!$index = Yii::$app->request->get('index')) {
            $model = Product::find()->select('product.brand_id, brand.name, brand.image, brand.description, brand.slug')->distinct()->joinWith('brand')->all();
        } else {
            $model = Product::find()->select('product.brand_id, brand.name, brand.image, brand.description, brand.slug')->distinct()
                ->where(['like', 'brand.name', $index . '%', false])->joinWith('brand')->all();
        }
        return $this->render('brands', compact('model'));
    }

    public function actionSelective()
    {
        $modelSearch = new SelectiveSearch();
        $dataProvider = $modelSearch->search(Yii::$app->request->queryParams);

        $minPrice = Product::find()->joinWith('variation')
            ->where(['product.selective' => true])->min('product_variation.price');

        $maxPrice = Product::find()->joinWith('variation')
            ->where(['product.selective' => true])->max('product_variation.price');

        return $this->render('selective', compact('modelSearch', 'dataProvider', 'minPrice', 'maxPrice'));
    }

    public function actionTotalCount(){
        if ($post = Yii::$app->request->post()) {
            $count = Product::find()->joinWith('categorys')
                ->where(['product.brand_id'=>$post['id'], 'product_category.category_id' => $this->findCategoryBySlug($post['slug'])])->count();
            return $count;
        }
    }

    public function actionBrand($slug)
    {
        $model = new BrandSearch();
        $dataProvider = $model->search(Yii::$app->request->queryParams, $this->findBrandBySlug($slug));

        $minPrice = Product::find()->joinWith('variation')
            ->where(['product.brand_id' => $this->findBrandBySlug($slug)])->min('product_variation.price');

        $maxPrice = Product::find()->joinWith('variation')
            ->where(['product.brand_id' => $this->findBrandBySlug($slug)])->max('product_variation.price');


        return $this->render('brand', compact('model', 'dataProvider', 'slug', 'minPrice', 'maxPrice'));

    }

    private function findModelProductBySlug($slug)
    {
        if (($model = Product::findOne(['slug' => $slug])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException();
        }
    }

    private function findCategoryBySlug($slug)
    {
        $category = Category::find()->where(['slug' => $slug])->one();
        return $category->id;
    }

    private function findBrandBySlug($slug)
    {
        $brand = Brand::find()->where(['slug' => $slug])->one();
        return $brand->id;
    }

    private function findModelCategoryBySlug($slug)
    {
        if (($model = Category::findOne(['slug' => $slug])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException();
        }
    }
}