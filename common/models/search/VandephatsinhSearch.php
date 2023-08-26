<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Vandephatsinh;

/**
 * VandephatsinhSearch represents the model behind the search form about `common\models\Vandephatsinh`.
 */
class VandephatsinhSearch extends Vandephatsinh
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'phieumuon_id'], 'integer'],
            [['chitiet', 'nguoitiepnhanxuly', 'nguoixulychinh', 'thoigiantiepnhan', 'thoigianxulyhoantat', 'trangthai'], 'safe'],
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
        $query = Vandephatsinh::find();

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
            'thoigiantiepnhan' => $this->thoigiantiepnhan,
            'thoigianxulyhoantat' => $this->thoigianxulyhoantat,
            'phieumuon_id' => $this->phieumuon_id,
        ]);

        $query->andFilterWhere(['like', 'chitiet', $this->chitiet])
            ->andFilterWhere(['like', 'nguoitiepnhanxuly', $this->nguoitiepnhanxuly])
            ->andFilterWhere(['like', 'nguoixulychinh', $this->nguoixulychinh])
            ->andFilterWhere(['like', 'trangthai', $this->trangthai]);

        return $dataProvider;
    }
}
