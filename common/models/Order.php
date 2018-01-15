<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $variation_id
 * @property integer $quantity
 * @property string $price
 * @property string $date_publish
 * @property string $date_update
 * @property integer $user_id
 * @property string $contact_info
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'quantity', 'user_id'], 'integer'],
            [['price'], 'number'],
            [['date_publish', 'date_update'], 'safe'],
            [['variation_id', 'contact_info'], 'string', 'max' => 255],
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
            'variation_id' => 'Variation ID',
            'quantity' => 'Quantity',
            'price' => 'Price',
            'date' => 'Date',
            'user_id' => 'User ID',
        ];
    }

    public function behaviors()
    {
        return [
            'Time' =>
                [
                    'class' => TimestampBehavior::className(),
                    'createdAtAttribute' => 'date_publish',
                    'updatedAtAttribute' => 'date_update',
                    'value' => new Expression('NOW()'),
                ],
        ];
    }
}
