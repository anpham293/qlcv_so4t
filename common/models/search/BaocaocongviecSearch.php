<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Baocaocongviec;

/**
 * BaocaocongviecSearch represents the model behind the search form about `\common\models\Baocaocongviec`.
 */
class BaocaocongviecSearch extends Baocaocongviec
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nguoibaocao', 'congviec_id', 'noidungbaocao'], 'integer'],
            [['ngaybaocao'], 'safe'],
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
        $query = Baocaocongviec::find();

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
            'ngaybaocao' => $this->ngaybaocao,
            'nguoibaocao' => $this->nguoibaocao,
            'congviec_id' => $this->congviec_id,
            'noidungbaocao' => $this->noidungbaocao,
        ]);

        return $dataProvider;
    }
}
