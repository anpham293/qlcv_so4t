<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "thongsoduanvalue".
 *
 * @property int $id
 * @property int $thongsoid
 * @property int $duanid
 * @property int $dalam
 * @property string $value
 */
class Thongsoduanvalue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'thongsoduanvalue';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['thongsoid', 'duanid', 'dalam'], 'integer'],
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
            'duanid' => 'Công việc',
            'value' => 'Giá trị',
            'dalam'=>'Đã làm'
        ];
    }
}
