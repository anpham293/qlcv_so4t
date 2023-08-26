<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sach".
 *
 * @property int $id
 * @property string $ten
 * @property int $soluong
 * @property bool $active
 * @property bool $hot
 * @property int $nhaxuatban_id
 * @property int $tacgia_id
 * @property string $nguoidich
 * @property int $namxb
 * @property string $mota
 *
 * @property Anhsach[] $anhsaches
 * @property Chitietphieumuon[] $chitietphieumuons
 * @property Nhaxuatban $nhaxuatban
 * @property Tacgia $tacgia
 * @property Theloaisach[] $theloaisaches
 */
class Sach extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sach';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ten', 'soluong', 'nhaxuatban_id', 'tacgia_id'], 'required'],
            [['soluong', 'nhaxuatban_id', 'tacgia_id', 'namxb'], 'integer'],
            [['active', 'hot'], 'boolean'],
            [['ten', 'nguoidich'], 'string', 'max' => 200],
            [['mota'], 'string', 'max' => 500],
            [['nhaxuatban_id'], 'exist', 'skipOnError' => true, 'targetClass' => Nhaxuatban::className(), 'targetAttribute' => ['nhaxuatban_id' => 'id']],
            [['tacgia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tacgia::className(), 'targetAttribute' => ['tacgia_id' => 'id']],
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
            'soluong' => 'Soluong',
            'active' => 'Active',
            'hot' => 'Hot',
            'nhaxuatban_id' => 'Nhaxuatban ID',
            'tacgia_id' => 'Tacgia ID',
            'nguoidich' => 'Nguoidich',
            'namxb' => 'Namxb',
            'mota' => 'Mota',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnhsaches()
    {
        return $this->hasMany(Anhsach::className(), ['sach_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChitietphieumuons()
    {
        return $this->hasMany(Chitietphieumuon::className(), ['sach_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNhaxuatban()
    {
        return $this->hasOne(Nhaxuatban::className(), ['id' => 'nhaxuatban_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTacgia()
    {
        return $this->hasOne(Tacgia::className(), ['id' => 'tacgia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTheloaisaches()
    {
        return $this->hasMany(Theloaisach::className(), ['sach_id' => 'id']);
    }
}
