<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "loaivbhc".
 *
 * @property int $id
 * @property string $ten
 * @property string $ghichu
 *
 * @property Congvanhanhchinh[] $congvanhanhchinhs
 */
class Loaivbhc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loaivbhc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ten'], 'required'],
            [['ghichu'], 'string'],
            [['ten'], 'string', 'max' => 50],
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
            'ghichu' => 'Ghichu',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCongvanhanhchinhs()
    {
        return $this->hasMany(Congvanhanhchinh::className(), ['loaivbhc_id' => 'id']);
    }

    public static function  loaivbhcForSelect(){
        return ArrayHelper::map(Loaivbhc::find()->all(), 'id', 'ten');
    }

    public function urlGenerator(){
        return \func::taoduongdan($this->ten)."-vb".$this->id.".html";
    }
}
