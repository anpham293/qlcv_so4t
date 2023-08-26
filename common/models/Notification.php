<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "notification".
 *
 * @property int $id
 * @property string $time
 * @property int $sender
 * @property int $reciever
 * @property string $content
 * @property string $type
 * @property string $sendername
 * @property bool $issent
 * @property string $url
 * @property bool $isseen
 */
class Notification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time'], 'safe'],
            [['sender', 'reciever'], 'integer'],
            [['content', 'sendername', 'url'], 'string'],
            [['issent', 'isseen'], 'boolean'],
            [['type'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'time' => 'Time',
            'sender' => 'Sender',
            'reciever' => 'Reciever',
            'content' => 'Content',
            'type' => 'Type',
            'sendername' => 'Sendername',
            'issent' => 'Issent',
            'url' => 'Url',
            'isseen' => 'Isseen',
        ];
    }
    public static function push($sender,$reciever,$content,$type,$sendername,$url){
        $notification = new Notification();

        $notification->sender=$sender;
        $notification->reciever=$reciever;
        $notification->content=$content;
        $notification->type=$type;
        $notification->sendername=$sendername;
        $notification->issent=false;
        $notification->url=$url;
        $notification->isseen=false;
        $notification->save();
    }
}
