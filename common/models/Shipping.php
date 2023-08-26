<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "shipping".
 *
 * @property int $id
 * @property string $name
 * @property string $mucduoi
 * @property string $muctren
 * @property string $shipping_fee
 */
class Shipping extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shipping';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'mucduoi', 'muctren', 'shipping_fee'], 'required'],
            [['name'], 'string', 'max' => 200],
            [['mucduoi', 'muctren', 'shipping_fee'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Khu vực',
            'mucduoi' => 'Mức giá dưới',
            'muctren' => 'Mức giá trên',
            'shipping_fee' => 'Shipping Fee',
        ];
    }
}
