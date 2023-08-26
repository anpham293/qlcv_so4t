<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "anhsanpham".
 *
 * @property int $id
 * @property string $image
 * @property string $thumb
 * @property int $ord
 * @property int $default
 * @property int $product_id
 *
 * @property Product $product
 */
class Anhsanpham extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'anhsanpham';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image','thumb'], 'string'],
            [['ord', 'default', 'product_id'], 'integer'],
            [['product_id'], 'required'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'thumb' => 'Thumb image',
            'ord' => 'Ord',
            'default' => 'Default',
            'product_id' => 'Product ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

}
