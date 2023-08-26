<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dienthoai".
 *
 * @property int $id
 * @property string $hang Hãng sản xuất
 * @property string $ten Tên điện thoại
 */
class Dienthoai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dienthoai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hang', 'ten'], 'required'],
            [['ten'], 'string'],
            [['hang'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hang' => 'Hãng sản xuất',
            'ten' => 'Tên điện thoại',
        ];
    }
}
