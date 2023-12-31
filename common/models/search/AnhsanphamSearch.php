<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Anhsanpham;

/**
 * AnhsanphamSearch represents the model behind the search form about `common\models\Anhsanpham`.
 */
class AnhsanphamSearch extends Anhsanpham
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ord', 'default', 'product_id'], 'integer'],
            [['image'], 'safe'],
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
        $query = Anhsanpham::find();

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
            'ord' => $this->ord,
            'default' => $this->default,
            'product_id' => $this->product_id,
        ]);

        $query->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
