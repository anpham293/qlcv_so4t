<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "nhaxuatban".
 *
 * @property int $id
 * @property string $ten
 * @property string $ghichu
 *
 * @property Sach[] $saches
 */
class Nhaxuatban extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nhaxuatban';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ten'], 'required'],
            [['ten'], 'string', 'max' => 200],
            [['ghichu'], 'string', 'max' => 45],
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
    public function getSaches()
    {
        return $this->hasMany(Sach::className(), ['nhaxuatban_id' => 'id']);
    }
}
