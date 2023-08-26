<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "template".
 *
 * @property int $id
 * @property string $type
 * @property string $url
 * @property string $itemid
 */
class Template extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'template';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'url', 'itemid'], 'required'],
            [['url'], 'string'],
            [['type', 'itemid'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'url' => 'Url',
            'itemid' => 'Itemid',
        ];
    }
    public static function getTemplate($itemid,$type){
        $template=\common\models\Template::find()->where(['itemid'=>$itemid,'type'=>$type])->all();
        $result=[];
        foreach ($template as $temp){
            $c = explode('/',$temp->url);
            $result[]=['id'=>$temp->id,'text'=>$c[(count($c)-1)]];
        }
        return $result;
    }
}
