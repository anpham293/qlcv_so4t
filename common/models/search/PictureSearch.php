<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Picture;

/**
 * PictureSearch represents the model behind the search form about `common\models\Picture`.
 */
class PictureSearch extends Picture
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'home', 'ord'], 'integer'],
            [['image', 'posted_date','name', 'album_id'], 'safe'],
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
        $query = Picture::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith(['album']);
        $query->andFilterWhere([
            'id' => $this->id,
            'name' => $this->name,
            'home' => $this->home,
            'ord' => $this->ord,
        ]);

        $query->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'posted_date', $this->posted_date])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'album.name_vi', $this->album_id]);

        return $dataProvider;
    }
}
