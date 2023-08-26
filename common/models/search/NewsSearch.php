<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\News;

/**
 * NewsSearch represents the model behind the search form about `common\models\News`.
 */
class NewsSearch extends News
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'hot', 'home', 'active', 'luotxem', 'lang_id', 'cat_new_id'], 'integer'],
            [['title', 'image', 'url', 'brief', 'content', 'posted_date', 'tags', 'seo_title', 'seo_keyword', 'seo_desc'], 'safe'],
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
        $query = News::find();

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
            'hot' => $this->hot,
            'home' => $this->home,
            'active' => $this->active,
            'luotxem' => $this->luotxem,
            'lang_id' => $this->lang_id,
            'cat_new_id' => $this->cat_new_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'brief', $this->brief])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'posted_date', $this->posted_date])
            ->andFilterWhere(['like', 'tags', $this->tags])
            ->andFilterWhere(['like', 'seo_title', $this->seo_title])
            ->andFilterWhere(['like', 'seo_keyword', $this->seo_keyword])
            ->andFilterWhere(['like', 'seo_desc', $this->seo_desc])
            ->orderBy("id desc")
        ;

        return $dataProvider;
    }
}
