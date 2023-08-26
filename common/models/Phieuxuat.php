<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "phieuxuat".
 *
 * @property int $id
 * @property int $soluong
 * @property string $ngay
 * @property string $nguoixuat
 * @property string $lydoxuat
 * @property int $sach_id
 *
 * @property Sach $sach
 */
class Phieuxuat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'phieuxuat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['soluong', 'ngay', 'nguoixuat', 'lydoxuat', 'sach_id'], 'required'],
            [['soluong', 'sach_id'], 'integer'],
            [['ngay'], 'safe'],
            [['nguoixuat'], 'string', 'max' => 45],
            [['lydoxuat'], 'string', 'max' => 200],
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
            'ngay' => 'Ngay',
            'nguoixuat' => 'Nguoixuat',
            'lydoxuat' => 'Lydoxuat',
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
