<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vanban".
 *
 * @property int $id
 * @property string $ten Tên Hồ sơ sức khỏe
 * @property string $ngaytao Ngày tạo
 * @property string $kyhieu Ký hiệu
 * @property string $filevanban File Hồ sơ sức khỏe
 * @property int $admin_id
 * @property int $loaivanban_id
 * @property int $status
 * @property int $sovanban
 *
 * @property Filedinhkem[] $filedinhkems
 * @property Admin $admin
 * @property Loaivanban $loaivanban
 * @property Vanbandi[] $vanbandis
 */
class Vanban extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vanban';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ten', 'kyhieu', 'filevanban', 'admin_id', 'loaivanban_id'], 'required'],
            [['ngaytao'], 'safe'],
            [['filevanban'], 'string'],
            [['admin_id', 'loaivanban_id', 'status', 'sovanban'], 'integer'],
            [['ten'], 'string', 'max' => 500],
            [['kyhieu'], 'string', 'max' => 200],
            [['admin_id'], 'exist', 'skipOnError' => true, 'targetClass' => Admin::className(), 'targetAttribute' => ['admin_id' => 'id']],
            [['loaivanban_id'], 'exist', 'skipOnError' => true, 'targetClass' => Loaivanban::className(), 'targetAttribute' => ['loaivanban_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten' => 'Tên Hồ sơ sức khỏe',
            'ngaytao' => 'Ngày tạo',
            'kyhieu' => 'Ký hiệu',
            'filevanban' => 'File Hồ sơ sức khỏe',
            'admin_id' => 'Admin ID',
            'loaivanban_id' => 'Loại Hồ sơ sức khỏe',
            'status' => 'Status',
            'sovanban' => 'Sovanban',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiledinhkems()
    {
        return $this->hasMany(Filedinhkem::className(), ['vanban_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmin()
    {
        return $this->hasOne(Admin::className(), ['id' => 'admin_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoaivanban()
    {
        return $this->hasOne(Loaivanban::className(), ['id' => 'loaivanban_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVanbandis()
    {
        return $this->hasMany(Vanbandi::className(), ['vanban_id' => 'id']);
    }
}
