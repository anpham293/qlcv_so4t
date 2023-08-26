<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vungdich".
 *
 * @property int $id
 * @property string $ten
 */
class Vungdich extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vungdich';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ten'], 'required'],
            [['ten'], 'string'],
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
        ];
    }
}
