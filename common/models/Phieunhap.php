<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "phieunhap".
 *
 * @property int $id
 * @property int $soluong
 * @property string $ngaynhap
 * @property string $nguoinhap
 * @property int $sach_id
 *
 * @property Sach $sach
 */
class Phieunhap extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'phieunhap';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['soluong', 'ngaynhap', 'nguoinhap', 'sach_id'], 'required'],
            [['soluong', 'sach_id'], 'integer'],
            [['ngaynhap'], 'safe'],
            [['nguoinhap'], 'string', 'max' => 45],
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
            'ngaynhap' => 'Ngaynhap',
            'nguoinhap' => 'Nguoinhap',
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
