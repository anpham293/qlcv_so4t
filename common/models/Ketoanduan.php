<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ketoanduan".
 *
 * @property int $id
 * @property int $userid
 * @property string $ngaygan
 * @property int $duan_id
 */
class Ketoanduan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ketoanduan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'duan_id'], 'integer'],
            [['ngaygan'], 'safe'],
            [['duan_id'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userid' => 'Userid',
            'ngaygan' => 'Ngaygan',
            'duan_id' => 'Duan ID',
        ];
    }
}
