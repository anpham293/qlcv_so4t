<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Congvanhanhchinh;

/**
 * CongvanhanhchinhSearch represents the model behind the search form about `common\models\Congvanhanhchinh`.
 */
class CongvanhanhchinhSearch extends Congvanhanhchinh
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'loaivbhc_id', 'coquanbanhanh_id', 'Linhvucvanban_id'], 'integer'],
            [['sokyhieu', 'ngaybanhanh', 'ngayhieuluc', 'nguoiky', 'trichyeu', 'link'], 'safe'],
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
        $query = Congvanhanhchinh::find();

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
            'ngaybanhanh' => $this->ngaybanhanh,
            'ngayhieuluc' => $this->ngayhieuluc,
            'active' => $this->active,
            'loaivbhc_id' => $this->loaivbhc_id,
            'coquanbanhanh_id' => $this->coquanbanhanh_id,
            'Linhvucvanban_id' => $this->Linhvucvanban_id,
        ]);

        $query->andFilterWhere(['like', 'sokyhieu', $this->sokyhieu])
            ->andFilterWhere(['like', 'nguoiky', $this->nguoiky])
            ->andFilterWhere(['like', 'trichyeu', $this->trichyeu])
            ->andFilterWhere(['like', 'link', $this->link]);

        return $dataProvider;
    }
}
