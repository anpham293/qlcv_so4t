<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "video".
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property string $code
 * @property string $path
 * @property int $ord
 * @property int $active
 *
 * @property TagsVideo[] $tagsVideos
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'video';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['ord', 'active'], 'integer'],
            [['name', 'url', 'path'], 'string', 'max' => 200],
            [['code'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'url' => 'Url',
            'code' => 'Code',
            'path' => 'Path',
            'ord' => 'Ord',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTagsVideos()
    {
        return $this->hasMany(TagsVideo::className(), ['video_id' => 'id']);
    }
}
