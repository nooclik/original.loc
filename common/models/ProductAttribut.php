<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_attribut".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $attribut_id
 * @property integer $attribu_value_id
 */
class ProductAttribut extends \yii\db\ActiveRecord
{
    public $product;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_attribut';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['product_id', 'attribut_id', 'attribu_value_id'], 'required'],
            [['product_id', 'attribut_id', 'attribu_value_id'], 'integer'],
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
            'attribut_id' => 'Атрибут',
            'attribu_value_id' => 'Значение атрибута',
        ];
    }

    public function getAttributName()
    {
        return $this->hasOne(Attribute::className(), ['id' => 'attribut_id']);
    }

    public function getValueName()
    {
        return $this->hasOne(AttributeValue::className(), ['id' => 'attribu_value_id']);
    }
}
