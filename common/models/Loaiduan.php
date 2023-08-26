<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "loaiduan".
 *
 * @property int $id
 * @property string $tenloai
 *
 * @property Duan[] $duans
 */
class Loaiduan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loaiduan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tenloai'], 'required'],
            [['tenloai'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tenloai' => 'Tên loại dự án',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDuans()
    {
        return $this->hasMany(Duan::className(), ['loaiduan_id' => 'id']);
    }
}
