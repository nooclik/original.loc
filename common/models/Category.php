<?php

namespace common\models;

use Yii;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $parent_id
 * @property string $image
 * @property integer $status
 * @property string $meta
 * @property string $date_publish
 * @property string $date_update
 */
class Category extends \yii\db\ActiveRecord
{
    public $meta_tag_title;
    public $meta_tag_description;
    public $meta_tag_keywords;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'status'], 'integer'],
            [['date_publish', 'date_update'], 'safe'],
            [['name', 'image', 'slug'], 'string', 'max' => 50],
            [['description', 'meta', 'meta_tag_title', 'meta_tag_description', 'meta_tag_keywords'], 'string', 'max' => 255],
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
            'Slug' => [
                'class' => 'Zelenin\yii\behaviors\Slug',
                'slugAttribute' => 'slug',
                'attribute' => 'name',
                // optional params
                'ensureUnique' => true,
                'replacement' => '-',
                'lowercase' => true,
                'immutable' => false,
                // If intl extension is enabled, see http://userguide.icu-project.org/transforms/general.
                'transliterateOptions' => 'Russian-Latin/BGN; Any-Latin; Latin-ASCII; NFD; [:Nonspacing Mark:] Remove; NFC;'
            ]

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'description' => 'Описание',
            'parent_id' => 'Родительская категория',
            'image' => 'Изображение',
            'status' => 'Состояние',
            'meta' => 'Мета',
            'date_publish' => 'Опубликовано',
            'date_update' => 'Обновлено',
        ];
    }
}
