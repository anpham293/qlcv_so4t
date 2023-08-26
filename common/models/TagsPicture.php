<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tags_picture".
 *
 * @property int $tags_id
 * @property int $picture_id
 *
 * @property Picture $picture
 * @property Tags $tags
 */
class TagsPicture extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tags_picture';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tags_id', 'picture_id'], 'required'],
            [['tags_id', 'picture_id'], 'integer'],
            [['picture_id'], 'exist', 'skipOnError' => true, 'targetClass' => Picture::className(), 'targetAttribute' => ['picture_id' => 'id']],
            [['tags_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tags::className(), 'targetAttribute' => ['tags_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tags_id' => 'Tags ID',
            'picture_id' => 'Picture ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPicture()
    {
        return $this->hasOne(Picture::className(), ['id' => 'picture_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasOne(Tags::className(), ['id' => 'tags_id']);
    }
}
