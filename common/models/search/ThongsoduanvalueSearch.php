<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Thongsoduanvalue;

/**
 * ThongsoduanvalueSearch represents the model behind the search form about `\common\models\Thongsoduanvalue`.
 */
class ThongsoduanvalueSearch extends Thongsoduanvalue
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'thongsoid', 'duanid'], 'integer'],
            [['value'], 'safe'],
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
        $query = Thongsoduanvalue::find();

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
            'thongsoid' => $this->thongsoid,
            'duanid' => $this->duanid,
        ]);

        $query->andFilterWhere(['like', 'value', $this->value]);

        return $dataProvider;
    }
}
