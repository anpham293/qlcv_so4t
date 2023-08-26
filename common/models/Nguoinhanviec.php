<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "nguoinhanviec".
 *
 * @property int $id
 * @property int $congviecid
 * @property int $nguoigan
 * @property string $thoigiangan
 * @property int $nguoiduocgan
 */
class Nguoinhanviec extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nguoinhanviec';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['congviecid', 'nguoigan', 'nguoiduocgan'], 'integer'],
            [['thoigiangan'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'congviecid' => 'Congviecid',
            'nguoigan' => 'Nguoigan',
            'thoigiangan' => 'Thoigiangan',
            'nguoiduocgan' => 'Nguoiduocgan',
        ];
    }
}
