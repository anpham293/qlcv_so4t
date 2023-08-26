<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "quanhuyen".
 *
 * @property int $id
 * @property string $ten
 * @property int $tinhthanh_id
 *
 * @property Phuongxa[] $phuongxas
 * @property Tinhthanh $tinhthanh
 */
class Quanhuyen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quanhuyen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ten', 'tinhthanh_id'], 'required'],
            [['id', 'tinhthanh_id'], 'integer'],
            [['ten'], 'string', 'max' => 200],
            [['tinhthanh_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tinhthanh::className(), 'targetAttribute' => ['tinhthanh_id' => 'id']],
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
            'tinhthanh_id' => 'Tinhthanh ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhuongxas()
    {
        return $this->hasMany(Phuongxa::className(), ['quanhuyen_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTinhthanh()
    {
        return $this->hasOne(Tinhthanh::className(), ['id' => 'tinhthanh_id']);
    }
    public static function getListQuanHuyenForDropdown($tinhthanh){
        $tinhthanhs = Tinhthanh::findOne(['ten'=>$tinhthanh]);
        if(!is_null($tinhthanhs))
            return ArrayHelper::map(Quanhuyen::find()->where(['tinhthanh_id'=>$tinhthanhs->id])->all(),'ten','ten');
        else{
            return [];
        }
    }
}
