<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "benhvien".
 *
 * @property int $id
 * @property string $name
 * @property string $subdomain
 * @property bool $active
 */
class Benhvien extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'benhvien';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['active'], 'boolean'],
            [['name', 'subdomain'], 'string', 'max' => 190],
            [['subdomain'], 'unique'],
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
            'subdomain' => 'Tên miền cho đơn vị (viết liền không dấu)',
            'active' => 'Active',
        ];
    }
    public static function getAllForFilter(){
        $list = Benhvien::find()->all();
        $array = [
          ['id'=>-1,'name'=>'Sở']
        ];
        foreach ($list as $value){
            $array[]=['id'=>$value->id,'name'=>$value->name];
        }
        return $array;
    }
}
