<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "configure".
 *
 * @property int $id
 * @property string $name
 * @property string $value
 * @property string $label
 * @property string $nhom
 */
class Configure extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'configure';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['value', 'label'], 'string'],
            [['name'], 'string', 'max' => 100],
            [['nhom'], 'string', 'max' => 200],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'value' => 'Value',
            'label' => 'Label',
            'nhom' => 'Nhom',
        ];
    }
    public static function getConfig(){
        $mang=array();
        foreach (self::find()->all() as $value){
            $mang[$value->name]=$value->value;
        }
        return $mang;
    }
}
