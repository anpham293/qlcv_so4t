<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Crm;

/**
 * CrmSearch represents the model behind the search form about `\common\models\Crm`.
 */
class CrmSearch extends Crm
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mst', 'sogpkd', 'loaidoanhnghiep', 'ten', 'diachi', 'tinh', 'quanhuyen', 'sodienthoai', 'tenndd', 'sdtndd', 'chucvundd', 'tenntd', 'sdtntd', 'chucvuntd', 'tennlh', 'sdtnlh', 'chucvunlh', 'nganhnghekd', 'tinhtranghoatdong', 'soluonglaodong', 'nhanvienuser'], 'safe'],
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
        $query = Crm::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'mst', $this->mst])
            ->andFilterWhere(['like', 'sogpkd', $this->sogpkd])
            ->andFilterWhere(['like', 'loaidoanhnghiep', $this->loaidoanhnghiep])
            ->andFilterWhere(['like', 'ten', $this->ten])
            ->andFilterWhere(['like', 'diachi', $this->diachi])
            ->andFilterWhere(['like', 'tinh', $this->tinh])
            ->andFilterWhere(['like', 'quanhuyen', $this->quanhuyen])
            ->andFilterWhere(['like', 'sodienthoai', $this->sodienthoai])
            ->andFilterWhere(['like', 'tenndd', $this->tenndd])
            ->andFilterWhere(['like', 'sdtndd', $this->sdtndd])
            ->andFilterWhere(['like', 'chucvundd', $this->chucvundd])
            ->andFilterWhere(['like', 'tenntd', $this->tenntd])
            ->andFilterWhere(['like', 'sdtntd', $this->sdtntd])
            ->andFilterWhere(['like', 'chucvuntd', $this->chucvuntd])
            ->andFilterWhere(['like', 'tennlh', $this->tennlh])
            ->andFilterWhere(['like', 'sdtnlh', $this->sdtnlh])
            ->andFilterWhere(['like', 'chucvunlh', $this->chucvunlh])
            ->andFilterWhere(['like', 'nganhnghekd', $this->nganhnghekd])
            ->andFilterWhere(['like', 'tinhtranghoatdong', $this->tinhtranghoatdong])
            ->andFilterWhere(['like', 'soluonglaodong', $this->soluonglaodong]);

        if(Yii::$app->user->identity->trungtam!="Superadmin" && Yii::$app->user->identity->trungtam!="Admin")
            $query->andFilterWhere(['=','quanhuyen',Yii::$app->user->identity->trungtam]);


        foreach (Yii::$app->authManager->getRolesByUser(Yii::$app->user->identity->id) as $index => $role) {
            if ($index == 'nhanvien') {
                if(Yii::$app->user->identity->username=="nhanvien_ngoquyen"){
                    $query->andFilterWhere(['like', 'nhanvienuser', "khoilt1_hpg"]);
                }else{
                    $query->andFilterWhere(['like', 'nhanvienuser', Yii::$app->user->identity->username]);
                }
            }
            else{
                if(Yii::$app->controller->action->id=='duyetdn'){
                    $query->andFilterWhere(['like', 'nhanvienuser', "Đề xuất doanh nghiệp"]);
                }else
                    $query->andFilterWhere(['like', 'nhanvienuser', $this->nhanvienuser]);
            }
        }
        if (Yii::$app->user->identity->username == 'guesthpg'||Yii::$app->user->identity->username == 'GUESTHPG'){
            $query->limit(5);
            $dataProvider->pagination=false;
        }
        return $dataProvider;
    }

}
