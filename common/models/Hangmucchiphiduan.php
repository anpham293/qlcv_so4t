<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hangmucchiphiduan".
 *
 * @property int $id
 * @property int $hangmuc_id
 * @property int $thongsoketoan_id
 * @property int $value
 * @property string $create_time
 */
class Hangmucchiphiduan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hangmucchiphiduan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hangmuc_id', 'thongsoketoan_id', 'value'], 'required'],
            [['hangmuc_id', 'thongsoketoan_id', 'value'], 'integer'],
            [['create_time'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hangmuc_id' => 'Hangmuc ID',
            'thongsoketoan_id' => 'Thongsoketoan ID',
            'value' => 'Value',
            'create_time' => 'Create Time',
        ];
    }
}
