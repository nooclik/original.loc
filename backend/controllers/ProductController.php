<?php

namespace backend\controllers;

use common\models\AttributeValue;
use common\models\Brand;
use common\models\Category;
use common\models\ProductCategory;
use common\models\ProductVariation;
use common\models\ProductAttribut;
use common\models\StockStatus;
use common\models\Variation;
use Yii;
use common\models\Product;
use backend\models\ProductSearch;
use yii\db\Exception;
use yii\helpers\ArrayHelper;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
        $model->save();
        Yii::$app->response->redirect(["product/update", "id" => $model->id]);

    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelCategory = ProductCategory::find()->where(['product_id' => $id])->one();
        $stock_status = ArrayHelper::map(StockStatus::find()->select('id, name')->asArray()->all(), 'id', 'name');
        $brand = ArrayHelper::map(Brand::find()->select('id, name')->asArray()->all(), 'id', 'name');
        $category = ArrayHelper::map(Category::find()->select('id, name')->all(), 'id', 'name');

        $productVariations = ProductVariation::find()->where(['product_id' => $model->id])->all();
        $variationModel = new ProductVariation();
        $attributModel = new ProductAttribut();

        $dataProductAttribut = ProductAttribut::find()->where(['product_id' => $model->id])->all();

        if (Yii::$app->request->isAjax) {
            if (Yii::$app->request->get('update')) {
                $variationModel = ProductVariation::findOne(Yii::$app->request->get('update'));
            }
        }

        $variations = ArrayHelper::map(Variation::find()->select('id, name')->asArray()->all(), 'id', 'name');

        $model->category = Product::GetCategoryId($model->id);
        $model->selective = $model->selective;
        $model->tags = unserialize($model->tags);
        $meta = unserialize($model->meta);
        $model->meta_tag_title = $meta['meta_tag_title'];
        $model->meta_tag_description = $meta['meta_tag_description'];
        $model->meta_tag_keywords = $meta['meta_tag_keywords'];

        if ($variationModel->load(Yii::$app->request->post())) { //Если отправлена вариация
            if ($variationModel->variation_id) {
                $variationModel->save();
                $variationModel->variation_id = null;
                $variationModel->price = null;
                $variationModel->quantity = null;
                $variationModel = new ProductVariation();
                $productVariations = ProductVariation::find()->where(['product_id' => $model->id])->all();
            }
        }

        if ($attributModel->load(Yii::$app->request->post())) { //Если отправлен атрибут
            if ($attributModel->attribu_value_id) {
                $attributModel->product_id = $model->id;
                $attributModel->save();
                $attributModel = new ProductAttribut();
            }
            $dataProductAttribut = ProductAttribut::find()->where(['product_id' => $model->id])->all();
        }

        $variationModel->product = $model->id;
        $attributModel->product = $model->id;

        if ($model->load(Yii::$app->request->post())) {
            $model->tags = serialize($model->tags);
            if ($modelCategory) {
                $modelCategory->category_id = $model->category;
            } else {
                $modelCategory = new ProductCategory();
                $modelCategory->product_id = $model->id;
                $modelCategory->category_id = $model->category;
            }
            $modelCategory->save();

            $meta = [
                'meta_tag_title' => $model->meta_tag_title,
                'meta_tag_description' => $model->meta_tag_description,
                'meta_tag_keywords' => $model->meta_tag_keywords,
            ];

            $model->meta = serialize($meta);
            $model->save();
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('create', compact('model', 'stock_status', 'brand', 'meta', 'category',
                'variationModel', 'variations', 'product_variation', 'productVariations', 'attributModel', 'dataProductAttribut'));
        }
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionVariation()
    {
        if (Yii::$app->request->isPost) {
            print_r(Yii::$app->request->post('price'));
        }
        //return $this->render('variation');
    }

    public function actionAttributDelete()
    {
        if (Yii::$app->request->isAjax) {
            ProductAttribut::findOne(Yii::$app->request->post("id"))->delete();
        }
    }

    public function actionVariationDelete()
    {
        if (Yii::$app->request->isAjax) {
            ProductVariation::findOne(Yii::$app->request->post("id"))->delete();
        }
    }

    public function actionQuickEdit()
    {
        if (Yii::$app->request->isAjax) {
            $post = Yii::$app->request->post();
            $model = Product::findOne($post['id']);
            $model->name = $post['name'];
            $model->price = $post['price'];
            $model->quantity = $post['quantity'];
            $model->stock_status_id = $post['status'];
            $model->save();

        }
    }

    public function actionGetDataForQuickEdit()
    {
        if (Yii::$app->request->isAjax) {
            $id = Yii::$app->request->post('id');
            $data = Product::findOne($id);
        }
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $data;
    }

    public function actionImportProduct()
    {
        $inputFile = 'uploads/full_price.xls';

        try {
            $inputTypeFile = \PHPExcel_IOFactory::identify($inputFile);
            $objReader = \PHPExcel_IOFactory::createReader($inputTypeFile);
            $objPHPExcel = $objReader->load($inputFile);
        } catch (Exception $err) {
            die($err);
        }

        $objPHPExcel->setActiveSheetIndex(0);

        $objWorksheet = $objPHPExcel->getActiveSheet();
        $highestRow = $objWorksheet->getHighestRow();

        for ($row = 2; ($row <= $highestRow); $row++) {
            if ($objWorksheet->getCell('H' . $row)->getValue() == 'В') {

                $s_product = (int) $this->getProductIdByName(trim($objWorksheet->getCell('I' . $row)->getValue()));

                $variation = new ProductVariation();
                $variation->product_id = $s_product;
                $variation->variation_id = (int) $this->getVariationIdByName($objWorksheet->getCell('J' . $row)->getValue());
                $variation->sku = $objWorksheet->getCell('B' . $row)->getValue();
                $variation->image = $objWorksheet->getCell('X' . $row)->getValue();
                $variation->stock_status_id = 1;
                $variation->update();

            } else {
                $product = new Product();
                $product->name = trim($objWorksheet->getCell('I' . $row)->getValue());
                $product->brand_id = (int)$this->getBrandIdByName($objWorksheet->getCell('G' . $row)->getValue());
                $product->stock_status_id = 1;
                $product->image = $objWorksheet->getCell('X' . $row)->getValue();
                $product->description = $objWorksheet->getCell('V' . $row)->getValue();
                $product->save();

                $category = new ProductCategory();
                $category->product_id = $product->id;
                $category->category_id = $this->getCategory($objWorksheet->getCell('L' . $row)->getValue());
                $category->save();

                $variation = new ProductVariation();
                    $variation->product_id = $product->id;
                    $variation->variation_id = (int) $this->getVariationIdByName($objWorksheet->getCell('J' . $row)->getValue());
                    $variation->sku = $objWorksheet->getCell('B' . $row)->getValue();
                    $variation->image = $objWorksheet->getCell('X' . $row)->getValue();
                    $variation->stock_status_id = 1;
                $variation->save();
            }
        }
        return $this->render('import');
    }

    public function actionUpdateCategory () {
        $inputFile = 'uploads/full_price.xls';

        try {
            $inputTypeFile = \PHPExcel_IOFactory::identify($inputFile);
            $objReader = \PHPExcel_IOFactory::createReader($inputTypeFile);
            $objPHPExcel = $objReader->load($inputFile);
        } catch (Exception $err) {
            die($err);
        }

        $objPHPExcel->setActiveSheetIndex(0);

        $objWorksheet = $objPHPExcel->getActiveSheet();
        $highestRow = $objWorksheet->getHighestRow();

        for ($row = 2; ($row <= $highestRow); $row++) {
            if ($objWorksheet->getCell('H' . $row)->getValue() == 'В') {
                continue;
            } else {
                $product_id = $this->getProductIdByName(trim($objWorksheet->getCell('I' . $row)->getValue()));

                $category_id = ProductCategory::find()->where(['product_id' => $product_id])->one()->id;

                $category = ProductCategory::findOne($category_id);

                $category->category_id = $this->getCategory($objWorksheet->getCell('L' . $row)->getValue());
                $category->save();
            }
        }
        return $this->render('import');
    }


    private
    function getBrandIdByName($name)
    {
        return Brand::find()->select('id')->where(['name' => $name])->one()->id;
    }

    private
    function getVariationIdByName($name)
    {
        return Variation::find()->select('id')->where(['name' => trim($name)])->one()->id;
    }

    private
    function getCategory($name)
    {
        switch ($name) {
            case 'M':
                $id = 3;
                break;
            case 'L':
                $id = 2;
                break;
            case 'U':
                $id = 4;
                break;
        }
        return $id;
    }

    private
    function getProductIdByName($name)
    {
        return Product::find()->select('id')->where(['name' => $name])->one()->id;
    }

    private
    function getStatusId($name)
    {

    }

    public
    function actionSubcat()
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                $out = AttributeValue::find()->where(['attribute_id' => $cat_id])->asArray()->all();
                echo Json::encode(['output' => $out, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }
}
