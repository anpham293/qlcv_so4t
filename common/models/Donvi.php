<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "donvi".
 *
 * @property int $id
 * @property string $keyword
 * @property string $text
 */
class Donvi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'donvi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['keyword', 'text'], 'required'],
            [['keyword', 'text'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'keyword' => 'Keyword',
            'text' => 'Text',
        ];
    }
}
