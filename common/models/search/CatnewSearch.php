<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Catnew;

/**
 * CatnewSearch represents the model behind the search form about `common\models\Catnew`.
 */
class CatnewSearch extends Catnew
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'position', 'active', 'home', 'ord', 'lang_id', 'parent'], 'integer'],
            [['url', 'name', 'seo_title', 'seo_desc', 'seo_keyword'], 'safe'],
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
        $query = Catnew::find();

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
            'position' => $this->position,
            'active' => $this->active,
            'home' => $this->home,
            'ord' => $this->ord,
            'lang_id' => $this->lang_id,
            'parent' => $this->parent,
        ]);

        $query->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'seo_title', $this->seo_title])
            ->andFilterWhere(['like', 'seo_desc', $this->seo_desc])
            ->andFilterWhere(['like', 'seo_keyword', $this->seo_keyword]);

        return $dataProvider;
    }
}
