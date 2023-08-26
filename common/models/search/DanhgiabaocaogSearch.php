<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Danhgiabaocao;

/**
 * DanhgiabaocaogSearch represents the model behind the search form about `\common\models\Danhgiabaocao`.
 */
class DanhgiabaocaogSearch extends Danhgiabaocao
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'baocao_id', 'nguoidanhgia'], 'integer'],
            [['noidungdanhgia', 'thoigiandanhgia', 'filedinhkem'], 'safe'],
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
        $query = Danhgiabaocao::find();

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
            'baocao_id' => $this->baocao_id,
            'nguoidanhgia' => $this->nguoidanhgia,
            'thoigiandanhgia' => $this->thoigiandanhgia,
        ]);

        $query->andFilterWhere(['like', 'noidungdanhgia', $this->noidungdanhgia])
            ->andFilterWhere(['like', 'filedinhkem', $this->filedinhkem]);

        return $dataProvider;
    }
}
