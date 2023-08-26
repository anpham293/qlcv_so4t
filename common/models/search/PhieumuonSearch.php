<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Phieumuon;

/**
 * PhieumuonSearch represents the model behind the search form about `common\models\Phieumuon`.
 */
class PhieumuonSearch extends Phieumuon
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'khachhang_id'], 'integer'],
            [['ngaymuon', 'ghichu', 'nguoilap', 'ngaytra', 'trangthaiphieu'], 'safe'],
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
        $query = Phieumuon::find();

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
            'ngaymuon' => $this->ngaymuon,
            'khachhang_id' => $this->khachhang_id,
            'ngaytra' => $this->ngaytra,
        ]);

        $query->andFilterWhere(['like', 'ghichu', $this->ghichu])
            ->andFilterWhere(['like', 'nguoilap', $this->nguoilap])
            ->andFilterWhere(['like', 'trangthaiphieu', $this->trangthaiphieu]);

        return $dataProvider;
    }
}
