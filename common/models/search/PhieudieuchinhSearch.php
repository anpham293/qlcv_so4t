<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Phieudieuchinh;

/**
 * PhieudieuchinhSearch represents the model behind the search form about `common\models\Phieudieuchinh`.
 */
class PhieudieuchinhSearch extends Phieudieuchinh
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'soluong', 'sach_id'], 'integer'],
            [['nguoidieuchinh', 'ngaydieuchinh', 'lydodieuchinh'], 'safe'],
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
        $query = Phieudieuchinh::find();

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
            'ngaydieuchinh' => $this->ngaydieuchinh,
            'soluong' => $this->soluong,
            'sach_id' => $this->sach_id,
        ]);

        $query->andFilterWhere(['like', 'nguoidieuchinh', $this->nguoidieuchinh])
            ->andFilterWhere(['like', 'lydodieuchinh', $this->lydodieuchinh]);

        return $dataProvider;
    }
}
