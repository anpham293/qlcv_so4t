<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Lichsuxulyvandephatsinh;

/**
 * LichsuxulyvandephatsinhSearch represents the model behind the search form about `common\models\Lichsuxulyvandephatsinh`.
 */
class LichsuxulyvandephatsinhSearch extends Lichsuxulyvandephatsinh
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'vandephatsinh_id'], 'integer'],
            [['thoigianxuly', 'mota', 'nguoixuly'], 'safe'],
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
        $query = Lichsuxulyvandephatsinh::find();

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
            'thoigianxuly' => $this->thoigianxuly,
            'vandephatsinh_id' => $this->vandephatsinh_id,
        ]);

        $query->andFilterWhere(['like', 'mota', $this->mota])
            ->andFilterWhere(['like', 'nguoixuly', $this->nguoixuly]);

        return $dataProvider;
    }
}
