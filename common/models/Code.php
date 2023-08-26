<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "code".
 *
 * @property int $id
 * @property string $code
 * @property string $value
 * @property string $type
 * @property int $active
 * @property string $cond
 * @property string $ordvalue
 */
class Code extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'code';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'value', 'type', 'cond', 'ordvalue'], 'required'],
            [['active'], 'integer'],
            [['code', 'value', 'cond', 'ordvalue'], 'string', 'max' => 100],
            [['type'], 'string', 'max' => 10],
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
            'value' => 'Giá trị giảm',
            'type' => 'Kiểu',
            'active' => 'Active',
            'cond' => 'Điều kiện tổng giá trị hóa đơn',
            'ordvalue' => '£',
        ];
    }
}
