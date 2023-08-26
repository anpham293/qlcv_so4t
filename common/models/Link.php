<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "link".
 *
 * @property int $id
 * @property string $title
 * @property string $url
 * @property string $image
 * @property string $content
 * @property int $ord
 * @property int $active
 * @property int $lang_id
 */
class Link extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'link';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url', 'image', 'content'], 'string'],
            [['ord', 'active', 'lang_id'], 'integer'],
            [['title'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'url' => 'Url',
            'image' => 'Image',
            'content' => 'Content',
            'ord' => 'Ord',
            'active' => 'Active',
            'lang_id' => 'Lang ID',
        ];
    }
}
