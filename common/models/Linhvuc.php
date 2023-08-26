<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "linhvuc".
 *
 * @property int $id
 * @property string $ten
 */
class Linhvuc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'linhvuc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ten'], 'required'],
            [['ten'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten' => 'Lĩnh vực Hồ sơ sức khỏe',
        ];
    }
}
