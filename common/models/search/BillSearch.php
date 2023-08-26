<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Bill;

/**
 * BillSearch represents the model behind the search form about `common\models\Bill`.
 */
class BillSearch extends Bill
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'std','status', 'email', 'content', 'address', 'order_time'], 'safe'],
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
        $query = Bill::find();

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
            'order_time' => $this->order_time,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'std', $this->std])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
    public function timkiem($iddh){
        $query = Bill::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);
        $query->andFilterWhere(['id'=>$iddh]);
        return $dataProvider;
    }
}
