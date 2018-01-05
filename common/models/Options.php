<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "options".
 *
 * @property string $option_name
 * @property string $option_value
 * @property string $types
 */
class Options extends \yii\db\ActiveRecord
{
    const TYPE_FILTER = ['select' => 'Выпадающий список', 'checkbox' => 'Флаг'];
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

    static function ShowPrice() //Отображать цены или нет
    {
        $value = Options::find()->select('option_value')
            ->where(['option_name' => 'show_price'])->one()->option_value;
        return $value == 1 ? true : false;
    }

    static function FilterType() //Тип поля фильтра брендов
    {
        return $value = Options::find()->select('option_value')
            ->where(['option_name' => 'filter_type'])->one()->option_value;
    }

    static function CountElementOnPage() //Количество элементов на странице категории
    {
        return $value = Options::find()->select('option_value')
            ->where(['option_name' => 'page_count'])->one()->option_value;
    }
}
