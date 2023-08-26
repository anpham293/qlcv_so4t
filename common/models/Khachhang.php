<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "khachhang".
 *
 * @property int $id
 * @property string $ten
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $gioitinh
 * @property string $diachi
 * @property bool $active
 * @property string $sdt
 * @property string $passwordresettoken
 * @property string $ghichu
 * @property string $blockreason
 * @property string $cmnd
 * @property string $maphieumuon
 *
 * @property Isuservalid[] $isuservals
 * @property Phieumuon[] $phieumuons
 */
class Khachhang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'khachhang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ten', 'email', 'username', 'password', 'gioitinh', 'diachi', 'sdt', 'passwordresettoken', 'cmnd', 'maphieumuon'], 'required'],
            [['gioitinh'], 'string'],
            [['active'], 'boolean'],
            [['ten', 'email', 'diachi', 'passwordresettoken', 'blockreason'], 'string', 'max' => 200],
            [['username'], 'string', 'max' => 15],
            [['password'], 'string', 'max' => 20],
            [['sdt', 'ghichu', 'cmnd', 'maphieumuon'], 'string', 'max' => 45],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['cmnd'], 'unique'],
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
            'email' => 'Email',
            'username' => 'Username',
            'password' => 'Password',
            'gioitinh' => 'Gioitinh',
            'diachi' => 'Diachi',
            'active' => 'Active',
            'sdt' => 'Sdt',
            'passwordresettoken' => 'Passwordresettoken',
            'ghichu' => 'Ghichu',
            'blockreason' => 'Blockreason',
            'cmnd' => 'Cmnd',
            'maphieumuon' => 'Maphieumuon',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIsuservals()
    {
        return $this->hasMany(Isuservalid::className(), ['khachhang_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhieumuons()
    {
        return $this->hasMany(Phieumuon::className(), ['khachhang_id' => 'id']);
    }
}
