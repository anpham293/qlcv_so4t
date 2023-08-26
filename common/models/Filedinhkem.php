<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "filedinhkem".
 *
 * @property int $id
 * @property string $ten
 * @property string $link
 * @property string $ghichu
 * @property int $vanban_id
 *
 * @property Vanban $vanban
 */
class Filedinhkem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'filedinhkem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ten', 'link', 'vanban_id'], 'required'],
            [['link', 'ghichu'], 'string'],
            [['vanban_id'], 'integer'],
            [['ten'], 'string', 'max' => 500],
            [['vanban_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vanban::className(), 'targetAttribute' => ['vanban_id' => 'id']],
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
            'link' => 'Link',
            'ghichu' => 'Ghichu',
            'vanban_id' => 'Vanban ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVanban()
    {
        return $this->hasOne(Vanban::className(), ['id' => 'vanban_id']);
    }
}
