<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Anhsach;

/**
 * AnhsachSearch represents the model behind the search form about `common\models\Anhsach`.
 */
class AnhsachSearch extends Anhsach
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sach_id', 'ord'], 'integer'],
            [['img', 'thumbnail'], 'safe'],
            [['active'], 'boolean'],
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
        $query = Anhsach::find();

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
            'sach_id' => $this->sach_id,
            'ord' => $this->ord,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'thumbnail', $this->thumbnail]);

        return $dataProvider;
    }
}
