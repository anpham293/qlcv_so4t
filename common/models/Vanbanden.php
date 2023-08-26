<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vanbanden".
 *
 * @property int $id
 * @property int $vanbandi_id
 * @property int $admin_id
 * @property int $type
 * @property int $status
 *
 * @property int $isvanbantraloi
 * @property int $loaivanban_id
 * @property Admin $admin
 * @property Vanbandi $vanbandi
 */
class Vanbanden extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vanbanden';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vanbandi_id', 'admin_id', 'type'], 'required'],
            [['vanbandi_id', 'admin_id', 'type', 'status'], 'integer'],
            [['admin_id'], 'exist', 'skipOnError' => true, 'targetClass' => Admin::className(), 'targetAttribute' => ['admin_id' => 'id']],
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
            'vanbandi_id' => 'Vanbandi ID',
            'admin_id' => 'Admin ID',
            'type' => 'Type',
            'status' => 'Status',
        ];
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
    public function getVanbandi()
    {
        return $this->hasOne(Vanbandi::className(), ['id' => 'vanbandi_id']);
    }

    public static function getVanbanName($id){
        return self::findOne($id)->vanbandi->vanban->ten;
    }
}
