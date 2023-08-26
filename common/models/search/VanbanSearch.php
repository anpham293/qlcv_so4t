<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Vanban;

/**
 * VanbanSearch represents the model behind the search form about `common\models\Vanban`.
 */
class VanbanSearch extends Vanban
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'admin_id', 'loaivanban_id', 'status'], 'integer'],
            [['ten', 'ngaytao', 'kyhieu', 'filevanban'], 'safe'],
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
        $query = Vanban::find();

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
            'ngaytao' => $this->ngaytao,
            'admin_id' => $this->admin_id,
            'loaivanban_id' => $this->loaivanban_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'ten', $this->ten])
            ->andFilterWhere(['like', 'kyhieu', $this->kyhieu])
            ->andFilterWhere(['like', 'filevanban', $this->filevanban]);

        return $dataProvider;
    }
}
