<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "anhsach".
 *
 * @property int $id
 * @property string $img
 * @property string $thumbnail
 * @property int $sach_id
 * @property int $ord
 * @property bool $active
 *
 * @property Sach $sach
 */
class Anhsach extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'anhsach';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['img', 'thumbnail', 'sach_id', 'ord'], 'required'],
            [['img', 'thumbnail'], 'string'],
            [['sach_id', 'ord'], 'integer'],
            [['active'], 'boolean'],
            [['sach_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sach::className(), 'targetAttribute' => ['sach_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img' => 'Img',
            'thumbnail' => 'Thumbnail',
            'sach_id' => 'Sach ID',
            'ord' => 'Ord',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSach()
    {
        return $this->hasOne(Sach::className(), ['id' => 'sach_id']);
    }
}
