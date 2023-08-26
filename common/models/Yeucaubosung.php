<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "yeucaubosung".
 *
 * @property int $id
 * @property int $nguoiyeucau
 * @property string $noidungyeucau
 * @property int $congviec_id
 */
class Yeucaubosung extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yeucaubosung';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nguoiyeucau', 'noidungyeucau', 'congviec_id'], 'required'],
            [['nguoiyeucau', 'congviec_id'], 'integer'],
            [['noidungyeucau'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nguoiyeucau' => 'Nguoiyeucau',
            'noidungyeucau' => 'Noidungyeucau',
            'congviec_id' => 'Congviec ID',
        ];
    }
}
