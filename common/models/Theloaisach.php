<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "theloaisach".
 *
 * @property int $id
 * @property int $theloai_id
 * @property int $sach_id
 *
 * @property Sach $sach
 * @property Theloai $theloai
 */
class Theloaisach extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'theloaisach';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['theloai_id', 'sach_id'], 'required'],
            [['theloai_id', 'sach_id'], 'integer'],
            [['sach_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sach::className(), 'targetAttribute' => ['sach_id' => 'id']],
            [['theloai_id'], 'exist', 'skipOnError' => true, 'targetClass' => Theloai::className(), 'targetAttribute' => ['theloai_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'theloai_id' => 'Theloai ID',
            'sach_id' => 'Sach ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSach()
    {
        return $this->hasOne(Sach::className(), ['id' => 'sach_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTheloai()
    {
        return $this->hasOne(Theloai::className(), ['id' => 'theloai_id']);
    }
}
