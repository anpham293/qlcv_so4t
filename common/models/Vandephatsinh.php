<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vandephatsinh".
 *
 * @property int $id
 * @property string $chitiet
 * @property string $nguoitiepnhanxuly
 * @property string $nguoixulychinh
 * @property string $thoigiantiepnhan
 * @property string $thoigianxulyhoantat
 * @property int $phieumuon_id
 * @property string $trangthai
 *
 * @property Lichsuxulyvandephatsinh[] $lichsuxulyvandephatsinhs
 * @property Phieumuon $phieumuon
 */
class Vandephatsinh extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vandephatsinh';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['chitiet', 'nguoitiepnhanxuly', 'nguoixulychinh', 'thoigiantiepnhan', 'phieumuon_id'], 'required'],
            [['chitiet'], 'string'],
            [['thoigiantiepnhan', 'thoigianxulyhoantat'], 'safe'],
            [['phieumuon_id'], 'integer'],
            [['nguoitiepnhanxuly', 'nguoixulychinh'], 'string', 'max' => 200],
            [['trangthai'], 'string', 'max' => 45],
            [['phieumuon_id'], 'exist', 'skipOnError' => true, 'targetClass' => Phieumuon::className(), 'targetAttribute' => ['phieumuon_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'chitiet' => 'Chitiet',
            'nguoitiepnhanxuly' => 'Nguoitiepnhanxuly',
            'nguoixulychinh' => 'Nguoixulychinh',
            'thoigiantiepnhan' => 'Thoigiantiepnhan',
            'thoigianxulyhoantat' => 'Thoigianxulyhoantat',
            'phieumuon_id' => 'Phieumuon ID',
            'trangthai' => 'Trangthai',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLichsuxulyvandephatsinhs()
    {
        return $this->hasMany(Lichsuxulyvandephatsinh::className(), ['vandephatsinh_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhieumuon()
    {
        return $this->hasOne(Phieumuon::className(), ['id' => 'phieumuon_id']);
    }
}
