<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "thang".
 *
 * @property string $thang
 */
class Thang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'thang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['thang'], 'string', 'max' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'thang' => 'Thang',
        ];
    }
}
