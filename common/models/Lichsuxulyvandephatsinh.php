<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lichsuxulyvandephatsinh".
 *
 * @property int $id
 * @property string $thoigianxuly
 * @property string $mota
 * @property string $nguoixuly
 * @property int $vandephatsinh_id
 *
 * @property Vandephatsinh $vandephatsinh
 */
class Lichsuxulyvandephatsinh extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lichsuxulyvandephatsinh';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['thoigianxuly', 'mota', 'nguoixuly', 'vandephatsinh_id'], 'required'],
            [['thoigianxuly'], 'safe'],
            [['mota'], 'string'],
            [['vandephatsinh_id'], 'integer'],
            [['nguoixuly'], 'string', 'max' => 200],
            [['vandephatsinh_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vandephatsinh::className(), 'targetAttribute' => ['vandephatsinh_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'thoigianxuly' => 'Thoigianxuly',
            'mota' => 'Mota',
            'nguoixuly' => 'Nguoixuly',
            'vandephatsinh_id' => 'Vandephatsinh ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVandephatsinh()
    {
        return $this->hasOne(Vandephatsinh::className(), ['id' => 'vandephatsinh_id']);
    }
}
