<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Phieunhap;

/**
 * PhieunhapSearch represents the model behind the search form about `common\models\Phieunhap`.
 */
class PhieunhapSearch extends Phieunhap
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'soluong', 'sach_id'], 'integer'],
            [['ngaynhap', 'nguoinhap'], 'safe'],
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
        $query = Phieunhap::find();

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
            'ngaynhap' => $this->ngaynhap,
            'sach_id' => $this->sach_id,
        ]);

        $query->andFilterWhere(['like', 'nguoinhap', $this->nguoinhap]);

        return $dataProvider;
    }
}
