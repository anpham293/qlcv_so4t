<?php

namespace common\models\search;

use common\models\Admin;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Happycall;

/**
 * HappycallSearch represents the model behind the search form about `common\models\Happycall`.
 */
class HappycallSearch extends Happycall
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'vt_chuongtrinhhappycall_id', 'admin_id', 'langoi', 'pending'], 'integer'],
            [['stb', 'ngayhpc', 'dongmay', 'goicuocdata', 'thoigiandangkygoi', 'noidunghappycall', 'ghichu', 'donvi', 'trangthai', 'lydo', 'ngaygoihpc', 'ngayhen'], 'safe'],
            [['sodutkg'], 'number'],
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
        $query = Happycall::find();

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
            'sodutkg' => $this->sodutkg,
            'vt_chuongtrinhhappycall_id' => Yii::$app->session['chon'],
            'admin_id' => $this->admin_id,
            'langoi' => $this->langoi,
            'pending' => $this->pending,
        ]);

        $query->andFilterWhere(['like', 'stb', $this->stb])
            ->andFilterWhere(['like', 'ngayhpc', $this->ngayhpc])
            ->andFilterWhere(['like', 'dongmay', $this->dongmay])
            ->andFilterWhere(['like', 'goicuocdata', $this->goicuocdata])
            ->andFilterWhere(['like', 'thoigiandangkygoi', $this->thoigiandangkygoi])
            ->andFilterWhere(['like', 'noidunghappycall', $this->noidunghappycall])
            ->andFilterWhere(['like', 'ghichu', $this->ghichu])
            ->andFilterWhere(['like', 'trangthai', $this->trangthai])
            ->andFilterWhere(['like', 'lydo', $this->lydo])
            ->andFilterWhere(['like', 'ngaygoihpc', $this->ngaygoihpc])
            ->andFilterWhere(['like', 'ngayhen', $this->ngayhen])

            ->addOrderBy('trangthai ASC')
            ->addOrderBy('sodutkg DESC')
            ->addOrderBy('pending ASC');
        if(Yii::$app->user->identity->trungtam=='Admin'||Yii::$app->user->identity->trungtam=='Superadmin')
            $query->andFilterWhere(['like', 'donvi', $this->donvi]);
        else
            $query->andFilterWhere(['like', 'donvi', Yii::$app->user->identity->trungtam]);
        return $dataProvider;
    }
    public function searchhen($params)
    {
        $query = Happycall::find();

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
            'sodutkg' => $this->sodutkg,
            'vt_chuongtrinhhappycall_id' => Yii::$app->session['chon'],
            'admin_id' => $this->admin_id,
            'langoi' => $this->langoi,
            'pending' => $this->pending,
        ]);

        $query->andFilterWhere(['like', 'stb', $this->stb])
            ->andFilterWhere(['like', 'ngayhpc', $this->ngayhpc])
            ->andFilterWhere(['like', 'dongmay', $this->dongmay])
            ->andFilterWhere(['like', 'goicuocdata', $this->goicuocdata])
            ->andFilterWhere(['like', 'thoigiandangkygoi', $this->thoigiandangkygoi])
            ->andFilterWhere(['like', 'noidunghappycall', $this->noidunghappycall])
            ->andFilterWhere(['like', 'ghichu', $this->ghichu])
            ->andFilterWhere(['like', 'trangthai', "Hẹn"])
            ->andFilterWhere(['like', 'lydo', $this->lydo])
            ->andFilterWhere(['like', 'ngaygoihpc', $this->ngaygoihpc])
            ->andFilterWhere(['like', 'ngayhen', $this->ngayhen])
            ->addOrderBy('ngayhen ASC')
            ->addOrderBy('pending ASC');
        if(Yii::$app->user->identity->trungtam=='Admin'||Yii::$app->user->identity->trungtam=='Superadmin')
            $query->andFilterWhere(['like', 'donvi', $this->donvi]);
        else
            $query->andFilterWhere(['like', 'donvi', Yii::$app->user->identity->trungtam]);
        return $dataProvider;
    }
}
