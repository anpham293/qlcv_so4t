<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Vanbanden;

/**
 * VanbandenSearch represents the model behind the search form about `common\models\Vanbanden`.
 */
class VanbandenSearch extends Vanbanden
{
    /**
     * @inheritdoc
     */
    public $isvanbantraloi;
    public $loaivanban_id;

    public function rules()
    {
        return [
            [['id', 'vanbandi_id','admin_id','type','status','isvanbantraloi', 'loaivanban_id'], 'integer'],

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
        $query = Vanbanden::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        if(isset($_GET['VanbandenSearch']['isvanbantraloi']) && trim($_GET['VanbandenSearch']['isvanbantraloi'])!="" ){
            $vanbanden = Vanbanden::find()->where(['admin_id'=>Yii::$app->user->id])->all();
            $idarray = [];
            foreach ($vanbanden as $valuevanbanden){
                /** @var Vanbanden $valuevanbanden */
                if($valuevanbanden->vanbandi->isvanbantraloi==(int)$_GET['VanbandenSearch']['isvanbantraloi']) {
                    $idarray[] = $valuevanbanden->id;
                }else{
                    $idarray[]=-1;
                }
            }
            $query->andFilterWhere(["IN",'id',$idarray]);
            $query->andFilterWhere([
                'vanbandi_id' => $this->vanbandi_id,
                'admin_id' => Yii::$app->user->identity->id,
                'type' => $this->type,
                'status' => $this->status,
            ]);
        }else{
            $query->andFilterWhere([
                'vanbandi_id' => $this->vanbandi_id,
                'admin_id' => Yii::$app->user->identity->id,
                'type' => $this->type,
                'status' => $this->status,
            ]);
            $query->andFilterWhere([
                'id' => $this->id]);
        }

        if(isset($_GET['VanbandenSearch']['loaivanban_id']) && trim($_GET['VanbandenSearch']['loaivanban_id'])!="" ){
            $Loaivb = Vanbanden::find()->where(['admin_id'=>Yii::$app->user->id])->all();
            $idarray = [];
            foreach ($Loaivb as $valueLoaivb){
                /** @var Vanbanden $valueLoaivb */
                if($valueLoaivb->vanbandi->vanban->loaivanban_id==(int)$_GET['VanbandenSearch']['loaivanban_id']) {
                    $idarray[] = $valueLoaivb->id;
                }else{
                    $idarray[]=-1;
                }
            }
            $query->andFilterWhere(["IN",'id',$idarray]);
            $query->andFilterWhere([
                'vanbandi_id' => $this->vanbandi_id,
                'admin_id' => Yii::$app->user->identity->id,
                'type' => $this->type,
                'status' => $this->status,
            ]);
        }else{
            $query->andFilterWhere([
                'vanbandi_id' => $this->vanbandi_id,
                'admin_id' => Yii::$app->user->identity->id,
                'type' => $this->type,
                'status' => $this->status,
            ]);
            $query->andFilterWhere([
                'id' => $this->id]);
        }



        $query->addOrderBy('id desc');


        return $dataProvider;
    }
}
