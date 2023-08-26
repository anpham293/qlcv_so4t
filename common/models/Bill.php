<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\db\Expression;

/**
 * This is the model class for table "bill".
 *
 * @property int $id
 * @property string $name
 * @property string $std
 * @property string $email
 * @property string $content
 * @property string $address
 * @property string $order_time
 * @property string $total
 * @property integer $status
 * @property int $user_id
 * @property string shipping_fee
 * @property string vat
 *
 *
 *
 *
 *
 * @property BillProduct[] $billProducts
 */
class Bill extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public static function tableName()
    {
        return 'bill';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'order_time','address'], 'required'],
            [['content','shipping_fee','vat'], 'string'],
            [['status'], 'integer'],
            [['order_time', 'total','status'], 'safe'],
            [['name', 'address'], 'string', 'max' => 200],
            [['std'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tên công ty',
            'std' => 'SĐT',
            'email' => 'Email',
            'content' => 'Nội dung',
            'address' => 'Address',
            'order_time' => 'Ngày đặt',
            'total' => 'Tổng tiền',
            'status' => 'Trạng thái',
            'user_id' => 'Khách hàng',
            'shipping_fee' => 'Phí vận chuyển',
            'vat' => 'Thuế VAT',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBillProducts()
    {
        return $this->hasMany(BillProduct::className(), ['bill_id' => 'id']);
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /* public function beforeSave($insert)
     {
         if (Yii::$app->session->get('tongtien')){
             $this->total = Yii::$app->session->get('tongtien');
         }
         return parent::beforeSave($insert); // TODO: Change the autogenerated stub
     }*/

    public function afterSave($insert, $changedAttributes)
    {
        if (Yii::$app->session->get('giohang')){
            $soluong = Yii::$app->session->get('soluong');
            $giohang = Yii::$app->session->get('giohang');
            foreach ($giohang as $index => $sanpham) {
                /** @var $sanpham Product */
                $valueids = explode('-', $index);
                $valueProperties = [];
                foreach ($valueids as $value => $valueid) {
                    if ($value > 0) {
                        $valueProperties[] = \common\models\Propertiesvalueproduct::findOne($valueid);
                    }
                }
                $billProduct = new BillProduct();
                $billProduct->product_id = $sanpham->id;
                $billProduct->bill_id = $this->id;

                if (!empty($valueProperties)) {
                    foreach ($valueProperties as $valueProperty) {
                        if ($valueProperty->properties->type != 1)
                            $billProduct->sale= $valueProperty->default_price;
                        else
                            $billProduct->sale= $sanpham->sale;
                    }
                }
                else{
                    $billProduct->sale = $sanpham->sale;
                }
                $billProduct->quantity = $soluong[$index][$sanpham->id];
                if (!empty($valueProperties)) {
                    foreach ($valueProperties as $valueProperty) {
                        $billProduct->thongso = $valueProperty->properties->name . ':' . $valueProperty->name_value;
                    }
                }
                $billProduct->save();
            }
            Yii::$app->session->set('soluongdadat', null);
            Yii::$app->session->set('soluong', null);
            Yii::$app->session->set('tongtien', null);
            Yii::$app->session->set('giohang', null);
            Yii::$app->session->setFlash('success', null);
        }
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }
    public function beforeDelete()
    {
        foreach ($this->billProducts as $billProduct) {
            $billProduct->delete();
        }
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }
}
