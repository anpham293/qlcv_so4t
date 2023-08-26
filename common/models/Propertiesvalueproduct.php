<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "propertiesvalue_product".
 *
 * @property int $id
 * @property string $name_value
 * @property string $status
 * @property string $add_price
 * @property string $default_price
 * @property string $mamau
 * @property int $product_id
 * @property int $properties_id
 *
 * @property Product $product
 * @property Properties $properties
 */
class Propertiesvalueproduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'propertiesvalue_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_value', 'product_id', 'properties_id'], 'required'],
            [['product_id','status', 'properties_id'], 'integer'],
            [['name_value'], 'string', 'max' => 100],
            [['add_price', 'default_price', 'mamau'], 'string', 'max' => 45],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['properties_id'], 'exist', 'skipOnError' => true, 'targetClass' => Properties::className(), 'targetAttribute' => ['properties_id' => 'id']],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_value' => 'Name Value',
            'status' => 'Status',
            'add_price' => 'Add Price',
            'default_price' => 'Default Price',
            'mamau' => 'Mamau',
            'product_id' => 'Product ID',
            'properties_id' => 'Properties ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProperties()
    {
        return $this->hasOne(Properties::className(), ['id' => 'properties_id']);
    }
    public static function getValueProperties($idsp,$idproperty){
        $varlues = self::find()->where(['product_id'=>$idsp,'properties_id'=>$idproperty])->all();
        return $varlues;
    }

}
