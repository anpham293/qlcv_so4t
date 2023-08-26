<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "congviecloaiduan".
 *
 * @property int $id
 * @property string $congviec
 * @property string $mota
 * @property int $loaiduanid
 */
class Congviecloaiduan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'congviecloaiduan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['congviec', 'mota', 'loaiduanid'], 'required'],
            [['congviec', 'mota'], 'string'],
            [['loaiduanid'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'congviec' => 'Công việc',
            'mota' => 'Mô tả',
            'loaiduanid' => 'Loaiduanid',
        ];
    }
}
