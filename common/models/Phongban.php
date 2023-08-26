<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "phongban".
 *
 * @property int $id
 * @property int $ord
 * @property string $ten Tên phòng ban
 *
 * @property Admin[] $admins
 */
class Phongban extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'phongban';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ten'], 'required'],
            [['ten'], 'string', 'max' => 200],
            [['ord'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten' => 'Tên phòng ban',
            'ord' => 'Thứ tự',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmins()
    {
        return $this->hasMany(Admin::className(), ['phongban_id' => 'id']);
    }
}
