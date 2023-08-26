<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Menu;

/**
 * MenuSearch represents the model behind the search form about `common\models\Menu`.
 */
class MenuSearch extends Menu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'position', 'parent', 'ord', 'new_tab', 'active', 'lang_id', 'menustyle'], 'integer'],
            [['name', 'type', 'link', 'symbol', 'background', 'background1'], 'safe'],
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
        $query = Menu::find();

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
            'position' => $this->position,
            'parent' => $this->parent,
            'ord' => $this->ord,
            'new_tab' => $this->new_tab,
            'active' => $this->active,
            'lang_id' => $this->lang_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'link', $this->link])
            ->andFilterWhere(['like', 'symbol', $this->symbol])
            ->andFilterWhere(['like', 'background', $this->background])
            ->andFilterWhere(['like', 'background1', $this->background1]);

        return $dataProvider;
    }
}
