<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Chitietphieumuon;

/**
 * ChitietphieumuonSearch represents the model behind the search form about `common\models\Chitietphieumuon`.
 */
class ChitietphieumuonSearch extends Chitietphieumuon
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'soluong', 'phieumuon_id', 'sach_id'], 'integer'],
            [['tinhtrang'], 'safe'],
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
        $query = Chitietphieumuon::find();

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
            'phieumuon_id' => $this->phieumuon_id,
            'sach_id' => $this->sach_id,
        ]);

        $query->andFilterWhere(['like', 'tinhtrang', $this->tinhtrang]);

        return $dataProvider;
    }
}
