<?php

namespace frontend\models;

use common\models\Options;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Product;

/**
 * ProductSearch represents the model behind the search form about `common\models\Product`.
 */
class SelectiveSearch extends Product
{
    /**
     * @inheritdoc
     */
    public $minPrice;
    public $maxPrice;

    public function rules()
    {
        return [
            [['id', 'brand_id', 'quantity', 'stock_status_id'], 'integer'],
            [['name', 'description', 'meta', 'tags', 'sku', 'image', 'date_publish', 'date_update', 'category'], 'safe'],
            [['price', 'minPrice', 'maxPrice'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */

    public function search($params)
    {
        $query = Product::find()->joinWith('categorys')->joinWith('variation')->where(['selective' => true]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => Options::CountElementOnPage(),
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'brand_id' => $this->brand_id,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'stock_status_id' => $this->stock_status_id,
            'date_publish' => $this->date_publish,
            'date_update' => $this->date_update,
            'product_category.category_id' => $this->category,
        ]);

        $query->andFilterWhere(['like', 'product.name', $this->name])
            ->andFilterWhere(['>', 'product_variation.price', $this->minPrice])
            ->andFilterWhere(['<', 'product_variation.price', $this->maxPrice])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'meta', $this->meta])
            ->andFilterWhere(['like', 'tags', $this->tags])
            ->andFilterWhere(['like', 'sku', $this->sku])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}

?>