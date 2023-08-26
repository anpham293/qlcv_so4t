<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tags".
 *
 * @property int $id
 * @property string $tag
 * @property string $url
 * @property string $seo_title
 * @property string $seo_keyword
 * @property string $seo_desc
 * @property string $tagscol
 *
 * @property TagsNews[] $tagsNews
 * @property TagsPicture[] $tagsPictures
 * @property TagsProduct[] $tagsProducts
 * @property TagsVideo[] $tagsVideos
 */
class Tags extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tags';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tag'], 'required'],
            [['seo_keyword', 'seo_desc'], 'string'],
            [['tag', 'tagscol'], 'string', 'max' => 45],
            [['url', 'seo_title'], 'string', 'max' => 200],
            [['tag'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tag' => 'Tag',
            'url' => 'Url',
            'seo_title' => 'Seo Title',
            'seo_keyword' => 'Seo Keyword',
            'seo_desc' => 'Seo Desc',
            'tagscol' => 'Tagscol',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTagsNews()
    {
        return $this->hasMany(TagsNews::className(), ['tags_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTagsPictures()
    {
        return $this->hasMany(TagsPicture::className(), ['tags_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTagsProducts()
    {
        return $this->hasMany(TagsProduct::className(), ['tags_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTagsVideos()
    {
        return $this->hasMany(TagsVideo::className(), ['tags_id' => 'id']);
    }
}
