<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "options".
 *
 * @property string $option_name
 * @property string $option_value
 */
class Options extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'options';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['option_name'], 'string', 'max' => 50],
            [['option_value'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'option_name' => 'Option Name',
            'option_value' => 'Option Value',
        ];
    }
}
