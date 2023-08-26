<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Sach;

/**
 * SachSearch represents the model behind the search form about `common\models\Sach`.
 */
class SachSearch extends Sach
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'soluong', 'nhaxuatban_id', 'tacgia_id', 'namxb'], 'integer'],
            [['ten', 'nguoidich', 'mota'], 'safe'],
            [['active', 'hot'], 'boolean'],
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
        $query = Sach::find();

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
            'soluong' => $this->soluong,
            'active' => $this->active,
            'hot' => $this->hot,
            'nhaxuatban_id' => $this->nhaxuatban_id,
            'tacgia_id' => $this->tacgia_id,
            'namxb' => $this->namxb,
        ]);

        $query->andFilterWhere(['like', 'ten', $this->ten])
            ->andFilterWhere(['like', 'nguoidich', $this->nguoidich])
            ->andFilterWhere(['like', 'mota', $this->mota]);

        return $dataProvider;
    }
}
