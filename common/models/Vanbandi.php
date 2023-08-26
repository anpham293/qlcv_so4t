<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vanbandi".
 *
 * @property int $id
 * @property string $ngaygui
 * @property int $vanban_id
 * @property int $from
 * @property bool $yeucaucapnhattiendo
 * @property string $deadline
 * @property bool $isvanbantraloi
 * @property int $vanbantraloi_id
 * @property int $status
 *
 * @property Commentvanban[] $commentvanbans
 * @property Tiendocongviec[] $tiendocongviecs
 * @property Vanbanden[] $vanbandens
 * @property Admin $from0
 * @property Vanban $vanban
 * @property Vanbandi $vanbantraloi
 * @property Vanbandi[] $vanbandis
 */
class Vanbandi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vanbandi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vanban_id', 'from'], 'required'],
            [['ngaygui', 'deadline'], 'safe'],
            [['vanban_id', 'from', 'vanbantraloi_id', 'status'], 'integer'],
            [['yeucaucapnhattiendo', 'isvanbantraloi'], 'boolean'],
            [['from'], 'exist', 'skipOnError' => true, 'targetClass' => Admin::className(), 'targetAttribute' => ['from' => 'id']],
            [['vanban_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vanban::className(), 'targetAttribute' => ['vanban_id' => 'id']],
            [['vanbantraloi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vanbandi::className(), 'targetAttribute' => ['vanbantraloi_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ngaygui' => 'Ngaygui',
            'vanban_id' => 'Vanban ID',
            'from' => 'From',
            'yeucaucapnhattiendo' => 'Yeucaucapnhattiendo',
            'deadline' => 'Deadline',
            'isvanbantraloi' => 'Isvanbantraloi',
            'vanbantraloi_id' => 'Vanbantraloi ID',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommentvanbans()
    {
        return $this->hasMany(Commentvanban::className(), ['vanbandi_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTiendocongviecs()
    {
        return $this->hasMany(Tiendocongviec::className(), ['vanbandi_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVanbandens()
    {
        return $this->hasMany(Vanbanden::className(), ['vanbandi_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFrom0()
    {
        return $this->hasOne(Admin::className(), ['id' => 'from']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVanban()
    {
        return $this->hasOne(Vanban::className(), ['id' => 'vanban_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVanbantraloi()
    {
        return $this->hasOne(Vanbandi::className(), ['id' => 'vanbantraloi_id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVanbandis()
    {
        return $this->hasMany(Vanbandi::className(), ['vanbantraloi_id' => 'id']);
    }
}
