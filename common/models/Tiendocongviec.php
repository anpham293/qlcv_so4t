<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tiendocongviec".
 *
 * @property int $id
 * @property string $noidung
 * @property string $ngaygui
 * @property int $vanbandi_id
 * @property int $nguoicapnhat
 * @property string $tencongviec
 *
 * @property Admin $nguoicapnhat0
 * @property Vanbandi $vanbandi
 */
class Tiendocongviec extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tiendocongviec';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['noidung', 'vanbandi_id', 'nguoicapnhat', 'tencongviec'], 'required'],
            [['noidung'], 'string'],
            [['ngaygui'], 'safe'],
            [['vanbandi_id', 'nguoicapnhat'], 'integer'],
            [['tencongviec'], 'string', 'max' => 200],
            [['nguoicapnhat'], 'exist', 'skipOnError' => true, 'targetClass' => Admin::className(), 'targetAttribute' => ['nguoicapnhat' => 'id']],
            [['vanbandi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vanbandi::className(), 'targetAttribute' => ['vanbandi_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'noidung' => 'Noidung',
            'ngaygui' => 'Ngaygui',
            'vanbandi_id' => 'Vanbandi ID',
            'nguoicapnhat' => 'Nguoicapnhat',
            'tencongviec' => 'Tencongviec',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNguoicapnhat0()
    {
        return $this->hasOne(Admin::className(), ['id' => 'nguoicapnhat']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVanbandi()
    {
        return $this->hasOne(Vanbandi::className(), ['id' => 'vanbandi_id']);
    }
}
