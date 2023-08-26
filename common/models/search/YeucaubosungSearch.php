<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Yeucaubosung;

/**
 * YeucaubosungSearch represents the model behind the search form about `\common\models\Yeucaubosung`.
 */
class YeucaubosungSearch extends Yeucaubosung
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nguoiyeucau', 'congviec_id'], 'integer'],
            [['noidungyeucau'], 'safe'],
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
        $query = Yeucaubosung::find();

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
            'nguoiyeucau' => $this->nguoiyeucau,
            'congviec_id' => $this->congviec_id,
        ]);

        $query->andFilterWhere(['like', 'noidungyeucau', $this->noidungyeucau]);

        return $dataProvider;
    }
}
