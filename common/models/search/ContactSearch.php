<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Contact;

/**
 * ContactSearch represents the model behind the search form about `common\models\Contact`.
 */
class ContactSearch extends Contact
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'lang_id'], 'integer'],
            [['company_name', 'slogan', 'address', 'address1', 'phone', 'hotline', 'fax', 'email', 'email_bcc', 'about_title', 'about_content', 'about_image', 'about_url', 'footer', 'copyright', 'logo', 'logo_footer', 'site_title', 'site_desc', 'site_keyword', 'payment', 'gift'], 'safe'],
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
        $query = Contact::find();

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
            'lang_id' => $this->lang_id,
        ]);

        $query->andFilterWhere(['like', 'company_name', $this->company_name])
            ->andFilterWhere(['like', 'slogan', $this->slogan])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'address1', $this->address1])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'hotline', $this->hotline])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'email_bcc', $this->email_bcc])
            ->andFilterWhere(['like', 'about_title', $this->about_title])
            ->andFilterWhere(['like', 'about_content', $this->about_content])
            ->andFilterWhere(['like', 'about_image', $this->about_image])
            ->andFilterWhere(['like', 'about_url', $this->about_url])
            ->andFilterWhere(['like', 'footer', $this->footer])
            ->andFilterWhere(['like', 'copyright', $this->copyright])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'logo_footer', $this->logo_footer])
            ->andFilterWhere(['like', 'site_title', $this->site_title])
            ->andFilterWhere(['like', 'site_desc', $this->site_desc])
            ->andFilterWhere(['like', 'site_keyword', $this->site_keyword])
            ->andFilterWhere(['like', 'payment', $this->payment])
            ->andFilterWhere(['like', 'gift', $this->gift]);

        return $dataProvider;
    }
}
