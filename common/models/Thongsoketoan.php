<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "thongsoketoan".
 *
 * @property int $id
 * @property string $congvandinhkem
 * @property string $tencongvan
 * @property int $duan_id
 * @property int $userid
 * @property string $ngaytao
 */
class Thongsoketoan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'thongsoketoan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tencongvan', 'duan_id', 'userid'], 'required'],
            [['congvandinhkem', 'tencongvan'], 'string'],
            [['duan_id', 'userid'], 'integer'],
            [['ngaytao'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'congvandinhkem' => 'Công văn đính kèm',
            'tencongvan' => 'Tên công văn',
            'duan_id' => 'Duan ID',
            'userid' => 'Người nhập',
            'ngaytao' => 'Ngày tạo',
        ];
    }
}
