<?php

namespace common\models\search;

use common\models\BillProduct;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Bill;

/**
 * BillSearch represents the model behind the search form of `common\models\Bill`.
 */
class BillProductSearch extends BillProduct
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

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
    public function search($iddonhang)
    {
        $query = BillProduct::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>[
                'pageSize'=>5
            ],
        ]);

        // grid filtering conditions

        $query->andFilterWhere(['bill_id'=>$iddonhang]);
        return $dataProvider;
    }
}
