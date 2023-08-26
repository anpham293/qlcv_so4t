<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "chucvu".
 *
 * @property int $id
 * @property string $ten Tên chức vụ
 * @property string $bacdongcap
 * @property bool $isnhanvanban Nhận Hồ sơ sức khỏe chuyển tới phòng
 *
 * @property Admin[] $admins
 */
class Chucvu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $bacdongcapdata=[
      -1=>'Mặc định không gán (nhìn thấy/giao việc bởi tất cả user khác)',
       9=>'Giám đốc',
       8=>"Quản lý cấp 1",
       7=>'Quản lý cấp 2',
       6=>'Quản lý cấp 3',
       5=>'Quản lý cấp 4',
       4=>'Quản lý cấp 5',
       3=>"Nhân viên"
    ];
    public static $bacdongcapdatastatic=[
      -1=>'Mặc định không gán (nhìn thấy/giao việc bởi tất cả user khác)',
       9=>'Giám đốc',
       8=>"Quản lý cấp 1",
       7=>'Quản lý cấp 2',
       6=>'Quản lý cấp 3',
       5=>'Quản lý cấp 4',
       4=>'Quản lý cấp 5',
       3=>"Nhân viên"
    ];
    public static function tableName()
    {
        return 'chucvu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ten'], 'required'],
            [['isnhanvanban'], 'boolean'],
            [['bacdongcap'], 'integer'],
            [['ten'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten' => 'Tên chức vụ',
            'bacdongcap' => 'Bậc đồng cấp (các chức vụ thuộc cùng bậc đồng cấp sẽ xem được danh sách giao việc là user cấp dưới)',
            'isnhanvanban' => 'Nhận Hồ sơ sức khỏe chuyển tới phòng',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmins()
    {
        return $this->hasMany(Admin::className(), ['chucvu_id' => 'id']);
    }
}
