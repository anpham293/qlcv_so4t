<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "properties".
 *
 * @property int $id
 * @property string $name
 * @property int $ord
 * @property int $active
 * @property int $type
 *
 * @property DetailProperties[] $getDetailProperties
 * @property Propertiesvalueproduct[] $getPropertiesvalueProducts
 */
class Properties extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'properties';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['ord', 'active','type'], 'integer'],
            [['name'], 'string', 'max' => 200],
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
            'ord' => 'Ord',
            'active' => 'Active',
            'type' => 'Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailProperties()
    {
        return $this->hasMany(Detailproperties::className(), ['properties_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropertiesvalueProducts()
    {
        return $this->hasMany(Propertiesvalueproduct::className(), ['properties_id' => 'id']);
    }
    public static function getThongso($id){
        $cat = Catproduct::findOne($id);
        $detaiproperties=$cat->detailProperties;
        $properties=[];
        foreach ($detaiproperties as $detaiproperty){
            $properties[]=$detaiproperty->properties;
        }
       return $properties;
    }

}
