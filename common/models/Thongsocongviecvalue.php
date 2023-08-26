<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "thongsocongviecvalue".
 *
 * @property int $id
 * @property int $thongsoid
 * @property int $congviec
 * @property string $value
 */
class Thongsocongviecvalue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'thongsocongviecvalue';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['thongsoid', 'congviec'], 'integer'],
            [['value'], 'string'],
            [['value'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'thongsoid' => 'Thông số',
            'congviec' => 'Công việc',
            'value' => 'Giá trị',
        ];
    }
}
