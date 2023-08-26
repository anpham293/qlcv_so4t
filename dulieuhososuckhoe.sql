-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2020 at 02:10 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hososuckhoe`
--

-- --------------------------------------------------------

--
-- Table structure for table `dulieuhososuckhoe`
--

CREATE TABLE `dulieuhososuckhoe` (
  `id` int(11) NOT NULL,
  `mahogiadinh` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hovaten` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quanhevoichuho` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioitinh` enum('nam','nu') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nhommauheabo` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nhommauherh` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaysinh` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinhtpdangkykhaisinh` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dantoc` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quoctich` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tongiao` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nghenghiep` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `socmnd` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaycap` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noicap` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `madinhdanhbhytsothe` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noidangkyhktt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `xaphuonghktt` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quanhuyenhktt` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinhthanhphohktt` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noiohientai` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `xaphuongnoht` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quanhuyennoht` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinhthanhphonoht` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dienthoaicodinh` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dienthoaididong` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotenme` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotenbo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotenngcsc` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moiquanhengcsc` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dienthoaingcsc` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `didongngcsc` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinhtranglucsinh` bit(1) NOT NULL,
  `dethieuthang` bit(1) DEFAULT NULL,
  `bingatlucde` bit(1) DEFAULT NULL,
  `cannanglucde` int(11) NOT NULL,
  `chieudailucde` int(11) NOT NULL,
  `ditatbamsinh` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vandekhaclucsinh` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hutthuocla` enum('khong','co','thuongxuyen','dabo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `uongruoubia` enum('khong','co','so','dabo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `solicocuongtrenngay` int(11) DEFAULT NULL,
  `sudungmatuy` enum('khong','co','thuongxuyen','dabo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoatdongtheluc` enum('khong','co','thuongxuyen') COLLATE utf8mb4_unicode_ci NOT NULL,
  `yeutotiepxuc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thoigiantiepxuc` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loaihoxi` enum('xả nước','hai ngăn','hố xí thùng','không có') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nguycokhac` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diungthuoc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diunghoachatmypham` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diungthucpham` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diungkhac` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `benhtimmach` bit(1) DEFAULT NULL,
  `tanghuyetap` bit(1) DEFAULT NULL,
  `daithaoduong` bit(1) DEFAULT NULL,
  `benhdaday` bit(1) DEFAULT NULL,
  `benhphoimantinh` bit(1) DEFAULT NULL,
  `benhhensuyen` bit(1) DEFAULT NULL,
  `benhbuouco` bit(1) DEFAULT NULL,
  `benhviemgan` bit(1) DEFAULT NULL,
  `benhtimbamsinh` bit(1) DEFAULT NULL,
  `benhtamthan` bit(1) DEFAULT NULL,
  `benhtuky` bit(1) DEFAULT NULL,
  `benhdongkinh` bit(1) DEFAULT NULL,
  `benhungthu` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `benhlao` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `benhkhac` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `khuyettatthinhluc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `khuyettatthiluc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `khuyettattay` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `khuyettatchan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `khuyettatcongveocotsong` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `khuyettatkhehomoivommieng` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `khuyettatkhac` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiensuphauthuat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiensugiadinhdiungthuoc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiensugiadinhdiungthuocnguoi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiensugiadinhdiunghoachatmypham` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiensugiadinhdiunghoachatnguoi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiensugiadinhdiungthucpham` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiensugiadinhdiungthucphamnguoi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiensugiadinhdiungkhac` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiensugiadinhdiungkhacnguoi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiensugiadinhbenhtattimmach` bit(1) DEFAULT NULL,
  `tiensugiadinhbenhtattimmachnguoi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiensugiadinhbenhtattanghuyetap` bit(1) DEFAULT NULL,
  `tiensugiadinhbenhtattanghuyetapnguoi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiensugiadinhbenhtattamthan` bit(1) DEFAULT NULL,
  `tiensugiadinhbenhtattamthannguoi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiensugiadinhbenhtathensuyen` bit(1) DEFAULT NULL,
  `tiensugiadinhbenhtathensuyennguoi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiensugiadinhbenhtatdaithaoduong` bit(1) DEFAULT NULL,
  `tiensugiadinhbenhtatdaithaoduongnguoi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiensugiadinhbenhtatdongkinh` bit(1) DEFAULT NULL,
  `tiensugiadinhbenhtatdongkinhnguoi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiensugiadinhbenhtatungthu` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiensugiadinhbenhtatlao` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiensugiadinhbenhtatkhac` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bienphaptranhthai` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kythaicuoicung` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `solancothai` int(11) DEFAULT NULL,
  `solansaythai` int(11) DEFAULT NULL,
  `solanphathai` int(11) DEFAULT NULL,
  `solansinde` int(11) DEFAULT NULL,
  `solandethuong` int(11) DEFAULT NULL,
  `solandemo` int(11) DEFAULT NULL,
  `solandekho` int(11) DEFAULT NULL,
  `solandeduthang` int(11) DEFAULT NULL,
  `solandenon` int(11) DEFAULT NULL,
  `soconhiensong` int(11) DEFAULT NULL,
  `benhphukhoa` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vandekhac` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiemchungcobantreem` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sovacxinuonvanmedatiem` int(11) DEFAULT NULL,
  `tiemchungngoaichuongtrinhtcmr` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiemchungvxuonvan` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaykhamlamsang` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `benhsu` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lamsangmach` double DEFAULT NULL,
  `lamsangnhietdo` double DEFAULT NULL,
  `lamsangha` double DEFAULT NULL,
  `lamsangnhiptho` double DEFAULT NULL,
  `lamsangcannang` double DEFAULT NULL,
  `lamsangcao` double DEFAULT NULL,
  `lamsangbmi` double DEFAULT NULL,
  `lamsangvongbung` double DEFAULT NULL,
  `thiluckhongkinhmatphai` double DEFAULT NULL,
  `thiluckhongkinhmattrai` double DEFAULT NULL,
  `thiluccokinhmatphai` double DEFAULT NULL,
  `thiluccokinhmattrai` double DEFAULT NULL,
  `toanthandaniemmac` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `toanthankhac` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timmach` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hohap` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tieuhoa` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tietnieu` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coxuongkhop` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noitiet` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thankinh` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tamthan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngoaikhoa` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sanphukhoa` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taimuihong` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ranghammat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dalieu` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dinhduong` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vandong` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `khamkhac` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `danhgiaphattrien` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xetnghiemhuyethoc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xetnghiemsinhhoamau` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xetnghiemsinhhoanuoctieu` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xetnghiemsieuamobung` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chandoanketluan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tuvancuabacsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bacsikham` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dulieuhososuckhoe`
--

INSERT INTO `dulieuhososuckhoe` (`id`, `mahogiadinh`, `hovaten`, `quanhevoichuho`, `gioitinh`, `nhommauheabo`, `nhommauherh`, `ngaysinh`, `tinhtpdangkykhaisinh`, `dantoc`, `quoctich`, `tongiao`, `nghenghiep`, `socmnd`, `ngaycap`, `noicap`, `madinhdanhbhytsothe`, `noidangkyhktt`, `xaphuonghktt`, `quanhuyenhktt`, `tinhthanhphohktt`, `noiohientai`, `xaphuongnoht`, `quanhuyennoht`, `tinhthanhphonoht`, `dienthoaicodinh`, `dienthoaididong`, `email`, `hotenme`, `hotenbo`, `hotenngcsc`, `moiquanhengcsc`, `dienthoaingcsc`, `didongngcsc`, `tinhtranglucsinh`, `dethieuthang`, `bingatlucde`, `cannanglucde`, `chieudailucde`, `ditatbamsinh`, `vandekhaclucsinh`, `hutthuocla`, `uongruoubia`, `solicocuongtrenngay`, `sudungmatuy`, `hoatdongtheluc`, `yeutotiepxuc`, `thoigiantiepxuc`, `loaihoxi`, `nguycokhac`, `diungthuoc`, `diunghoachatmypham`, `diungthucpham`, `diungkhac`, `benhtimmach`, `tanghuyetap`, `daithaoduong`, `benhdaday`, `benhphoimantinh`, `benhhensuyen`, `benhbuouco`, `benhviemgan`, `benhtimbamsinh`, `benhtamthan`, `benhtuky`, `benhdongkinh`, `benhungthu`, `benhlao`, `benhkhac`, `khuyettatthinhluc`, `khuyettatthiluc`, `khuyettattay`, `khuyettatchan`, `khuyettatcongveocotsong`, `khuyettatkhehomoivommieng`, `khuyettatkhac`, `tiensuphauthuat`, `tiensugiadinhdiungthuoc`, `tiensugiadinhdiungthuocnguoi`, `tiensugiadinhdiunghoachatmypham`, `tiensugiadinhdiunghoachatnguoi`, `tiensugiadinhdiungthucpham`, `tiensugiadinhdiungthucphamnguoi`, `tiensugiadinhdiungkhac`, `tiensugiadinhdiungkhacnguoi`, `tiensugiadinhbenhtattimmach`, `tiensugiadinhbenhtattimmachnguoi`, `tiensugiadinhbenhtattanghuyetap`, `tiensugiadinhbenhtattanghuyetapnguoi`, `tiensugiadinhbenhtattamthan`, `tiensugiadinhbenhtattamthannguoi`, `tiensugiadinhbenhtathensuyen`, `tiensugiadinhbenhtathensuyennguoi`, `tiensugiadinhbenhtatdaithaoduong`, `tiensugiadinhbenhtatdaithaoduongnguoi`, `tiensugiadinhbenhtatdongkinh`, `tiensugiadinhbenhtatdongkinhnguoi`, `tiensugiadinhbenhtatungthu`, `tiensugiadinhbenhtatlao`, `tiensugiadinhbenhtatkhac`, `bienphaptranhthai`, `kythaicuoicung`, `solancothai`, `solansaythai`, `solanphathai`, `solansinde`, `solandethuong`, `solandemo`, `solandekho`, `solandeduthang`, `solandenon`, `soconhiensong`, `benhphukhoa`, `vandekhac`, `tiemchungcobantreem`, `sovacxinuonvanmedatiem`, `tiemchungngoaichuongtrinhtcmr`, `tiemchungvxuonvan`, `ngaykhamlamsang`, `benhsu`, `lamsangmach`, `lamsangnhietdo`, `lamsangha`, `lamsangnhiptho`, `lamsangcannang`, `lamsangcao`, `lamsangbmi`, `lamsangvongbung`, `thiluckhongkinhmatphai`, `thiluckhongkinhmattrai`, `thiluccokinhmatphai`, `thiluccokinhmattrai`, `toanthandaniemmac`, `toanthankhac`, `timmach`, `hohap`, `tieuhoa`, `tietnieu`, `coxuongkhop`, `noitiet`, `thankinh`, `tamthan`, `ngoaikhoa`, `sanphukhoa`, `taimuihong`, `ranghammat`, `mat`, `dalieu`, `dinhduong`, `vandong`, `khamkhac`, `danhgiaphattrien`, `xetnghiemhuyethoc`, `xetnghiemsinhhoamau`, `xetnghiemsinhhoanuoctieu`, `xetnghiemsieuamobung`, `chandoanketluan`, `tuvancuabacsi`, `bacsikham`) VALUES
(1, '0000000000', 'Không xóa', 'Không xóa', 'nam', 'Không xóa', 'Không xóa', '01/03/2020', 'Thành phố Hà Nội', 'Kinh', ' Vietnam', 'Không', 'Không xóa', '000000000', '01/03/2020', 'Không xóa', '', 'Không xóa', 'Phường Phúc Xá', 'Quận Ba Đình', 'Thành phố Hà Nội', 'Không xóa', 'Phường Phúc Xá', 'Quận Ba Đình', 'Thành phố Hà Nội', '', '123', '', 'Không xóa', 'Không xóa', '', '', '', '', b'0', b'0', b'0', 123, 123, '', '', 'khong', 'khong', NULL, 'khong', 'khong', '', '', 'xả nước', '', '', '', '', '', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', b'0', '', b'0', '', b'0', '', b'0', '', b'0', '', b'0', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '{\"BCG\":{\"chuachungngua\":\"on\",\"dachungngua\":\"\",\"phanungsautiem\":\"\",\"ngayhentiem\":\"\"},\"VGB sơ sinh\":{\"chuachungngua\":\"on\",\"dachungngua\":\"\",\"phanungsautiem\":\"\",\"ngayhentiem\":\"\"},\"DPT -VGB-Hib 1\":{\"chuachungngua\":\"on\",\"dachungngua\":\"\",\"phanungsautiem\":\"\",\"ngayhentiem\":\"\"},\"DPT -VGB-Hib 2\":{\"chuachungngua\":\"on\",\"dachungngua\":\"\",\"phanungsautiem\":\"\",\"ngayhentiem\":\"\"},\"DPT -VGB-Hib 3\":{\"chuachungngua\":\"on\",\"dachungngua\":\"\",\"phanungsautiem\":\"\",\"ngayhentiem\":\"\"},\"Bại liệt 1\":{\"chuachungngua\":\"on\",\"dachungngua\":\"\",\"phanungsautiem\":\"\",\"ngayhentiem\":\"\"},\"Bại liệt 2\":{\"chuachungngua\":\"on\",\"dachungngua\":\"\",\"phanungsautiem\":\"\",\"ngayhentiem\":\"\"},\"Bại liệt 3\":{\"chuachungngua\":\"on\",\"dachungngua\":\"\",\"phanungsautiem\":\"\",\"ngayhentiem\":\"\"},\"Sởi 1\":{\"chuachungngua\":\"on\",\"dachungngua\":\"\",\"phanungsautiem\":\"\",\"ngayhentiem\":\"\"},\"Sởi 2\":{\"chuachungngua\":\"on\",\"dachungngua\":\"\",\"phanungsautiem\":\"\",\"ngayhentiem\":\"\"},\"DPT4\":{\"chuachungngua\":\"on\",\"dachungngua\":\"\",\"phanungsautiem\":\"\",\"ngayhentiem\":\"\"},\"VNNB B1\":{\"chuachungngua\":\"on\",\"dachungngua\":\"\",\"phanungsautiem\":\"\",\"ngayhentiem\":\"\"},\"VNNB B2\":{\"chuachungngua\":\"on\",\"dachungngua\":\"\",\"phanungsautiem\":\"\",\"ngayhentiem\":\"\"},\"VNNB B3\":{\"chuachungngua\":\"on\",\"dachungngua\":\"\",\"phanungsautiem\":\"\",\"ngayhentiem\":\"\"}}', NULL, '{\"QTả 1\":{\"chuachungngua\":\"on\",\"dachungngua\":\"\",\"phanungsautiem\":\"\",\"ngayhentiem\":\"\"},\"Tả 2\":{\"chuachungngua\":\"on\",\"dachungngua\":\"\",\"phanungsautiem\":\"\",\"ngayhentiem\":\"\"},\"Quai bị 1\":{\"chuachungngua\":\"on\",\"dachungngua\":\"\",\"phanungsautiem\":\"\",\"ngayhentiem\":\"\"},\"Quai bị 2\":{\"chuachungngua\":\"on\",\"dachungngua\":\"\",\"phanungsautiem\":\"\",\"ngayhentiem\":\"\"},\"Quai bị 3\":{\"chuachungngua\":\"on\",\"dachungngua\":\"\",\"phanungsautiem\":\"\",\"ngayhentiem\":\"\"},\"Cúm 1\":{\"chuachungngua\":\"on\",\"dachungngua\":\"\",\"phanungsautiem\":\"\",\"ngayhentiem\":\"\"},\"Cúm 2\":{\"chuachungngua\":\"on\",\"dachungngua\":\"\",\"phanungsautiem\":\"\",\"ngayhentiem\":\"\"},\"Cúm 3\":{\"chuachungngua\":\"on\",\"dachungngua\":\"\",\"phanungsautiem\":\"\",\"ngayhentiem\":\"\"},\"Thương hàn\":{\"chuachungngua\":\"on\",\"dachungngua\":\"\",\"phanungsautiem\":\"\",\"ngayhentiem\":\"\"},\"HPV 1\":{\"chuachungngua\":\"on\",\"dachungngua\":\"\",\"phanungsautiem\":\"\",\"ngayhentiem\":\"\"},\"HPV 2\":{\"chuachungngua\":\"on\",\"dachungngua\":\"\",\"phanungsautiem\":\"\",\"ngayhentiem\":\"\"},\"HPV 3\":{\"chuachungngua\":\"on\",\"dachungngua\":\"\",\"phanungsautiem\":\"\",\"ngayhentiem\":\"\"},\"Vắc xin phế cầu khuẩn\":{\"chuachungngua\":\"on\",\"dachungngua\":\"\",\"phanungsautiem\":\"\",\"ngayhentiem\":\"\"}}', '{\"UV1\":{\"chuatiem\":\"on\",\"datiem\":\"\",\"thangthai\":\"\",\"phanungsautiem\":\"\",\"ngayhentiem\":\"\"},\"UV2\":{\"chuatiem\":\"on\",\"datiem\":\"\",\"thangthai\":\"\",\"phanungsautiem\":\"\",\"ngayhentiem\":\"\"},\"UV3\":{\"chuatiem\":\"on\",\"datiem\":\"\",\"thangthai\":\"\",\"phanungsautiem\":\"\",\"ngayhentiem\":\"\"},\"UV4\":{\"chuatiem\":\"on\",\"datiem\":\"\",\"thangthai\":\"\",\"phanungsautiem\":\"\",\"ngayhentiem\":\"\"},\"UV5\":{\"chuatiem\":\"on\",\"datiem\":\"\",\"thangthai\":\"\",\"phanungsautiem\":\"\",\"ngayhentiem\":\"\"}}', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dulieuhososuckhoe`
--
ALTER TABLE `dulieuhososuckhoe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dulieuhososuckhoe`
--
ALTER TABLE `dulieuhososuckhoe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
