<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Log;

/**
 * LogSearch represents the model behind the search form about `common\models\Log`.
 */
class LogSearch extends Log
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'banghi'], 'integer'],
            [['time', 'noidung', 'user', 'loai'], 'safe'],
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
        $query = Log::find();

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
            'banghi' => $this->banghi,
        ]);

        $query->andFilterWhere(['like', 'time', $this->time])
            ->andFilterWhere(['like', 'noidung', $this->noidung])
            ->andFilterWhere(['like', 'user', $this->user])
            ->andFilterWhere(['like', 'loai', $this->loai]);
        $query->orderBy('id desc');
        return $dataProvider;
    }
}
