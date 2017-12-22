<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "attribute_value".
 *
 * @property integer $id
 * @property string $name
 * @property integer $attribute_id
 */
class AttributeValue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attribute_value';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attribute_id'], 'integer'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Значение',
            'attribute_id' => 'Атрибут',
        ];
    }
}
