<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Thongsoketoan;

/**
 * ThongsoketoanSearch represents the model behind the search form about `\common\models\Thongsoketoan`.
 */
class ThongsoketoanSearch extends Thongsoketoan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'duan_id', 'userid'], 'integer'],
            [['congvandinhkem', 'tencongvan', 'ngaytao'], 'safe'],
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
    public function search($params,$ids)
    {
        $query = Thongsoketoan::find();

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
            'duan_id' => $ids,
            'userid' => $this->userid,
            'ngaytao' => $this->ngaytao,
        ]);

        $query->andFilterWhere(['like', 'congvandinhkem', $this->congvandinhkem])
            ->andFilterWhere(['like', 'tencongvan', $this->tencongvan]);

        return $dataProvider;
    }
}
