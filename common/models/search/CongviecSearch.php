<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Congviec;

/**
 * CongviecSearch represents the model behind the search form about `\common\models\Congviec`.
 */
class CongviecSearch extends Congviec
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nguoigiao', 'nguoinhan', 'status', 'duan_id'], 'integer'],
            [['tencongviec', 'motacongviec', 'ngaygiao', 'ngayhoanthanh'], 'safe'],
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
    public function search($params,$ids)
    {
        $query = Congviec::find();

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
            'nguoigiao' => $this->nguoigiao,
            'nguoinhan' => $this->nguoinhan,
            'status' => $this->status,
            'duan_id' => $ids,
        ]);
        $query->andWhere(['<>','status',3]);
        $query->andFilterWhere(['like', 'tencongviec', $this->tencongviec])
            ->andFilterWhere(['like', 'motacongviec', $this->motacongviec])
            ->andFilterWhere(['like', 'ngaygiao', $this->ngaygiao])
            ->andFilterWhere(['like', 'ngayhoanthanh', $this->ngayhoanthanh]);
        return $dataProvider;
    }
}
