<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tacgia".
 *
 * @property int $id
 * @property string $ten
 * @property string $thongtin
 *
 * @property Sach[] $saches
 */
class Tacgia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tacgia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ten'], 'required'],
            [['thongtin'], 'string'],
            [['ten'], 'string', 'max' => 200],
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
            'thongtin' => 'Thongtin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaches()
    {
        return $this->hasMany(Sach::className(), ['tacgia_id' => 'id']);
    }
}
