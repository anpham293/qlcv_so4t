<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tags_video".
 *
 * @property int $tags_id
 * @property int $video_id
 *
 * @property Tags $tags
 * @property Video $video
 */
class TagsVideo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tags_video';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tags_id', 'video_id'], 'required'],
            [['tags_id', 'video_id'], 'integer'],
            [['tags_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tags::className(), 'targetAttribute' => ['tags_id' => 'id']],
            [['video_id'], 'exist', 'skipOnError' => true, 'targetClass' => Video::className(), 'targetAttribute' => ['video_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tags_id' => 'Tags ID',
            'video_id' => 'Video ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasOne(Tags::className(), ['id' => 'tags_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideo()
    {
        return $this->hasOne(Video::className(), ['id' => 'video_id']);
    }
}
