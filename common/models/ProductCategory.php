<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_category".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $category_id
 */
class ProductCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'category_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'category_id' => 'Category ID',
        ];
    }

    public function getProduct () {
        return $this->hasMany(Product::className(), ['id' => 'product_id']);
    }

}
