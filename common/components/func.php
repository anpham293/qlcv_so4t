<?php

/** //636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236
 * Created by PhpStorm.
 * User: HungLuongCoi
 * Date: 5/18/2015
 * Time: 3:28 PM
 */
class func
{
    public static function NgaysinhText($text){
        $ngay = explode('/',$text);
        return "Ngày ".self::NumText($ngay[0]).", tháng ".self::NumText($ngay[1]).", năm ".self::NumTextLe($ngay[2]).".";
    }

    public static function getListmon($type)
    {
        $lists = [];
        $parents = \common\models\Loaimon::find()->where('type = '.Yii::$app->session[$type])->all();

        foreach ($parents as $parent) {
            $chids = \common\models\Mon::find()->where(['loaimon_id' => $parent->id])->all();
            if (is_null($chids)) {
                $lists[$parent->id] = $parent->tenloai;
            } else {
                $tmps = [];
                foreach ($chids as $chid)
                    $tmps[$chid->id] = "|-- ".$chid->tenmon;
                $lists[$parent->tenloai] = $tmps;
            }
        }
        return $lists;
    }

    public static function getListdouong()
    {
        $lists = [];
        $parents = ['douong','mangvao'];

        foreach ($parents as $parent) {
            if($parent=='douong') $label = "Đồ uống";else $label="Khách mang vào";
            $chids = \common\models\Douong::find()->where(['type' => $parent])->all();
            if (is_null($chids)) {
                $lists[$label] = $parent;
            } else {
                $tmps = [];
                foreach ($chids as $chid)
                    $tmps[$chid->id] = "|-- ".$chid->ten.": ".number_format($chid->dongia,0,"",".")." VNĐ/".$chid->dvt.(($parent=='mangvao')?"(MV)":"");
                $lists[$label] = $tmps;
            }
        }
        return $lists;
    }

    public static function random_color_part() {
        return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
    }

    public static function random_color() {
        return func::random_color_part() . func::random_color_part() . func::random_color_part();
    }

    public static function NumText($amount)
    {
        if ($amount <= 0) {
            return $textnumber = "Tiền phải là số nguyên dương lớn hơn số 0";
        }
        $Text = array("không", "một", "hai", "ba", "bốn", "năm", "sáu", "bảy", "tám", "chín");
        $TextLuythua = array("", "nghìn", "triệu", "tỷ", "ngàn tỷ", "triệu tỷ", "tỷ tỷ");
        $textnumber = "";
        $length = strlen($amount);

        for ($i = 0; $i < $length; $i++)
            $unread[$i] = 0;

        for ($i = 0; $i < $length; $i++) {
            $so = substr($amount, $length - $i - 1, 1);

            if (($so == 0) && ($i % 3 == 0) && ($unread[$i] == 0)) {
                for ($j = $i + 1; $j < $length; $j++) {
                    $so1 = substr($amount, $length - $j - 1, 1);
                    if ($so1 != 0)
                        break;
                }

                if (intval(($j - $i) / 3) > 0) {
                    for ($k = $i; $k < intval(($j - $i) / 3) * 3 + $i; $k++)
                        $unread[$k] = 1;
                }
            }
        }

        for ($i = 0; $i < $length; $i++) {
            $so = substr($amount, $length - $i - 1, 1);
            if ($unread[$i] == 1)
                continue;

            if (($i % 3 == 0) && ($i > 0))
                $textnumber = $TextLuythua[$i / 3] . " " . $textnumber;

            if ($i % 3 == 2)
                $textnumber = 'trăm ' . $textnumber;

            if ($i % 3 == 1)
                $textnumber = 'mươi ' . $textnumber;


            $textnumber = $Text[$so] . " " . $textnumber;
        }

        //Phai de cac ham replace theo dung thu tu nhu the nay
        $textnumber = str_replace("không mươi", "", $textnumber);
        $textnumber = str_replace("lẻ không", "", $textnumber);
        $textnumber = str_replace("mươi không", "mươi", $textnumber);
        $textnumber = str_replace("một mươi", "mười", $textnumber);
        $textnumber = str_replace("mươi năm", "mươi lăm", $textnumber);
        $textnumber = str_replace("mươi một", "mươi mốt", $textnumber);
        $textnumber = str_replace("mười năm", "mười lăm", $textnumber);

        return $textnumber;
    }

    public static function NumTextLe($amount)
    {
        if ($amount < 0) {
            return $textnumber = "Tiền phải là số nguyên dương lớn hơn số 0";
        }
        if ($amount == 0) {return $textnumber = "0 Đồng";}

        $Text = array("không", "một", "hai", "ba", "bốn", "năm", "sáu", "bảy", "tám", "chín");
        $TextLuythua = array("", "nghìn", "triệu", "tỷ", "ngàn tỷ", "triệu tỷ", "tỷ tỷ");
        $textnumber = "";
        $length = strlen($amount);

        for ($i = 0; $i < $length; $i++)
            $unread[$i] = 0;

        for ($i = 0; $i < $length; $i++) {
            $so = substr($amount, $length - $i - 1, 1);

            if (($so == 0) && ($i % 3 == 0) && ($unread[$i] == 0)) {
                for ($j = $i + 1; $j < $length; $j++) {
                    $so1 = substr($amount, $length - $j - 1, 1);
                    if ($so1 != 0)
                        break;
                }

                if (intval(($j - $i) / 3) > 0) {
                    for ($k = $i; $k < intval(($j - $i) / 3) * 3 + $i; $k++)
                        $unread[$k] = 1;
                }
            }
        }

        for ($i = 0; $i < $length; $i++) {
            $so = substr($amount, $length - $i - 1, 1);
            if ($unread[$i] == 1)
                continue;

            if (($i % 3 == 0) && ($i > 0))
                $textnumber = $TextLuythua[$i / 3] . " " . $textnumber;

            if ($i % 3 == 2)
                $textnumber = 'trăm ' . $textnumber;

            if ($i % 3 == 1)
                $textnumber = 'mươi ' . $textnumber;


            $textnumber = $Text[$so] . " " . $textnumber;
        }

        //Phai de cac ham replace theo dung thu tu nhu the nay
        $textnumber = str_replace("không mươi", "lẻ", $textnumber);
        $textnumber = str_replace("lẻ không", "", $textnumber);
        $textnumber = str_replace("mươi không", "mươi", $textnumber);
        $textnumber = str_replace("một mươi", "mười", $textnumber);
        $textnumber = str_replace("mươi năm", "mươi lăm", $textnumber);
        $textnumber = str_replace("mươi một", "mươi mốt", $textnumber);
        $textnumber = str_replace("mười năm", "mười lăm", $textnumber);

        return $textnumber;
    }

    public static function VndText($amount)
    {
        if ($amount < 0) {
            return $textnumber = "Tiền phải là số nguyên dương lớn hơn số 0";
        }
        if ($amount == 0) {return $textnumber = "0 Đồng";}
        $Text = array("không", "một", "hai", "ba", "bốn", "năm", "sáu", "bảy", "tám", "chín");
        $TextLuythua = array("", "nghìn", "triệu", "tỷ", "ngàn tỷ", "triệu tỷ", "tỷ tỷ");
        $textnumber = "";
        $length = strlen($amount);

        for ($i = 0; $i < $length; $i++)
            $unread[$i] = 0;

        for ($i = 0; $i < $length; $i++) {
            $so = substr($amount, $length - $i - 1, 1);

            if (($so == 0) && ($i % 3 == 0) && ($unread[$i] == 0)) {
                for ($j = $i + 1; $j < $length; $j++) {
                    $so1 = substr($amount, $length - $j - 1, 1);
                    if ($so1 != 0)
                        break;
                }

                if (intval(($j - $i) / 3) > 0) {
                    for ($k = $i; $k < intval(($j - $i) / 3) * 3 + $i; $k++)
                        $unread[$k] = 1;
                }
            }
        }

        for ($i = 0; $i < $length; $i++) {
            $so = substr($amount, $length - $i - 1, 1);
            if ($unread[$i] == 1)
                continue;

            if (($i % 3 == 0) && ($i > 0))
                $textnumber = $TextLuythua[$i / 3] . " " . $textnumber;

            if ($i % 3 == 2)
                $textnumber = 'trăm ' . $textnumber;

            if ($i % 3 == 1)
                $textnumber = 'mươi ' . $textnumber;


            $textnumber = $Text[$so] . " " . $textnumber;
        }

        //Phai de cac ham replace theo dung thu tu nhu the nay
        $textnumber = str_replace("không mươi", "lẻ", $textnumber);
        $textnumber = str_replace("lẻ không", "", $textnumber);
        $textnumber = str_replace("mươi không", "mươi", $textnumber);
        $textnumber = str_replace("một mươi", "mười", $textnumber);
        $textnumber = str_replace("mươi năm", "mươi lăm", $textnumber);
        $textnumber = str_replace("mươi một", "mươi mốt", $textnumber);
        $textnumber = str_replace("mười năm", "mười lăm", $textnumber);

        return ucfirst($textnumber . " đồng chẵn");
    }

    public static function tinhsothang($ngaybatdau, $ngayketthuc)
    {
        if ($ngaybatdau != "" && $ngayketthuc != "") {
            $d1 = new DateTime($ngaybatdau);
            $d2 = new DateTime($ngayketthuc);
            $interval = $d2->diff($d1);
            $years = $interval->format('%y');
            $sothang = $interval->format("%m") + 12 * $years;
            return $sothang;
        }
        return "";
    }

    public static function taoduongdan($str)
    {
        $coDau = array("à", "á", "ạ", "ả", "ã", "â", "ầ", "ấ", "ậ", "ẩ", "ẫ", "ă", "ằ", "ắ"
        , "ặ", "ẳ", "ẵ", "è", "é", "ẹ", "ẻ", "ẽ", "ê", "ề", "ế", "ệ", "ể", "ễ", "ì", "í", "ị", "ỉ", "ĩ",
            "ò", "ó", "ọ", "ỏ", "õ", "ô", "ồ", "ố", "ộ", "ổ", "ỗ", "ơ"
        , "ờ", "ớ", "ợ", "ở", "ỡ",
            "ù", "ú", "ụ", "ủ", "ũ", "ư", "ừ", "ứ", "ự", "ử", "ữ",
            "ỳ", "ý", "ỵ", "ỷ", "ỹ",
            "đ",
            "À", "Á", "Ạ", "Ả", "Ã", "Â", "Ầ", "Ấ", "Ậ", "Ẩ", "Ẫ", "Ă"
        , "Ằ", "Ắ", "Ặ", "Ẳ", "Ẵ",
            "È", "É", "Ẹ", "Ẻ", "Ẽ", "Ê", "Ề", "Ế", "Ệ", "Ể", "Ễ",
            "Ì", "Í", "Ị", "Ỉ", "Ĩ",
            "Ò", "Ó", "Ọ", "Ỏ", "Õ", "Ô", "Ồ", "Ố", "Ộ", "Ổ", "Ỗ", "Ơ"
        , "Ờ", "Ớ", "Ợ", "Ở", "Ỡ",
            "Ù", "Ú", "Ụ", "Ủ", "Ũ", "Ư", "Ừ", "Ứ", "Ự", "Ử", "Ữ",
            "Ỳ", "Ý", "Ỵ", "Ỷ", "Ỹ",
            "Đ", "ê", "ù", "à");
        $khongDau = array("a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a"
        , "a", "a", "a", "a", "a", "a",
            "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e",
            "i", "i", "i", "i", "i",
            "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o"
        , "o", "o", "o", "o", "o",
            "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u",
            "y", "y", "y", "y", "y",
            "d",
            "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A"
        , "A", "A", "A", "A", "A",
            "E", "E", "E", "E", "E", "E", "E", "E", "E", "E", "E",
            "I", "I", "I", "I", "I",
            "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O"
        , "O", "O", "O", "O", "O",
            "U", "U", "U", "U", "U", "U", "U", "U", "U", "U", "U",
            "Y", "Y", "Y", "Y", "Y",
            "D", "e", "u", "a");
        $str = str_replace($coDau, $khongDau, $str);
        $str = trim(preg_replace("/\\s+/", " ", $str));
        $str = preg_replace("/[^a-zA-Z0-9 \-\.]/", "", $str);
        $str = strtolower($str);
        return str_replace(" ", '-', $str);
    }

    public static function tach_ten($hoten)
    {
        $hoten = trim($hoten);
        $str_arr = explode(' ', $hoten);

        $array_hoten = array('ho' => '', 'ten' => '');

        $array_hoten['ten'] = array_pop($str_arr);
        if (count($str_arr) > 0)
            $array_hoten['ho'] = implode(' ', $str_arr);

        return $array_hoten;
    }

    function get_data($url)
    {
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    public static function trimFields(&$fields = array())
    {
        foreach ($fields as $field) {
            $field = trim($field);
        }
    }

    public static function layThu($thu)
    {
        $thu = strtolower($thu);
        switch ($thu) {
            case 'mon':
                return 2;
            case 'tue':
                return 3;
            case 'wed':
                return 4;
            case 'thu':
                return 5;
            case 'fri':
                return 6;
            case 'sat':
                return 7;
            case 'sun':
                return 8;
        }
    }

    public static function yWeek()
    {
        $date = date('Y-m-d');
        while (date('w', strtotime($date)) != 1) {
            $tmp = strtotime('-1 day', strtotime($date));
            $date = date('Y-m-d', $tmp);
        }

        $week = date('W', strtotime($date));
        return $week;
    }

    public static function khongdau($str)
    {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
        $str = preg_replace("/(đ)/", "d", $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
        $str = preg_replace("/(Đ)/", "D", $str);
        return $str;
    }

    public static function getTiet()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $now = getdate();
        $a = 0;
        if ($now["minutes"] > 50 && $now["minutes"] <= 59)
            $a = 1;

        if ($now["hours"] == 7)
            return $a + 1;
        elseif ($now["hours"] == 8)
            return $a + 2;
        elseif ($now["hours"] == 9)
            return $a + 3;
        elseif ($now["hours"] == 10)
            return $a + 4;
        elseif ($now["hours"] == 11)
            return $a + 5;
        elseif ($now["hours"] == 13)
            return $a + 6;
        elseif ($now["hours"] == 14)
            return $a + 7;
        elseif ($now["hours"] == 15)
            return $a + 8;
        elseif ($now["hours"] == 16)
            return $a + 9;
        elseif ($now["hours"] == 17)
            return 10;
        else
            return 0;
    }

    public static function layThu2()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $now = getdate();
        switch ($now['weekday']) {
            case 'Monday':
                return 2;
            case 'Tuesday':
                return 3;
            case 'Wednesday':
                return 4;
            case 'Thursday':
                return 5;
            case 'Friday':
                return 6;
            case 'Saturday':
                return 7;
            case 'Sunday':
                return 8;
        }
    }

    public static function getTimeNow()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $now = getdate();
        return $now["hours"].":".$now["minutes"].":".$now["seconds"]." ".$now["mday"]."/".$now["mon"]."/".$now["year"];
    }

    public static function getTimeNowForFilename()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $now = getdate();
        return $now["hours"]."_".$now["minutes"]."_".$now["seconds"]."_".$now["mday"]."_".$now["mon"]."_".$now["year"];
    }

    public static function layThangEnglish($ten)
    {
        switch ($ten) {
            case '1':
                return 'JAN';
            case '2':
                return 'FEB';
            case '3':
                return "MAR";
            case '4':
                return 'APR';
            case '5':
                return 'MAY';
            case '6':
                return 'JUN';
            case '7':
                return 'JUL';
            case '8':
                return 'AUG';
            case '9':
                return 'SEP';
            case '10':
                return "OCT";
            case '11':
                return 'NOV';
            case '12':
                return 'DEC';
        }
    }

    public static function getFileSizeUrl($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, TRUE);
        curl_setopt($ch, CURLOPT_NOBODY, TRUE);

        $data = curl_exec($ch);
        $size = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);

        curl_close($ch);
        if ($size != -1) {
            $base = log($size) / log(1024);
            $suffix = array("", "kB", "MB", "GB", "TB")[floor($base)];
            return round(pow(1024, $base - floor($base)), 2) . $suffix;
        } else
            return "N/A";
    }

    public static function Get_ImagesToFolder($dir)
    {
        $ImagesArray = [];
        $file_display = ['jpg', 'jpeg', 'png', 'gif'];
        if (!file_exists($dir)) {
            return $ImagesArray;
        } else {
            $dir_contents = scandir($dir);
            foreach ($dir_contents as $file) {
                $file_type = pathinfo($file, PATHINFO_EXTENSION);
                if (in_array($file_type, $file_display) == true) {
                    $ImagesArray[] = $file;
                }
            }
            return $ImagesArray;
        }
    }

    public static function Get_FilesToFolder($dir)
    {
        $ImagesArray = [];
        if (!file_exists($dir)) {
            return $ImagesArray;
        } else {
            $dir_contents = scandir($dir);
            foreach ($dir_contents as $file) {
                if ($file != '.' && $file != '..')
                    $ImagesArray[] = $file;
            }
            return $ImagesArray;
        }
    }

    public static function createCatProductDragMenu($id,$datas){
        if ($id == 'null') {
            foreach ($datas as $data) {
                if ($data->parent==-1) {
                    $checked = $data->active==1?'checked="checked"':'';
                    echo '<li class="dd-item dd3-item" data-id="' . $data->id . '">
                        <div class="dd-handle dd3-handle"> 
                        </div>
                        <div class="dd3-content">
                            ' . $data->name . '
                            <a a href="' . Yii::$app->urlManager->baseUrl . '/catproduct/capnhat?id=' . $data->id . '" data-pjax="0" role="modal-remote" data-toggle="tooltip" style="float: right" title="Sửa" class="btn-sua-menu" data-id="' . $data->id . '"><i class="fa fa-edit"></i></a>
                            <a style="float: right" title="Xóa" class="btn-xoa-menu" data-id="' . $data->id . '"><i class="fa fa-remove"></i></a>
                            <input style="float: right" type="checkbox" class="active_checkbox" data-id="' . $data->id . '" '.$checked.'><span class="pull-right" style="padding: 0 5px;">Active</span></input>   
                        </div>';
                    self::createCatProductDragMenu($data->id, $datas);
                    echo '</li>';
                }
            }
        } else {
            $temp = 0;
            foreach ($datas as $data) {
                if ($data->parent == $id) {
                    $temp++;

                }
            }
            if ($temp != 0) {
                echo '<ol class="dd-list">';
                foreach ($datas as $data) {
                    if ($data->parent == $id) {
                        $checked = $data->active==1?'checked="checked"':'';
                        echo '
                        <li class="dd-item dd3-item" data-id="' . $data->id . '">
                            <div class="dd-handle dd3-handle">
                            </div>
                            <div class="dd3-content">
                                ' . $data->name . '
                                <a a href="' . Yii::$app->urlManager->baseUrl . '/catproduct/capnhat?id=' . $data->id . '" data-pjax="0" role="modal-remote" data-toggle="tooltip" style="float: right" title="Sửa" class="btn-sua-menu" data-id="' . $data->id . '"><i class="fa fa-edit"></i></a>
                                <a style="float: right" title="Xóa" class="btn-xoa-menu" data-id="' . $data->id . '"><i class="fa fa-remove"></i></a>
                                <input style="float: right" type="checkbox" class="active_checkbox"  data-id="' . $data->id . '" '.$checked.'><span class="pull-right" style="padding: 0 5px;">Active</span></input>
                            </div>';
                        self::createCatProductDragMenu($data->id, $datas);
                        echo '</li>';
                    }
                }
                echo '</ol>';
            }
        }
        return;
    }

    public static function createCatnew($id, $data)
    {
        if ($id == 'null') {
            foreach ($data as $datas) {
                if ($datas->parent==-1) {
                    echo '<li class="dd-item dd3-item" data-id="' . $datas->id . '">
                        <div class="dd-handle dd3-handle">
                        
                        </div>
                        <div class="dd3-content">
                            ' . $datas->name . '
                            <a href="' . Yii::$app->urlManager->baseUrl . '/catnew/update?id=' . $datas->id . '" data-pjax="0" role="modal-remote" data-toggle="tooltip" style="float: right" title="Sửa" class="btn-sua-menu" data-id="' . $datas->id . '"><i class="fa fa-edit"></i></a>
                            <a style="float: right" title="Xóa" class="btn-xoa-menu" data-id="' . $datas->id . '"><i class="fa fa-remove"></i></a>
                            </div>';
                    self::createCatnew($datas->id, $data);
                    echo '</li>';
                }
            }
        } else {
            $temp = 0;
            foreach ($data as $datas) {
                if ($datas->parent == $id) {
                    $temp++;
                }
            }
            if ($temp != 0) {
                echo '<ol class="dd-list">';
                foreach ($data as $datas) {
                    if ($datas->parent == $id) {
                        echo '
                    <li class="dd-item dd3-item" data-id="' . $datas->id . '">
                        <div class="dd-handle dd3-handle">
                        
                        </div>
                        <div class="dd3-content">
                            ' . $datas->name . '
                            
                            <a href="' . Yii::$app->urlManager->baseUrl . '/catnew/update?id=' . $datas->id . '" data-pjax="0" role="modal-remote" data-toggle="tooltip" style="float: right" title="Sửa" class="btn-sua-menu" data-id="' . $datas->id . '"><i class="fa fa-edit"></i></a>
                            <a style="float: right" title="Xóa" class="btn-xoa-menu" data-id="' . $datas->id . '"><i class="fa fa-remove"></i></a>
                            </div>';
                        self::createCatnew($datas->id, $data);
                        echo '</li>';
                    }
                }
                echo '</ol>';
            }
        }
        return;
    }

    public static function updateCatnew($id, $data, $ord)
    {

        if ($id == 'null') {
            foreach ($data as $datas) {
                \common\models\Catnew::updateAll(['parent' => -1, 'ord' => $ord], ['id' => $datas['id']]);
                $ord++;
                if (isset($datas['children'])) {
                    self::updateCatnew($datas['id'], $datas['children'], ($ord + 1));
                }
            }
        } else {
            foreach ($data as $datas) {
                \common\models\Catnew::updateAll(['parent' => $id, 'ord' => $ord], ['id' => $datas['id']]);
                $ord++;
                if (isset($datas['children'])) {
                    self::updateCatnew($datas['id'], $datas['children'], ($ord + 1));
                }
            }
        }
        return;
    }

    public static function deleteCatnew($id)
    {
        $con = \common\models\Catnew::find()->where('parent = :pr', [':pr' => $id])->all();
        if (!empty($con)) {
            foreach ($con as $cons) {
                self::deleteCatnew($cons->id);
                \common\models\Catnew::deleteAll(['id' => $id]);
            }
        }
        \common\models\Catnew::deleteAll(['id' => $id]);
    }

    public static function updateCatMenu($id, $datas, $ord)
    {

        if ($id == 'null') {
            foreach ($datas as $data) {
                \common\models\Catproduct::updateAll(['parent' => -1, 'ord' => $ord], ['id' => $data['id']]);
                $ord++;
                if (isset($data['children'])) {
                    self::updateCatMenu($data['id'], $data['children'], ($ord + 1));
                }
            }
        } else {
            foreach ($datas as $data) {
                \common\models\Catproduct::updateAll(['parent' => $id, 'ord' => $ord], ['id' => $data['id']]);
                $ord++;
                if (isset($data['children'])) {
                    self::updateCatMenu($data['id'], $data['children'], ($ord + 1));
                }
            }
        }
        return;
    }

    public static function deleteCatMenu($id)
    {
        $con = \common\models\Catproduct::find()->where('parent = :pr', [':pr' => $id])->all();
        if (!empty($con)) {
            foreach ($con as $cons) {
                self::deleteCatMenu($cons->id);
                \common\models\Catproduct::deleteAll(['id' => $id]);
            }
        }
        \common\models\Catproduct::deleteAll(['id' => $id]);
    }

    public static function createMenu($id, $data)
    {
        if ($id == 'null') {
            foreach ($data as $datas) {
                if (is_null($datas->parent)) {
                    echo '<li class="dd-item dd3-item" data-id="' . $datas->id . '">
                        <div class="dd-handle dd3-handle">
                        
                        </div>
                        <div class="dd3-content">
                            ' . $datas->name . '
                            <a a href="' . Yii::$app->urlManager->baseUrl . '/menu/update?id=' . $datas->id . '" data-pjax="0" role="modal-remote" data-toggle="tooltip" style="float: right" title="Sửa" class="btn-sua-menu" data-id="' . $datas->id . '"><i class="fa fa-edit"></i></a>
                            <a style="float: right" title="Xóa" class="btn-xoa-menu" data-id="' . $datas->id . '"><i class="fa fa-remove"></i></a>
                            </div>';
                    self::createMenu($datas->id, $data);
                    echo '</li>';
                }
            }
        } else {
            $temp = 0;
            foreach ($data as $datas) {
                if ($datas->parent == $id) {
                    $temp++;

                }
            }
            if ($temp != 0) {
                echo '<ol class="dd-list">';
                foreach ($data as $datas) {
                    if ($datas->parent == $id) {
                        echo '
                    <li class="dd-item dd3-item" data-id="' . $datas->id . '">
                        <div class="dd-handle dd3-handle">
                        
                        </div>
                        <div class="dd3-content">
                            ' . $datas->name . '
                            
                            <a a href="' . Yii::$app->urlManager->baseUrl . '/menu/update?id=' . $datas->id . '" data-pjax="0" role="modal-remote" data-toggle="tooltip" style="float: right" title="Sửa" class="btn-sua-menu" data-id="' . $datas->id . '"><i class="fa fa-edit"></i></a>
                            <a style="float: right" title="Xóa" class="btn-xoa-menu" data-id="' . $datas->id . '"><i class="fa fa-remove"></i></a>
                            </div>';
                        self::createMenu($datas->id, $data);
                        echo '</li>';
                    }
                }
                echo '</ol>';
            }
        }
        return;
    }

    public static function updateMenu($id, $data, $ord)
    {

        if ($id == 'null') {
            foreach ($data as $datas) {
                \common\models\Menu::updateAll(['parent' => null, 'ord' => $ord], ['id' => $datas['id']]);
                $ord++;
                if (isset($datas['children'])) {
                    self::updateMenu($datas['id'], $datas['children'], ($ord + 1));
                }
            }
        } else {
            foreach ($data as $datas) {
                \common\models\Menu::updateAll(['parent' => $id, 'ord' => $ord], ['id' => $datas['id']]);
                $ord++;
                if (isset($datas['children'])) {
                    self::updateMenu($datas['id'], $datas['children'], ($ord + 1));
                }
            }
        }
        return;
    }

    public static function deleteMenu($id)
    {
        $con = \common\models\Menu::find()->where('parent = :pr', [':pr' => $id])->all();
        if (!empty($con)) {
            foreach ($con as $cons) {
                self::deleteMenu($cons->id);
                \common\models\Menu::deleteAll(['id' => $id]);
            }
        }
        \common\models\Menu::deleteAll(['id' => $id]);
    }

    public static function getMenu()
    {
        $data = array(
            ['value' => 'link', 'text' => 'Liên kết tĩnh', 'group' => 'Liên kết tĩnh'],
            ['value' => '/', 'text' => '|--Trang chủ', 'group' => 'Liên kết thông thường'],
            ['value' => '/lien-he.html', 'text' => '|--Trang liên hệ', 'group' => 'Liên kết thông thường'],
        );

        $page = \common\models\Page::find()->where('active = 1')->all();
        foreach ($page as $pages) {
            $new = array();
            $new['value'] = $pages->url;
            $new['text'] = "|--" . $pages->title;
            $new['group'] = 'Trang nội dung';
            $data[] = $new;
        }

        $catnew = \common\models\Catnew::find()->where('parent=-1 and active=1')->all();
        foreach ($catnew as $cat) {
            $new = array();
            $new['value'] = "/" . $cat->url . "-l" . $cat->id . ".html";
            $new['text'] = "|--" . $cat->name;
            $new['group'] = "Chuyên mục tin tức";
            $data[] = $new;
        }

        $coquanbanhanh = \common\models\Coquanbanhanh::find()->all();
        $loaivbhc = \common\models\Loaivbhc::find()->all();
        if(!empty($loaivbhc)){
            foreach ($coquanbanhanh as $cqbh) {
                foreach ($loaivbhc as $loaivbhcs) {
                    $new = array();
                    $new['value'] = "/" . func::taoduongdan($loaivbhcs->ten) . "-vb" . $loaivbhcs->id . ".html";
                    $new['text'] = "|--" . $loaivbhcs->ten;
                    $new['group'] = $cqbh->ten;
                    $data[] = $new;
                }
            }
        }

        return $data;
    }

    public static function callMenu($id, $datas, $sub_ul_class)
    {
        if ($id == 'null') {
            foreach ($datas as $data) {
                if (is_null($data->parent)) {
                    echo '<li data-id="' . $data->id . '"><a href="' . Yii::$app->urlManager->baseUrl . $data->link . '">' . $data->name . '</a>';
                    self::callMenu($data->id, $datas, $sub_ul_class);
                    echo '</li>';
                }
            }
        } else {
            $temp = 0;
            foreach ($datas as $data) {
                if ($data->parent == $id) {
                    $temp++;
                }
            }
            if ($temp != 0) {
                echo '<ul class="' . $sub_ul_class . '">';
                foreach ($datas as $data) {
                    if ($data->parent == $id) {
                        echo '<li data-id="' . $data->id . '"><a href="' . Yii::$app->urlManager->baseUrl . $data->link . '">' . $data->name . '</a>';
                        self::callMenu($data->id, $datas, $sub_ul_class);
                        echo '</li>';
                    }
                }
                echo '</ul>';
            }
        }
        return;
    }

    public static function callCat($id, $datas, $sub_ul_class, $cur, $dosau)
    {
        if($cur==$dosau)//dừng khi đạt độ sâu cho trước
            return;

        if ($id == 'null') {
            foreach ($datas as $data) {
                if ($data->parent==-1) {
                    $temp = 0;
                    foreach ($datas as $item) {
                        if ($item->parent == $data->id) {
                            $temp++;
                            break;
                        }
                    }
                    $parent = ($temp>0)?'parent':'';
                    echo '<li><a class="'.$parent.'" href="' . Yii::$app->urlManager->createUrl(['product/product','path'=>$data->url,'id'=>$data->id]).'"><i class="fa '.$data->small_icon.'" aria-hidden="true"></i>' . $data->name . '</a>';
                    self::callCat($data->id, $datas, $sub_ul_class, $cur+1, $dosau);
                    echo '</li>';
                }
            }
        } else {
            $temp = 0;
            foreach ($datas as $data) {
                if ($data->parent == $id) {
                    $temp++;
                    break;
                }
            }
            if ($temp != 0) {
                echo '
                    <div class="vertical-dropdown-menu">
                        <div class="vertical-groups col-sm-12">
                            <ul class="' . $sub_ul_class . ' group-link-default">';
                foreach ($datas as $data) {
                    if ($data->parent == $id) {
                        echo '<li><a href="' .Yii::$app->urlManager->createUrl(['product/product','path'=>$data->url,'id'=>$data->id]). '"><i class="fa fa-angle-double-right" aria-hidden="true"></i>' . $data->name . '</a>';
                        self::callCat($data->id, $datas, $sub_ul_class, $cur+1, $dosau);
                        echo '</li>';
                    }
                }
                echo '
                            </ul>
                        </div>
                    </div>';
            }
        }
        return;
    }

    public static function callMobileMenu($id, $datas, $sub_ul_class, $cur, $dosau)
    {
        if($cur==$dosau)//dừng khi đạt độ sâu cho trước
            return;

        if ($id == 'null') {
            foreach ($datas as $data) {
                if (is_null($data->parent)) {
                    $temp = 0;
                    foreach ($datas as $item) {
                        if ($item->parent == $data->id) {
                            $temp++;
                            break;
                        }
                    }
                    $parent = ($temp>0)?'chopdown':'';
                    $href = ($temp>0)?'#':Yii::$app->urlManager->baseUrl . $data->link;
                    echo '<li><a data-toggle="collapse" data-target="#dropdown'.$data->id.'" class="'.$parent.'" href="' . $href . '">' . $data->name . '</a>';
                    self::callMobileMenu($data->id, $datas, $sub_ul_class, $cur, $dosau);
                    echo '</li>';
                }
            }
        } else {
            $temp = 0;
            foreach ($datas as $data) {
                if ($data->parent == $id) {
                    $temp++;
                    break;
                }
            }
            if ($temp != 0) {
                echo '<ul id="dropdown'.$id.'" class="' . $sub_ul_class . '">';
                foreach ($datas as $data) {
                    if ($data->parent == $id) {
                        $temp = 0;
                        foreach ($datas as $item) {
                            if ($item->parent == $data->id) {
                                $temp++;
                                break;
                            }
                        }
                        $parent = ($temp>0)?'chopdown':'';
                        $href = ($temp>0)?'#':Yii::$app->urlManager->baseUrl . $data->link;
                        echo '<li><a data-toggle="collapse" data-target="#dropdown'.$data->id.'" class="'.$parent.'" href="' . $href . '">' . $data->name . '</a>';
                        self::callMobileMenu($data->id, $datas, $sub_ul_class, $cur, $dosau);
                        echo '</li>';
                    }
                }
                echo '</ul>';
            }
        }
        return;
    }

    public static function trangthai($str ='0|1|2')
    {
        if ($str =='0')
            return '<span class="label label-info">Đang chờ xử lý</span>';
        if ($str =='2')
            return '<span class="label label-danger">Hủy đơn hàng</span>';
        if ($str =='1')
            return '<span class="label label-success">Giao hàng thành công</span>';

    }

    public static function is2DCatArray($id)
    {
        $subcats = \common\models\Catproduct::getSubCatProduct($id);
        foreach ($subcats as $subcat){
            $leafcats = \common\models\Catproduct::getSubCatProduct($subcat->id);
            if(count($leafcats))
                return true;
        }
        return false;
    }

    public  static function compress($source, $destination, $quality) {

        $info = getimagesize($source);

        if ($info['mime'] == 'image/jpeg')
            $image = imagecreatefromjpeg($source);

        elseif ($info['mime'] == 'image/gif')
            $image = imagecreatefromgif($source);

        elseif ($info['mime'] == 'image/png')
            $image = imagecreatefrompng($source);

        imagejpeg($image, $destination, $quality);

        return $destination;
    }

    public static function uploadfile($name, $folder, $oldfile, $capacity)
    {
        ini_set('upload_max_filesize', $capacity);
        $file = \yii\web\UploadedFile::getInstanceByName($name);

        if (!is_null($file)) {
            if (is_file(Yii::getAlias('@root') . $oldfile)) unlink(Yii::getAlias('@root') . $oldfile);
            $filename = $folder . self::taoduongdan($file->name);
            $path = Yii::getAlias('@root') . $filename;
            if ($file->saveAs($path)) {
                return  $filename;
            } else return 'savefail';
        } else return "null";
    }

    public static function getDataTypeStringByType($type){
        $array = [
            'number'=>'Số',
            'text'=>'Chữ',
            'textarea'=>'Đoạn văn bản',
        ];
        if(isset($array[$type]))
        return $array[$type];
        return "Chưa định nghĩa kiểu dữ liệu";
    }

    public static function dataTypeList(){
        return [
          'number'=>self::getDataTypeStringByType('number'),
          'text'=>self::getDataTypeStringByType('text'),
          'textarea'=>self::getDataTypeStringByType('textarea'),

        ];
    }

    public static function inputGeneratorFromColumnType($name,$id,$value,$attrParam,$type,$requires,$label){
        $required="required";
        if($requires==0){
            $required="";
        }
        $stringParam="";
        foreach ($attrParam as $index=> $valueParam){
            $stringParam.=" ".$index."='".$valueParam."' ";
        }

        if($type=="textarea"){
            return "<div class='form-group'><label class='control-label'>".$label."</label><textarea class='form-control' ".$required ." name='".$name."' ".(($id!="")?"id='".$id."'":"")." ".$stringParam.">".$value."</textarea></div>";
        }else{
            return "<div class='form-group'><label class='control-label'>".$label."</label><input class='form-control' ".$required ." type='".$type."' name='".$name."' ".(($id!="")?"id='".$id."'":"")." ".$stringParam."/></div>";
        }
    }

    public static function getListNhanVanBan(){
        return ['Nhận để biết','Giao việc','Yêu cầu trả lời bằng văn bản'];
    }

    public static function lib($text){
        $lib = [
            "dachungngua"=>'Đã chủng ngừa',
            "chuachungngua"=>'Chưa chủng ngừa',
            "phanungsautiem"=>'Phản ứng sau tiêm',
            "ngayhentiem"=>'Ngày hẹn tiêm',
            "datiem"=>'Đã tiêm',
            "thangthai"=>'Tháng thai',
        ];
        if(isset($lib[$text])){
            return $lib[$text];
        }
        return $text;
    }
    public static function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
    public static function getListInt($from, $to){
        $arraylist = [];
        for($i = $from;$i<=$to;$i++){
            $arraylist[$i]=$i;
        }
        return $arraylist;
    }
    public static function geticon($ext){
        return is_file(dirname(dirname(__DIR__))."/images/icon/".$ext.".png")?"/images/icon/".$ext.".png":"/images/icon/commonfile.png";
    }
}