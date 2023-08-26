<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "phuongxa".
 *
 * @property int $id
 * @property string $ten
 * @property int $quanhuyen_id
 * @property string $cap
 *
 * @property Quanhuyen $quanhuyen
 */
class Phuongxa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'phuongxa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ten', 'quanhuyen_id', 'cap'], 'required'],
            [['id', 'quanhuyen_id'], 'integer'],
            [['ten'], 'string', 'max' => 200],
            [['cap'], 'string', 'max' => 45],
            [['quanhuyen_id'], 'exist', 'skipOnError' => true, 'targetClass' => Quanhuyen::className(), 'targetAttribute' => ['quanhuyen_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten' => 'Ten',
            'quanhuyen_id' => 'Quanhuyen ID',
            'cap' => 'Cap',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuanhuyen()
    {
        return $this->hasOne(Quanhuyen::className(), ['id' => 'quanhuyen_id']);
    }
    public static function getListPhuongXaForDropdown($quanhuyen){
        $quanhuyens = Quanhuyen::findOne(['ten'=>$quanhuyen]);
        if(!is_null($quanhuyens))
            return ArrayHelper::map(Phuongxa::find()->where(['quanhuyen_id'=>$quanhuyens->id])->all(),'ten','ten');
        else{
            return [];
        }
    }
}
