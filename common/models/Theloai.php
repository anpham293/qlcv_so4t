<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "theloai".
 *
 * @property int $id
 * @property string $ten
 * @property string $ghichu
 * @property int $parent
 * @property bool $active
 * @property int $order
 *
 * @property Theloaisach[] $theloaisaches
 */
class Theloai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'theloai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ten', 'order'], 'required'],
            [['ghichu'], 'string'],
            [['parent', 'order'], 'integer'],
            [['active'], 'boolean'],
            [['ten'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten' => 'Ten',
            'ghichu' => 'Ghichu',
            'parent' => 'Parent',
            'active' => 'Active',
            'order' => 'Order',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTheloaisaches()
    {
        return $this->hasMany(Theloaisach::className(), ['theloai_id' => 'id']);
    }
}
