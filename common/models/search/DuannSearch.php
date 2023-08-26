<?php

namespace common\models\search;

use common\models\Admin;
use common\models\Congviec;
use phpDocumentor\Reflection\Types\This;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Duan;
use yii\helpers\Json;

/**
 * DuannSearch represents the model behind the search form about `\common\models\Duan`.
 */
class DuannSearch extends Duan
{
    public $nguoinhanviec;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nguoitao', 'nguoiphutrach','truongphongphutrach', 'loaiduan_id', 'status', 'taichinh'], 'integer'],
            [['ten', 'mota','nguoinhanviec'], 'safe'],
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
        $query = Duan::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $adminGranted = Duan::getAllDuAnGranted();
        $joinedGranted = Duan::getAllJoinedDuAn();


        if(!Yii::$app->user->can("duan/xemtatca")){
            $query->andFilterWhere([
                'or',
                ["IN",'id',$adminGranted],
                ['IN','id',$joinedGranted]
            ]);
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'nguoitao' => $this->nguoitao,
            'loaiduan_id' => $this->loaiduan_id,
            'taichinh' => $this->taichinh,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'ten', $this->ten])
            ->andFilterWhere(['like', 'mota', $this->mota]);
        if(!empty($this->nguoiphutrach)){
            $query ->andFilterWhere([
                'LIKE','nguoiphutrach','"'.$this->nguoiphutrach.'"'
            ]);
        }
        if(!empty($this->nguoinhanviec)){
            $query ->andFilterWhere([
                'or',
                ['like','nguoinhanviec','"'.$this->nguoinhanviec.'"'],
                ['like','nguoinhanviecchitiet','"'.$this->nguoinhanviec.'"']
            ]);
        }
        if(!empty($this->truongphongphutrach)){
            $query ->andFilterWhere([
                'LIKE','truongphongphutrach','"'.$this->truongphongphutrach.'"'
            ]);
        }

        $query->orderBy("tongdientich desc, id desc");


        return $dataProvider;
    }
}
