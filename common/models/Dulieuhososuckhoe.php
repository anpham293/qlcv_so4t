<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dulieuhososuckhoe".
 *
 * @property int $id
 * @property string $mahogiadinh
 * @property string $hovaten
 * @property string $quanhevoichuho
 * @property string $gioitinh
 * @property string $nhommauheabo
 * @property string $nhommauherh
 * @property string $ngaysinh
 * @property string $tinhtpdangkykhaisinh
 * @property string $dantoc
 * @property string $quoctich
 * @property string $tongiao
 * @property string $nghenghiep
 * @property string $socmnd
 * @property string $ngaycap
 * @property string $noicap
 * @property string $madinhdanhbhytsothe
 * @property string $noidangkyhktt
 * @property string $xaphuonghktt
 * @property string $quanhuyenhktt
 * @property string $tinhthanhphohktt
 * @property string $noiohientai
 * @property string $xaphuongnoht
 * @property string $quanhuyennoht
 * @property string $tinhthanhphonoht
 * @property string $dienthoaicodinh
 * @property string $dienthoaididong
 * @property string $email
 * @property string $hotenme
 * @property string $hotenbo
 * @property string $hotenngcsc
 * @property string $moiquanhengcsc
 * @property string $dienthoaingcsc
 * @property string $didongngcsc
 * @property bool $tinhtranglucsinh
 * @property bool $dethieuthang
 * @property bool $bingatlucde
 * @property int $cannanglucde
 * @property int $chieudailucde
 * @property string $ditatbamsinh
 * @property string $vandekhaclucsinh
 * @property string $hutthuocla
 * @property string $uongruoubia
 * @property int $solicocuongtrenngay
 * @property string $sudungmatuy
 * @property string $hoatdongtheluc
 * @property string $yeutotiepxuc
 * @property string $thoigiantiepxuc
 * @property string $loaihoxi
 * @property string $nguycokhac
 * @property string $diungthuoc
 * @property string $diunghoachatmypham
 * @property string $diungthucpham
 * @property string $diungkhac
 * @property bool $benhtimmach
 * @property bool $tanghuyetap
 * @property bool $daithaoduong
 * @property bool $benhdaday
 * @property bool $benhphoimantinh
 * @property bool $benhhensuyen
 * @property bool $benhbuouco
 * @property bool $benhviemgan
 * @property bool $benhtimbamsinh
 * @property bool $benhtamthan
 * @property bool $benhtuky
 * @property bool $benhdongkinh
 * @property string $benhungthu
 * @property string $benhlao
 * @property string $benhkhac
 * @property string $khuyettatthinhluc
 * @property string $khuyettatthiluc
 * @property string $khuyettattay
 * @property string $khuyettatchan
 * @property string $khuyettatcongveocotsong
 * @property string $khuyettatkhehomoivommieng
 * @property string $khuyettatkhac
 * @property string $tiensuphauthuat
 *
 * @property string $tiensugiadinhdiungthuoc
 * @property string $tiensugiadinhdiungthuocnguoi
 * @property string $tiensugiadinhdiunghoachatmypham
 * @property string $tiensugiadinhdiunghoachatnguoi
 * @property string $tiensugiadinhdiungthucpham
 * @property string $tiensugiadinhdiungthucphamnguoi
 * @property string $tiensugiadinhdiungkhac
 * @property string $tiensugiadinhdiungkhacnguoi
 * @property bool $tiensugiadinhbenhtattimmach
 * @property string $tiensugiadinhbenhtattimmachnguoi
 * @property bool $tiensugiadinhbenhtattanghuyetap
 * @property string $tiensugiadinhbenhtattanghuyetapnguoi
 * @property bool $tiensugiadinhbenhtattamthan
 * @property string $tiensugiadinhbenhtattamthannguoi
 * @property bool $tiensugiadinhbenhtathensuyen
 * @property string $tiensugiadinhbenhtathensuyennguoi
 * @property bool $tiensugiadinhbenhtatdaithaoduong
 * @property string $tiensugiadinhbenhtatdaithaoduongnguoi
 * @property bool $tiensugiadinhbenhtatdongkinh
 * @property string $tiensugiadinhbenhtatdongkinhnguoi
 *
 * @property string $tiensugiadinhbenhtatungthu
 * @property string $tiensugiadinhbenhtatlao
 * @property string $tiensugiadinhbenhtatkhac
 * @property string $bienphaptranhthai
 * @property string $kythaicuoicung
 * @property int $solancothai
 * @property int $solansaythai
 * @property int $solanphathai
 * @property int $solansinde
 * @property int $solandethuong
 * @property int $solandemo
 * @property int $solandekho
 * @property int $solandeduthang
 * @property int $solandenon
 * @property int $soconhiensong
 * @property string $benhphukhoa
 * @property string $vandekhac
 * @property string $tiemchungcobantreem
 * @property int $sovacxinuonvanmedatiem
 * @property string $tiemchungngoaichuongtrinhtcmr
 * @property string $tiemchungvxuonvan
 * @property string $ngaykhamlamsang
 * @property string $benhsu
 * @property double $lamsangmach
 * @property double $lamsangnhietdo
 * @property double $lamsangha
 * @property double $lamsangnhiptho
 * @property double $lamsangcannang
 * @property double $lamsangcao
 * @property double $lamsangbmi
 * @property double $lamsangvongbung
 * @property double $thiluckhongkinhmatphai
 * @property double $thiluckhongkinhmattrai
 * @property double $thiluccokinhmatphai
 * @property double $thiluccokinhmattrai
 * @property string $toanthandaniemmac
 * @property string $toanthankhac
 * @property string $timmach
 * @property string $hohap
 * @property string $tieuhoa
 * @property string $tietnieu
 * @property string $coxuongkhop
 * @property string $noitiet
 * @property string $thankinh
 * @property string $tamthan
 * @property string $ngoaikhoa
 * @property string $sanphukhoa
 * @property string $taimuihong
 * @property string $ranghammat
 * @property string $mat
 * @property string $dalieu
 * @property string $dinhduong
 * @property string $vandong
 * @property string $khamkhac
 * @property string $danhgiaphattrien
 * @property string $xetnghiemhuyethoc
 * @property string $xetnghiemsinhhoamau
 * @property string $xetnghiemsinhhoanuoctieu
 * @property string $xetnghiemsieuamobung
 * @property string $chandoanketluan
 * @property string $tuvancuabacsi
 * @property string $bacsikham
 */
class Dulieuhososuckhoe extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dulieuhososuckhoe';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mahogiadinh', 'hovaten', 'quanhevoichuho', 'gioitinh', 'nhommauheabo', 'nhommauherh', 'ngaysinh', 'tinhtpdangkykhaisinh', 'dantoc', 'quoctich', 'tongiao', 'nghenghiep', 'socmnd', 'ngaycap', 'noicap', 'noidangkyhktt', 'xaphuonghktt', 'quanhuyenhktt', 'tinhthanhphohktt', 'noiohientai', 'xaphuongnoht', 'quanhuyennoht', 'tinhthanhphonoht', 'dienthoaididong', 'hotenme', 'hotenbo', 'cannanglucde', 'chieudailucde', 'hutthuocla', 'uongruoubia', 'sudungmatuy', 'hoatdongtheluc', 'loaihoxi'], 'required'],
            [['gioitinh', 'noidangkyhktt', 'noiohientai', 'ditatbamsinh', 'vandekhaclucsinh', 'hutthuocla', 'uongruoubia', 'sudungmatuy', 'hoatdongtheluc', 'yeutotiepxuc', 'loaihoxi', 'nguycokhac', 'diungthuoc', 'diunghoachatmypham', 'diungthucpham', 'diungkhac', 'benhungthu', 'benhlao', 'benhkhac', 'khuyettatthinhluc', 'khuyettatthiluc', 'khuyettattay', 'khuyettatchan', 'khuyettatcongveocotsong', 'khuyettatkhehomoivommieng', 'khuyettatkhac', 'tiensuphauthuat', 'tiensugiadinhdiungthuoc', 'tiensugiadinhdiunghoachatmypham', 'tiensugiadinhdiungthucpham', 'tiensugiadinhdiungkhac', 'tiensugiadinhdiungthuocnguoi', 'tiensugiadinhdiunghoachatnguoi', 'tiensugiadinhdiungthucphamnguoi', 'tiensugiadinhdiungkhacnguoi', 'tiensugiadinhbenhtattimmachnguoi', 'tiensugiadinhbenhtattanghuyetapnguoi', 'tiensugiadinhbenhtattamthannguoi', 'tiensugiadinhbenhtathensuyennguoi', 'tiensugiadinhbenhtatdaithaoduongnguoi', 'tiensugiadinhbenhtatdongkinhnguoi', 'tiensugiadinhbenhtatungthu', 'tiensugiadinhbenhtatlao', 'tiensugiadinhbenhtatkhac', 'bienphaptranhthai', 'kythaicuoicung', 'benhphukhoa', 'vandekhac', 'tiemchungcobantreem', 'tiemchungngoaichuongtrinhtcmr', 'tiemchungvxuonvan', 'benhsu', 'toanthandaniemmac', 'toanthankhac', 'timmach', 'hohap', 'tieuhoa', 'tietnieu', 'coxuongkhop', 'noitiet', 'thankinh', 'tamthan', 'ngoaikhoa', 'sanphukhoa', 'taimuihong', 'ranghammat', 'mat', 'dalieu', 'dinhduong', 'vandong', 'khamkhac', 'danhgiaphattrien', 'xetnghiemhuyethoc', 'xetnghiemsinhhoamau', 'xetnghiemsinhhoanuoctieu', 'xetnghiemsieuamobung', 'chandoanketluan', 'tuvancuabacsi', 'bacsikham'], 'string'],
            [['tinhtranglucsinh', 'dethieuthang', 'bingatlucde', 'benhtimmach', 'tanghuyetap', 'daithaoduong', 'benhdaday', 'benhphoimantinh', 'benhhensuyen', 'benhbuouco', 'benhviemgan', 'benhtimbamsinh', 'benhtamthan', 'benhtuky', 'benhdongkinh', 'tiensugiadinhbenhtattimmach', 'tiensugiadinhbenhtattanghuyetap', 'tiensugiadinhbenhtattamthan', 'tiensugiadinhbenhtathensuyen', 'tiensugiadinhbenhtatdaithaoduong', 'tiensugiadinhbenhtatdongkinh'], 'boolean'],
            [['cannanglucde', 'chieudailucde', 'solicocuongtrenngay', 'solancothai', 'solansaythai', 'solanphathai', 'solansinde', 'solandethuong', 'solandemo', 'solandekho', 'solandeduthang', 'solandenon', 'soconhiensong', 'sovacxinuonvanmedatiem'], 'integer'],
            [['lamsangmach', 'lamsangnhietdo', 'lamsangha', 'lamsangnhiptho', 'lamsangcannang', 'lamsangcao', 'lamsangbmi', 'lamsangvongbung', 'thiluckhongkinhmatphai', 'thiluckhongkinhmattrai', 'thiluccokinhmatphai', 'thiluccokinhmattrai'], 'number'],
            [['mahogiadinh'], 'string', 'length' => 10],
            [['socmnd'], 'isValidCMND'],
            [['socmnd'], 'isUnique'],
            [['hovaten', 'quanhevoichuho', 'tinhtpdangkykhaisinh', 'dantoc', 'quoctich', 'tongiao', 'noicap', 'madinhdanhbhytsothe', 'xaphuonghktt', 'quanhuyenhktt', 'tinhthanhphohktt', 'xaphuongnoht', 'quanhuyennoht', 'tinhthanhphonoht', 'email', 'hotenme', 'hotenbo', 'hotenngcsc', 'moiquanhengcsc'], 'string', 'max' => 200],
            [['nhommauheabo', 'nhommauherh', 'ngaysinh', 'socmnd', 'ngaycap', 'dienthoaicodinh', 'dienthoaididong', 'dienthoaingcsc', 'didongngcsc', 'thoigiantiepxuc', 'ngaykhamlamsang'], 'string', 'max' => 45],
            [['nghenghiep'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function isValidCMND($attribute)
    {
        if (strtolower(substr($this->$attribute, 0, 5)) != "treem") {
            if (!preg_match('/^[0-9]{9}$/', $this->$attribute) && !preg_match('/^[0-9]{12}$/', $this->$attribute)) {
                $this->addError($attribute, 'CMND phải 9 hoặc 12 ký tự số.');
            }
        }

    }

    public function isUnique($attribute)
    {
        if (!is_null(Dulieuhososuckhoe::findOne(['socmnd' => $this->$attribute])) && $this->isNewRecord) {
            $this->addError($attribute, 'CMND đã tồn tại trong hệ thống');
        }
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mahogiadinh' => 'Mã hộ GĐ',
            'hovaten' => 'Họ và tên',
            'quanhevoichuho' => 'Quan hệ với chủ hộ',
            'gioitinh' => 'Giới tính',
            'nhommauheabo' => 'Nhóm máu: Hệ ABO',
            'nhommauherh' => 'Hệ Rh',
            'ngaysinh' => 'Ngày sinh',
            'tinhtpdangkykhaisinh' => 'Tỉnh/TP đăng ký khai sinh',
            'dantoc' => 'Dân tộc',
            'quoctich' => 'Quốc tịch',
            'tongiao' => 'Tôn giáo',
            'nghenghiep' => 'Nghề nghiệp',
            'socmnd' => 'Số CMND/CCCD',
            'ngaycap' => 'Ngày cấp CMND/CCCD',
            'noicap' => 'Nơi cấp CMND/CCCD',
            'madinhdanhbhytsothe' => 'Mã định danh BHYT/ Số thẻ BHYT',
            'noidangkyhktt' => 'Nơi đăng ký HKTT: (Thôn/xóm; số nhà, đường phố)',
            'xaphuonghktt' => 'Xã/Phường',
            'quanhuyenhktt' => 'Quận/Huyện',
            'tinhthanhphohktt' => 'Tỉnh/TP',
            'noiohientai' => 'Nơi ở hiện tại: Thôn/xóm; số nhà, đường phố',
            'xaphuongnoht' => 'Xã/Phường',
            'quanhuyennoht' => 'Quận/Huyện',
            'tinhthanhphonoht' => 'Tỉnh/TP',
            'dienthoaicodinh' => 'Điện thoại: Cố định',
            'dienthoaididong' => 'Di động',
            'email' => 'Email',
            'hotenme' => 'Họ tên mẹ',
            'hotenbo' => 'Họ tên bố',
            'hotenngcsc' => 'Họ tên người chăm sóc chính (NCSC)',
            'moiquanhengcsc' => 'Mối quan hệ',
            'dienthoaingcsc' => 'Điện thoại (bố/ mẹ/ người NCSC): Cố định',
            'didongngcsc' => 'Di động',
            'tinhtranglucsinh' => 'Tình trạng lúc sinh',
            'dethieuthang' => 'Đẻ thiếu tháng',
            'bingatlucde' => 'Bị ngạt lúc đẻ',
            'cannanglucde' => 'Cân nặng lúc đẻ (gram)',
            'chieudailucde' => 'Chiều dài lúc đẻ (cm)',
            'ditatbamsinh' => 'Dị tật bẩm sinh (ghi rõ nếu có)',
            'vandekhaclucsinh' => 'Vấn đề khác (ghi rõ nếu có)',
            'hutthuocla' => 'Hút thuốc lá, lào',
            'uongruoubia' => 'Uống rượu bia thường xuyên',
            'solicocuongtrenngay' => 'Số ly cốc uống/ngày',
            'sudungmatuy' => 'Sử dụng ma túy',
            'hoatdongtheluc' => 'Hoạt động thể lực',
            'yeutotiepxuc' => 'Yếu tố tiếp xúc nghề nghiệp/ Môi trường sống (Hóa chất, bụi, ồn, virút,....) ghi rõ yếu tố tiếp xúc',
            'thoigiantiepxuc' => 'thời gian tiếp xúc',
            'loaihoxi' => 'Loại hố xí của gia đình (xả nước/ hai ngăn/hố xí thùng/ không có hố xí)',
            'nguycokhac' => 'Nguy cơ khác (ghi rõ)',
            'diungthuoc' => 'Thuốc',
            'diunghoachatmypham' => 'Hóa chất/mỹ phẩm',
            'diungthucpham' => 'Thực phẩm',
            'diungkhac' => 'Khác',
            'benhtimmach' => 'Bệnh tim mạch',
            'tanghuyetap' => 'Tăng huyết áp',
            'daithaoduong' => 'Đái tháo đường',
            'benhdaday' => 'Bệnh dạ dày',
            'benhphoimantinh' => 'Bệnh phổi mạn tính',
            'benhhensuyen' => 'Hen suyễn',
            'benhbuouco' => 'Bệnh bướu cổ',
            'benhviemgan' => 'Viêm gan',
            'benhtimbamsinh' => 'Tim bẩm sinh',
            'benhtamthan' => 'Tâm thần',
            'benhtuky' => 'Tự kỷ',
            'benhdongkinh' => 'Động kinh',
            'benhungthu' => 'Ung thư (ghi rõ loại ung thư)',
            'benhlao' => 'Lao (ghi rõ loại lao)',
            'benhkhac' => 'Khác (nêu rõ)',
            'khuyettatthinhluc' => 'Thính lực',
            'khuyettatthiluc' => 'Thị lực',
            'khuyettattay' => 'Tay',
            'khuyettatchan' => 'Chân',
            'khuyettatcongveocotsong' => 'Cong vẹo cột sống',
            'khuyettatkhehomoivommieng' => 'Khe hở môi, vòm miệng',
            'khuyettatkhac' => 'Khác',
            'tiensuphauthuat' => 'Tiền sử phẫu thuật (ghi rõ bộ phận cơ thể đã phẫu thuật và năm phẫu thuật)',
            'tiensugiadinhdiungthuoc' => 'Tiền sử gia đình dị ứng Thuốc',
            'tiensugiadinhdiunghoachatmypham' => 'Tiền sử gia đình dị ứng Hóa chất/ mỹ phẩm',
            'tiensugiadinhdiungthucpham' => 'Tiền sử gia đình dị ứng Thực phẩm',
            'tiensugiadinhdiungkhac' => 'Tiền sử gia đình dị ứng Khác',
            'tiensugiadinhdiungthuocnguoi' => 'Người mắc',
            'tiensugiadinhdiunghoachatnguoi' => 'Người mắc',
            'tiensugiadinhdiungthucphamnguoi' => 'Người mắc',
            'tiensugiadinhdiungkhacnguoi' => 'Người mắc',
            'tiensugiadinhbenhtattimmach' => 'Tiền sử gia đình mắc Bệnh tim mạch',
            'tiensugiadinhbenhtattanghuyetap' => 'Tiền sử gia đình mắc Tăng huyết áp',
            'tiensugiadinhbenhtattamthan' => 'Tiền sử gia đình mắc Tâm thần',
            'tiensugiadinhbenhtathensuyen' => 'Tiền sử gia đình mắc Hen suyễn',
            'tiensugiadinhbenhtatdaithaoduong' => 'Tiền sử gia đình mắc Đái tháo đường',
            'tiensugiadinhbenhtatdongkinh' => 'Tiền sử gia đình mắc Động kinh',
            'tiensugiadinhbenhtattimmachnguoi' => 'Người mắc',
            'tiensugiadinhbenhtattanghuyetapnguoi' => 'Người mắc',
            'tiensugiadinhbenhtattamthannguoi' => 'Người mắc',
            'tiensugiadinhbenhtathensuyennguoi' => 'Người mắc',
            'tiensugiadinhbenhtatdaithaoduongnguoi' => 'Người mắc',
            'tiensugiadinhbenhtatdongkinhnguoi' => 'Người mắc',
            'tiensugiadinhbenhtatungthu' => 'Tiền sử gia đình mắc Ung thư (ghi rõ loại ung thư, người mắc, quan hệ)',
            'tiensugiadinhbenhtatlao' => 'Tiền sử gia đình mắc Lao (ghi rõ loại lao, người mắc, quan hệ)',
            'tiensugiadinhbenhtatkhac' => 'Tiền sử gia đình mắc Khác (ghi rõ, người mắc, quan hệ)',
            'bienphaptranhthai' => 'Biện pháp tránh thai đang dùng',
            'kythaicuoicung' => 'Kỳ có thai cuối cùng',
            'solancothai' => 'Số lần có thai',
            'solansaythai' => 'Số lần sảy thai',
            'solanphathai' => 'Số lần phá thai',
            'solansinde' => 'Số lần sinh đẻ',
            'solandethuong' => 'Đẻ thường',
            'solandemo' => 'Đẻ mổ',
            'solandekho' => 'Đẻ khó',
            'solandeduthang' => 'Số lần đẻ đủ tháng',
            'solandenon' => 'Số lần đẻ non',
            'soconhiensong' => 'Số con hiện sống',
            'benhphukhoa' => 'Bệnh phụ khoa',
            'vandekhac' => 'Vấn đề khác (ghi rõ nếu có)',
            'tiemchungcobantreem' => 'Tiêm chủng cơ bản cho trẻ em',
            'sovacxinuonvanmedatiem' => 'Số mũi vắc xin uốn ván mẹ đã tiêm',
            'tiemchungngoaichuongtrinhtcmr' => 'Tiêm chủng ngoài chương trình TCMR',
            'tiemchungvxuonvan' => 'Tiêm chủng VX uốn ván (phụ nữ có thai)',
            'ngaykhamlamsang' => 'Ngày khám',
            'benhsu' => 'Bệnh sử',
            'lamsangmach' => 'Mạch (lần/phút)',
            'lamsangnhietdo' => 'Nhiệt độ (°C)',
            'lamsangha' => 'HA(mmHg)',
            'lamsangnhiptho' => 'Nhịp thở(lần/phút)',
            'lamsangcannang' => 'Cân nặng(KG)',
            'lamsangcao' => 'Cao(Cm)',
            'lamsangbmi' => 'BMI',
            'lamsangvongbung' => 'Vòng bụng(Cm)',
            'thiluckhongkinhmatphai' => 'Không kính: Mắt phải',
            'thiluckhongkinhmattrai' => ' Mắt trái',
            'thiluccokinhmatphai' => 'Có kính: Mắt phải',
            'thiluccokinhmattrai' => 'Mắt trái',
            'toanthandaniemmac' => 'Da, niêm mạc',
            'toanthankhac' => 'Khác',
            'timmach' => 'Tim mạch',
            'hohap' => 'Hô hấp',
            'tieuhoa' => 'Tiêu hóa',
            'tietnieu' => 'Tiết niệu',
            'coxuongkhop' => 'Cơ xương khớp',
            'noitiet' => 'Nội tiết',
            'thankinh' => 'Thần kinh',
            'tamthan' => 'Tâm thần',
            'ngoaikhoa' => 'Ngoại khoa',
            'sanphukhoa' => 'Sản phụ khoa',
            'taimuihong' => 'Tai mũi họng',
            'ranghammat' => 'Răng hàm mặt',
            'mat' => 'Mắt',
            'dalieu' => 'Da liễu',
            'dinhduong' => 'Dinh dưỡng',
            'vandong' => 'Vận động',
            'khamkhac' => 'Khác',
            'danhgiaphattrien' => 'Đánh giá phát triển thể chất, tinh thần, vận động',
            'xetnghiemhuyethoc' => 'Xét nghiệm Huyết học',
            'xetnghiemsinhhoamau' => 'Xét nghiệm Sinh hóa máu',
            'xetnghiemsinhhoanuoctieu' => 'Xét nghiệm Sinh hóa nước tiểu',
            'xetnghiemsieuamobung' => 'Xét nghiệm Siêu âm ổ bụng',
            'chandoanketluan' => 'Chẩn đoán/ Kết luận (ghi tên, mã bệnh theo ICD 10)',
            'tuvancuabacsi' => 'Tư vấn',
            'bacsikham' => 'Bác sĩ khám',
        ];
    }
}
