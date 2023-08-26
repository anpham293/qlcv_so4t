<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hangmucchiphi".
 *
 * @property int $id
 * @property string $tenhangmuc
 */
class Hangmucchiphi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hangmucchiphi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tenhangmuc'], 'required'],
            [['tenhangmuc'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tenhangmuc' => 'Tên hạng mục',
        ];
    }
}
