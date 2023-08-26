<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "trangthai".
 *
 * @property int $id Mã Trạng Thái
 * @property string $name Trạng Thái
 */
class Trangthai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trangthai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Mã Trạng Thái',
            'name' => 'Trạng Thái',
        ];
    }
}
