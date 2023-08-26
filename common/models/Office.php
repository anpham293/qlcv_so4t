<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "office".
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $phone
 * @property string $fax
 * @property string $email
 * @property int $ord
 * @property int $active
 * @property int $lang_id
 */
class Office extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'office';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['address'], 'string'],
            [['ord', 'active', 'lang_id'], 'integer'],
            [['name'], 'string', 'max' => 200],
            [['phone', 'fax'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 100],
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
            'address' => 'Address',
            'phone' => 'Phone',
            'fax' => 'Fax',
            'email' => 'Email',
            'ord' => 'Ord',
            'active' => 'Active',
            'lang_id' => 'Lang ID',
        ];
    }
}
