<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "linhvucvanban".
 *
 * @property int $id
 * @property string $ten
 * @property string $ghichu
 *
 * @property Congvanhanhchinh[] $congvanhanhchinhs
 */
class Linhvucvanban extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'linhvucvanban';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ten'], 'required'],
            [['ghichu'], 'string'],
            [['ten'], 'string', 'max' => 55],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten' => 'Lĩnh vực Hồ sơ sức khỏe hành chính',
            'ghichu' => 'Ghi chú',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCongvanhanhchinhs()
    {
        return $this->hasMany(Congvanhanhchinh::className(), ['Linhvucvanban_id' => 'id']);
    }

    public static function  linhvucvanbanForSelect(){
        return ArrayHelper::map(Linhvucvanban::find()->all(), 'id', 'ten');
    }
}
