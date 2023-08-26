<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Khachhang;

/**
 * KhachhangSearch represents the model behind the search form about `common\models\Khachhang`.
 */
class KhachhangSearch extends Khachhang
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['ten', 'email', 'username', 'password', 'gioitinh', 'diachi', 'sdt', 'passwordresettoken', 'ghichu', 'blockreason', 'cmnd', 'maphieumuon'], 'safe'],
            [['active'], 'boolean'],
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
        $query = Khachhang::find();

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
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'ten', $this->ten])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'gioitinh', $this->gioitinh])
            ->andFilterWhere(['like', 'diachi', $this->diachi])
            ->andFilterWhere(['like', 'sdt', $this->sdt])
            ->andFilterWhere(['like', 'passwordresettoken', $this->passwordresettoken])
            ->andFilterWhere(['like', 'ghichu', $this->ghichu])
            ->andFilterWhere(['like', 'blockreason', $this->blockreason])
            ->andFilterWhere(['like', 'cmnd', $this->cmnd])
            ->andFilterWhere(['like', 'maphieumuon', $this->maphieumuon]);

        return $dataProvider;
    }
}
