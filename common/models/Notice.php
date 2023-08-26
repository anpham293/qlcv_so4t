<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "notice".
 *
 * @property int $id
 * @property string $userlist
 * @property string $activeuserlist
 * @property int $vanbandiid
 * @property string $type
 * @property int $sendinguser
 * @property string $time
 */
class Notice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userlist', 'activeuserlist', 'vanbandiid', 'type', 'sendinguser'], 'required'],
            [['userlist', 'activeuserlist', 'type'], 'string'],
            [['vanbandiid', 'sendinguser'], 'integer'],
            [['time'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userlist' => 'Userlist',
            'activeuserlist' => 'Activeuserlist',
            'vanbandiid' => 'Vanbandiid',
            'type' => 'Type',
            'sendinguser' => 'Sendinguser',
            'time' => 'Time',
        ];
    }
}
