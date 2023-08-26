<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "language".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $flag
 * @property int $ord
 * @property int $default
 * @property int $active
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['flag'], 'string'],
            [['ord', 'default', 'active'], 'integer'],
            [['code'], 'string', 'max' => 5],
            [['name'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'name' => 'Name',
            'flag' => 'Flag',
            'ord' => 'Ord',
            'default' => 'Default',
            'active' => 'Active',
        ];
    }
}
