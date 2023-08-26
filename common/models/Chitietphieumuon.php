<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "chitietphieumuon".
 *
 * @property int $id
 * @property int $soluong
 * @property string $tinhtrang
 * @property int $phieumuon_id
 * @property int $sach_id
 *
 * @property Phieumuon $phieumuon
 * @property Sach $sach
 */
class Chitietphieumuon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chitietphieumuon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['soluong', 'phieumuon_id', 'sach_id'], 'integer'],
            [['tinhtrang'], 'string'],
            [['phieumuon_id', 'sach_id'], 'required'],
            [['phieumuon_id'], 'exist', 'skipOnError' => true, 'targetClass' => Phieumuon::className(), 'targetAttribute' => ['phieumuon_id' => 'id']],
            [['sach_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sach::className(), 'targetAttribute' => ['sach_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'soluong' => 'Soluong',
            'tinhtrang' => 'Tinhtrang',
            'phieumuon_id' => 'Phieumuon ID',
            'sach_id' => 'Sach ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhieumuon()
    {
        return $this->hasOne(Phieumuon::className(), ['id' => 'phieumuon_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSach()
    {
        return $this->hasOne(Sach::className(), ['id' => 'sach_id']);
    }
}
