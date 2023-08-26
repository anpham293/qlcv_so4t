<?php

namespace common\models\search;

use common\models\Vanban;
use common\models\Vanbandi;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * VanbandiSearch represents the model behind the search form about `common\models\Vanbandi`.
 */
class VanbandiSearch extends Vanbandi
{
    /**
     * @inheritdoc
     */
    public $loaivanban_id;
    public $isvanbantraloi;
    public function rules()
    {
        return [
            [['ngaygui'], 'datetime'],
            [['id',  'from','yeucaucapnhattiendo','deadline', 'status', 'loaivanban_id', 'isvanbantraloi'], 'integer'],
            [['vanban_id',], 'string'],

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
        $query = Vanbandi::find();

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
            'ngaygui' => $this->ngaygui,
            'from' => Yii::$app->user->identity->id,
            'yeucaucapnhattiendo' => $this->yeucaucapnhattiendo,
            'deadline' => $this->deadline,
            'status' => $this->status,

        ]);

        if(isset($_GET['VanbandiSearch']['vanban_id'])){
            $vanban = Vanban::find()->where("ten like '%".$_GET['VanbandiSearch']['vanban_id']."%'")->all();

            $paramvb = [];
            foreach ($vanban as $value){
                $paramvb[]=$value->id;
            }

            $query->andWhere([
                'IN','vanban_id',$paramvb
            ]);

        }else{
            $query->andFilterWhere([
                'vanban_id' => $this->vanban_id,
            ]);
        }

        if(isset($_GET['VanbandiSearch']['loaivanban_id']) && trim($_GET['VanbandiSearch']['loaivanban_id'])!="" ){
            $vanbandi = Vanbandi::find()->all();
            $idarray = [];
            foreach ($vanbandi as $valuevanbandi){
                /** @var Vanbandi $valuevanbandi */
                if($valuevanbandi->vanban->loaivanban_id==(int)$_GET['VanbandiSearch']['loaivanban_id']) {
                    $idarray[] = $valuevanbandi->id;
                }else{
                    $idarray[]=-1;
                }
            }
            $query->andFilterWhere(["IN",'id',$idarray]);
            $query->andFilterWhere([
                'vanban_id' => $this->vanban_id,
                'ngaygui' => $this->ngaygui,
                'from' => Yii::$app->user->identity->id,
                'yeucaucapnhattiendo' => $this->yeucaucapnhattiendo,
                'deadline' => $this->deadline,
            ]);
        }else{
            $query->andFilterWhere([
                'vanban_id' => $this->vanban_id,
                'ngaygui' => $this->ngaygui,
                'from' => Yii::$app->user->identity->id,
                'yeucaucapnhattiendo' => $this->yeucaucapnhattiendo,
                'deadline' => $this->deadline,
            ]);
            $query->andFilterWhere([
                'id' => $this->id]);
        }

        $query->addOrderBy('id desc');

        return $dataProvider;
    }
}
