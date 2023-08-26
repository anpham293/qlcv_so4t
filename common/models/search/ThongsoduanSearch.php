<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Thongsoduan;

/**
 * ThongsoduanSearch represents the model behind the search form about `\common\models\Thongsoduan`.
 */
class ThongsoduanSearch extends Thongsoduan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent'], 'integer'],
            [['ten'], 'safe'],
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
        $query = Thongsoduan::find();

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
            'parent' => -1,
        ]);

        $query->andFilterWhere(['like', 'ten', $this->ten]);

        return $dataProvider;
    }
}
