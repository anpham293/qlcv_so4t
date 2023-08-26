<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "khaibaoyte".
 *
 * @property int $id
 * @property string $loaikhaibao
 * @property int $mabenhnhan
 * @property string $sodienthoai
 * @property string $hovaten
 * @property int $ngaysinh
 * @property int $thangsinh
 * @property int $namsinh
 * @property string $gioitinh
 * @property string $diachi
 * @property string $lydodenvien
 * @property string $khoaphonglamviec
 * @property bool $dauhieu_ho
 * @property bool $dauhieu_sot
 * @property bool $dauhieu_daumoi
 * @property bool $dauhieu_matvigiac
 * @property bool $yeutodichte_tiepxucduongtinh
 * @property bool $yeutodichte_tiepxucsot
 * @property bool $yeutodichte_didenquocgia
 * @property bool $yeutodichte_didenvungdich
 * @property bool $yeutodichte_dangcachlytainha
 * @property string $yeutodichte_quocgiadiadiem
 * @property string $hashcode
 * @property string $ngaykhaibao
 * @property string $privatekey
 * @property int $donvi
 * @property string $tinhthanhphohktt
 * @property string $quanhuyenhktt
 * @property string $xaphuonghktt
 * @property string $nguoithan1
 * @property string $nguoithan2
 */
class Khaibaoyte extends \yii\db\ActiveRecord
{
    public $listVungDich;
    public $listVungDichNguoiNha1;
    public $listVungDichNguoiNha2;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'khaibaoyte';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loaikhaibao', 'sodienthoai', 'hovaten', 'ngaysinh', 'thangsinh', 'namsinh', 'gioitinh', 'diachi', 'lydodenvien', 'khoaphonglamviec', 'hashcode','dauhieu_ho', 'dauhieu_sot', 'dauhieu_daumoi', 'dauhieu_matvigiac', 'yeutodichte_tiepxucduongtinh', 'yeutodichte_tiepxucsot', 'yeutodichte_didenquocgia', 'yeutodichte_didenvungdich', 'yeutodichte_dangcachlytainha','tinhthanhphohktt','quanhuyenhktt','xaphuonghktt'], 'required'],
            [['mabenhnhan', 'ngaysinh', 'thangsinh', 'namsinh'], 'integer'],
            [['hovaten', 'diachi', 'lydodenvien',"tinhthanhphohktt","quanhuyenhktt","xaphuonghktt","nguoithan1","nguoithan2"], 'string'],
            [['dauhieu_ho', 'dauhieu_sot', 'dauhieu_daumoi', 'dauhieu_matvigiac', 'yeutodichte_tiepxucduongtinh', 'yeutodichte_tiepxucsot', 'yeutodichte_didenquocgia', 'yeutodichte_didenvungdich', 'yeutodichte_dangcachlytainha'], 'boolean'],
            [['loaikhaibao', 'sodienthoai', 'gioitinh', 'hashcode', 'privatekey'], 'string', 'max' => 255],
            [['khoaphonglamviec'], 'string', 'max' => 500],
            [['yeutodichte_quocgiadiadiem'], 'string'],
        ];
    }
    protected function check($string){
        if($this->$string){
            return $this->attributeLabels()[$string].", ";
        }
        else{
            return "";
        }
    }
    public function getDauHieu(){
        $returnstring ="";
        $returnstring.=$this->check("dauhieu_ho");
        $returnstring.=$this->check("dauhieu_sot");
        $returnstring.=$this->check("dauhieu_daumoi");
        $returnstring.=$this->check("dauhieu_matvigiac");
        return (empty($returnstring))?"Không":$returnstring;
    }
    public function getYeuToDichTe(){
        $returnstring ="";
        $returnstring.=$this->check("yeutodichte_tiepxucduongtinh");
        $returnstring.=$this->check("yeutodichte_tiepxucsot");
        $returnstring.=$this->check("yeutodichte_didenquocgia");
        $returnstring.=$this->check("yeutodichte_didenvungdich");
        $returnstring.=$this->check("yeutodichte_dangcachlytainha");
        if(!empty($this->yeutodichte_quocgiadiadiem)){
            $returnstring.= "Đã tới: ".$this->yeutodichte_quocgiadiadiem;
        }
        return (empty($returnstring))?"Không":$returnstring;
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'loaikhaibao' => 'Loại',
            'mabenhnhan' => 'Mã bệnh nhân',
            'sodienthoai' => 'Số điện thoại',
            'hovaten' => 'Họ và tên',
            'nguoithan1' => 'Người thân 1',
            'nguoithan2' => 'Người thân 2',
            'ngaysinh' => 'Ngày sinh',
            'thangsinh' => 'Tháng sinh',
            'namsinh' => 'Năm sinh',
            'gioitinh' => 'Giới tính',
            'diachi' => 'Địa chỉ',
            'tinhthanhphohktt' => 'Tỉnh thành',
            'quanhuyenhktt' => 'Quận huyện',
            'xaphuonghktt' => 'Xã phường',
            'lydodenvien' => 'Lý do đến viện',
            'khoaphonglamviec' => 'Khoa phòng làm việc',
            'dauhieu_ho' => 'Ho',
            'dauhieu_sot' => 'Sốt',
            'dauhieu_daumoi' => 'Đau mỏi người',
            'dauhieu_matvigiac' => 'Mất vị giác hoặc khứu giác',
            'yeutodichte_tiepxucduongtinh' => 'Tiếp xúc với ca dương tính hoặc nghi ngờ COVID-19',
            'yeutodichte_tiepxucsot' => 'Tiếp xúc với trường hợp sốt hoặc viêm đường hô hấp cấp tính chưa rõ nguyên nhân khi tới vùng có COVID-19',
            'yeutodichte_didenquocgia' => 'Đi đến các quốc gia khác hoặc tiếp xúc trực tiếp với người trở về từ quốc gia khác',
            'yeutodichte_didenvungdich' => 'Đi đến hoặc tiếp xúc với người đi đến vùng dịch tại Việt Nam theo thông báo của Bộ Y tế, Sở Y tế các tỉnh',
            'yeutodichte_dangcachlytainha' => 'Đang cách ly tại nhà hoặc tiếp xúc với người đang cách ly tại nhà theo chỉ đạo CDC Tỉnh, Thành phố',
            'yeutodichte_quocgiadiadiem' => 'Quốc gia, địa điểm mà bạn từng đến',
            'hashcode' => 'Hashcode',
            'privatekey' => 'Privatekey',
        ];
    }
}
