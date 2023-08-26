<?php

namespace common\models\search;

use common\models\Admin;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Khaibaoyte;

/**
 * KhaibaoyteSearch represents the model behind the search form about `\common\models\Khaibaoyte`.
 */
class KhaibaoyteSearch extends Khaibaoyte
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'mabenhnhan', 'ngaysinh', 'thangsinh', 'namsinh','donvi'], 'integer'],
            [['loaikhaibao', 'sodienthoai', 'hovaten', 'gioitinh', 'diachi', 'lydodenvien', 'khoaphonglamviec', 'hashcode', 'privatekey'], 'safe'],
            [['dauhieu_ho', 'dauhieu_sot', 'dauhieu_daumoi', 'dauhieu_matvigiac', 'yeutodichte_tiepxucduongtinh', 'yeutodichte_tiepxucsot', 'yeutodichte_didenquocgia', 'yeutodichte_didenvungdich', 'yeutodichte_dangcachlytainha', 'yeutodichte_quocgiadiadiem'], 'boolean'],
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
        $query = Khaibaoyte::find();

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
            'mabenhnhan' => $this->mabenhnhan,
            'donvi' => $this->donvi,
            'ngaysinh' => $this->ngaysinh,
            'thangsinh' => $this->thangsinh,
            'namsinh' => $this->namsinh,
            'dauhieu_ho' => $this->dauhieu_ho,
            'dauhieu_sot' => $this->dauhieu_sot,
            'dauhieu_daumoi' => $this->dauhieu_daumoi,
            'dauhieu_matvigiac' => $this->dauhieu_matvigiac,
            'yeutodichte_tiepxucduongtinh' => $this->yeutodichte_tiepxucduongtinh,
            'yeutodichte_tiepxucsot' => $this->yeutodichte_tiepxucsot,
            'yeutodichte_didenquocgia' => $this->yeutodichte_didenquocgia,
            'yeutodichte_didenvungdich' => $this->yeutodichte_didenvungdich,
            'yeutodichte_dangcachlytainha' => $this->yeutodichte_dangcachlytainha,
            'yeutodichte_quocgiadiadiem' => $this->yeutodichte_quocgiadiadiem,
        ]);

        $query->andFilterWhere(['like', 'loaikhaibao', $this->loaikhaibao])
            ->andFilterWhere(['like', 'sodienthoai', $this->sodienthoai])
            ->andFilterWhere(['like', 'hovaten', $this->hovaten])
            ->andFilterWhere(['like', 'gioitinh', $this->gioitinh])
            ->andFilterWhere(['like', 'diachi', $this->diachi])
            ->andFilterWhere(['like', 'lydodenvien', $this->lydodenvien])
            ->andFilterWhere(['like', 'khoaphonglamviec', $this->khoaphonglamviec])
            ->andFilterWhere(['like', 'hashcode', $this->hashcode])
            ->andFilterWhere(['like', 'privatekey', $this->privatekey]);
        $d = Admin::findOne(Yii::$app->user->identity->id)->donvi_id;

        if($d==-1|| $d==0){
           $query
               ->andFilterWhere(['like', 'donvi', $this->donvi]);
        }else{
            $query
                ->andFilterWhere(['=', 'donvi', $d]);
        }
        $query->orderBy("donvi asc, id desc");
        return $dataProvider;
    }
}
