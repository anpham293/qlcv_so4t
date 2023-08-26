<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Catproduct;

/**
 * CatproductSearch represents the model behind the search form about `common\models\Catproduct`.
 */
class CatproductSearch extends Catproduct
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ord', 'home', 'active', 'lang_id', 'parent', 'menustyle', 'menu'], 'integer'],
            [['url', 'name', 'image', 'small_icon', 'description', 'brief', 'background', 'seo_title', 'seo_desc', 'seo_keyword'], 'safe'],
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
        $query = Catproduct::find();

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
            'ord' => $this->ord,
            'home' => $this->home,
            'active' => $this->active,
            'menu' => $this->menu,
            'lang_id' => $this->lang_id,
            'parent' => $this->parent,
        ]);

        $query->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'small_icon', $this->small_icon])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'brief', $this->brief])
            ->andFilterWhere(['like', 'seo_title', $this->seo_title])
            ->andFilterWhere(['like', 'seo_desc', $this->seo_desc])
            ->andFilterWhere(['like', 'seo_keyword', $this->seo_keyword]);

        return $dataProvider;
    }
}
