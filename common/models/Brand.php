<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "brand".
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $url
 * @property string $description
 * @property int $ord
 * @property int $active
 * @property int $home
 * @property string $seo_title
 * @property string $seo_desc
 * @property string $seo_keyword
 * @property int $lang_id
 *
 * @property Product[] $products
 */
class Brand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'brand';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image', 'url', 'description', 'seo_desc'], 'string'],
            [['ord', 'active', 'home', 'lang_id'], 'integer'],
            [['name', 'seo_title', 'seo_keyword'], 'string', 'max' => 200],
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
            'image' => 'Image',
            'url' => 'Url',
            'description' => 'Description',
            'ord' => 'Ord',
            'active' => 'Active',
            'home' => 'Home',
            'seo_title' => 'Seo Title',
            'seo_desc' => 'Seo Desc',
            'seo_keyword' => 'Seo Keyword',
            'lang_id' => 'Lang ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['brand_id' => 'id']);
    }
    public function afterDelete()
    {
        $path =dirname(dirname(__DIR__)).'/images/brand/'.$this->image;
        if (is_file($path))
            unlink($path);
        parent::afterDelete(); // TODO: Change the autogenerated stub
    }
}