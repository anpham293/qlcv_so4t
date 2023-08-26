<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tags_news".
 *
 * @property int $tags_id
 * @property int $news_id
 *
 * @property News $news
 * @property Tags $tags
 */
class TagsNews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tags_news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tags_id', 'news_id'], 'required'],
            [['tags_id', 'news_id'], 'integer'],
            [['news_id'], 'exist', 'skipOnError' => true, 'targetClass' => News::className(), 'targetAttribute' => ['news_id' => 'id']],
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
            'news_id' => 'News ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasOne(News::className(), ['id' => 'news_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasOne(Tags::className(), ['id' => 'tags_id']);
    }
}
