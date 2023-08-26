<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Thongsocongviecvalue;

/**
 * ThongsocongviecvalueSearch represents the model behind the search form about `\common\models\Thongsocongviecvalue`.
 */
class ThongsocongviecvalueSearch extends Thongsocongviecvalue
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'thongsoid', 'congviec'], 'integer'],
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
        $query = Thongsocongviecvalue::find();

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
            'congviec' => $this->congviec,
        ]);

        $query->andFilterWhere(['like', 'value', $this->value]);

        return $dataProvider;
    }
}
