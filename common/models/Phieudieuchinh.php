<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "phieudieuchinh".
 *
 * @property int $id
 * @property string $nguoidieuchinh
 * @property string $ngaydieuchinh
 * @property string $lydodieuchinh
 * @property int $soluong
 * @property int $sach_id
 *
 * @property Sach $sach
 */
class Phieudieuchinh extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'phieudieuchinh';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ngaydieuchinh'], 'safe'],
            [['soluong', 'sach_id'], 'integer'],
            [['sach_id'], 'required'],
            [['nguoidieuchinh'], 'string', 'max' => 45],
            [['lydodieuchinh'], 'string', 'max' => 200],
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
            'nguoidieuchinh' => 'Nguoidieuchinh',
            'ngaydieuchinh' => 'Ngaydieuchinh',
            'lydodieuchinh' => 'Lydodieuchinh',
            'soluong' => 'Soluong',
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
}
