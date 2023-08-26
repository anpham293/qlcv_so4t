<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "phieumuon".
 *
 * @property int $id
 * @property string $ngaymuon
 * @property string $ghichu
 * @property string $nguoilap
 * @property int $khachhang_id
 * @property string $ngaytra
 * @property string $trangthaiphieu
 *
 * @property Chitietphieumuon[] $chitietphieumuons
 * @property Khachhang $khachhang
 * @property Vandephatsinh[] $vandephatsinhs
 */
class Phieumuon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'phieumuon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ngaymuon', 'nguoilap', 'khachhang_id', 'ngaytra'], 'required'],
            [['id', 'khachhang_id'], 'integer'],
            [['ngaymuon', 'ngaytra'], 'safe'],
            [['ghichu', 'trangthaiphieu'], 'string'],
            [['nguoilap'], 'string', 'max' => 200],
            [['khachhang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Khachhang::className(), 'targetAttribute' => ['khachhang_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ngaymuon' => 'Ngaymuon',
            'ghichu' => 'Ghichu',
            'nguoilap' => 'Nguoilap',
            'khachhang_id' => 'Khachhang ID',
            'ngaytra' => 'Ngaytra',
            'trangthaiphieu' => 'Trangthaiphieu',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChitietphieumuons()
    {
        return $this->hasMany(Chitietphieumuon::className(), ['phieumuon_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKhachhang()
    {
        return $this->hasOne(Khachhang::className(), ['id' => 'khachhang_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVandephatsinhs()
    {
        return $this->hasMany(Vandephatsinh::className(), ['phieumuon_id' => 'id']);
    }
}
