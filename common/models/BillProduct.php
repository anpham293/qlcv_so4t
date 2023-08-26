<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bill_product".
 *
 * @property int $id
 * @property int $quantity
 * @property int $sale
 * @property int $bill_id
 * @property int $product_id
 * @property Bill $bill
 * @property string thongso
 */
class BillProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bill_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quantity', 'bill_id', 'product_id'], 'required'],
            [['quantity','sale', 'bill_id', 'product_id'], 'integer'],
            [['thongso'], 'string'],
            [['thongso'], 'safe'],
            [['bill_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bill::className(), 'targetAttribute' => ['bill_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'quantity' => 'Quantity',
            'sale' => 'sale',
            'bill_id' => 'Bill ID',
            'product_id' => 'Product ID',
            'thongso' => 'Thuộc tính',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBill()
    {
        return $this->hasOne(Bill::className(), ['id' => 'bill_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
