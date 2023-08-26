<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Product;

/**
 * ProductSearch represents the model behind the search form about `common\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'retail', 'sale', 'status', 'ord', 'home', 'hot','new', 'luotxem','cat_product_id', 'brand_id', 'active'], 'integer'],
            [['name', 'url', 'code', 'brief', 'decription', 'seo_title', 'seo_desc', 'seo_keyword',], 'safe'],
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
        $query = Product::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->andFilterWhere([
            'id' => $this->id,
            'retail' => $this->retail,
            'sale' => $this->sale,
            'status' => $this->status,
            'ord' => $this->ord,
            'home' => $this->home,
            'hot' => $this->hot,
            'new' => $this->new,
            'brand_id' => $this->brand_id,
            'cat_product_id' => $this->cat_product_id,
            'luotxem' => $this->luotxem,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'brief', $this->brief])
            ->andFilterWhere(['like', 'decription', $this->decription])
            ->andFilterWhere(['like', 'seo_title', $this->seo_title])
            ->andFilterWhere(['like', 'seo_desc', $this->seo_desc])
            ->andFilterWhere(['like', 'seo_keyword', $this->seo_keyword]);

        return $dataProvider;
    }
}
