<?php

namespace backend\controllers;
//636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236

use backend\models\ChangePasswordForm;
use common\models\Admin;
use backend\models\PasswordResetRequestAdminForm;
use backend\models\ResetPasswordAdminForm;
use common\models\Benhvien;
use common\models\Commentvanban;
use common\models\Configure;
use common\models\Congviec;
use common\models\Donvi;
use common\models\Duan;
use common\models\Khachhang;
use common\models\Khaibaoyte;
use common\models\Lichsukhambenh;
use common\models\Log;
use common\models\Nguoinhanviec;
use common\models\Notice;
use common\models\Notification;
use common\models\Phongban;
use common\models\search\DuannSearch;
use common\models\search\KhachhangSearch;
use common\models\search\VanbandenSearch;
use common\models\search\VanbandiSearch;
use common\models\search\VanbanSearch;
use common\models\Vanbandi;
use common\modules\auth\models\AuthItem;

use PhpOffice\PhpWord\TemplateProcessor;
use Yii;
use yii\base\InvalidParamException;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\AdminLoginForm;
use yii\web\Response;
use function foo\func;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'confirm', 'changepassword', 'xuatbaocao', 'xuatbaocaotheothoigian', 'xuatbaocaocanhbao', 'xuatbaocaocanhbaotheothoigian',
                            'thongbao', 'request-password-reset', 'reset-password', 'updatengay', "excel", 'commentvb', 'thuhoicomment', 'updatenotice'
                        ,"xuatbaocaocanhbaovungdich","xuatbaocaocanhbaovungdichtheothoigian",'download','updateseen','updatesent','notification',
                            'viewcongvan','getnhanvienphongban','getnhanvienphongbanforcheckbox'
                            ],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','quantri', 'test'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actionUpdateseen(){
        Notification::updateAll(['isseen'=>true],['id'=>$_POST['id']]);
    }
    public function actionUpdatesent(){
        Notification::updateAll(['issent'=>true],['id'=>$_POST['id']]);
    }
    public function actionNotification(){
        $notification = \common\models\Notification::find()->where(['reciever'=>Yii::$app->user->id,'issent'=>false])->orderBy("id desc")->limit(20)->all();
        return Json::encode($notification);
    }
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionQuantri()
    {
        $searchModel = new DuannSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndex(){
        return $this->renderPartial("indexfake");
    }
    /**
     * Login action.
     *
     * @return string
     */

    public function actionLogin()
    {

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new AdminLoginForm();

        if ($model->load(Yii::$app->request->post())) {

            if ($model->load(Yii::$app->request->post()) && $model->login()) {
                return $this->goBack();
            } else {
                return $this->renderPartial('login', [
                    'model' => $model,
                ]);
            }

        } else {
            return $this->renderPartial('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionChangepassword()
    {
        if (!Yii::$app->user->isGuest) {
            $model = new ChangePasswordForm();
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                if ($model->changePassword()) {
                    Yii::$app->session->setFlash('doipass', 'Đổi mật khẩu thành công!');
                    return $this->redirect(['site/thongbao']);
                }
            } else {
                return $this->render('thaypass', [
                    'model' => $model,
                ]);
            }
        }
    }

    public function actionThongbao()
    {
        return $this->render('thongbao');
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $request = Yii::$app->request;
        $model = new PasswordResetRequestAdminForm();

        if ($request->isAjax) {
            if ($request->isPost && isset($_POST['email'])) {
                $model->email = $_POST['email'];

                if ($model->sendEmail()) {
                    echo '<h2>Hãy kiểm tra email của bạn để được hướng dẫn chi tiết!</h2>';
                } else {
                    echo '<h2>Email bạn cung cấp không hợp lệ!</h2>';
                }
            }
        }
    }

    public function actionResetPassword($token)
    {

        $this->layout = 'authcont';
        try {
            $model = new ResetPasswordAdminForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionConfirm($id, $key)
    {
        $this->layout = 'authcont';
        $user = Admin::find()->where([
            'id' => $id,
        ])->one();

        $message = null;
        if ($key === $user->auth_key) {
            $message = 'Tài khoản của bạn đã được kích hoạt thành công!';
        } else {
            $message = 'Bạn không thể kích hoạt tài khoản nhiều lần!';
            if ($user->status === 0)
                $message = 'Tài khoản của bạn đã bị chặn!';
        }

        $user = Admin::find()->where([
            'id' => $id,
            'auth_key' => $key,
            'status' => 0,
        ])->one();

        if (!empty($user)) {
            $user->status = 10;
            $user->generateAuthKey();
            $user->save();
            Yii::$app->user->logout();
            $tempuser = Admin::findByUsername($user->username);
            Yii::$app->user->login($tempuser, 1800);
            Yii::$app->getSession()->setFlash('success', 'Congratulation! Your account has been activated successful!');
        } else {
            Yii::$app->getSession()->setFlash('warning', 'Your account has been suspended or activated!');
        }
        return $this->render('confirm', [
            'message' => $message,
        ]);
    }

    public function actionUpdatengay()
    {
        $date = date_create_from_format('d/m/Y', $_POST['cur']);
        date_add($date, date_interval_create_from_date_string($_POST['d']));
        return json_encode([
            'dulieu' => $this->renderPartial('calendar', ['cur' => date_format($date, 'd/m/Y')]),
            'newdate' => date_format($date, 'd/m/Y')
        ]);
    }

    public function actionExcel()
    {


// Your browser will name the file "myFile.docx"
// regardless of what it's named on the server


    }

    public function actionCommentvb()
    {
        if (isset($_POST['comment']) && isset($_POST['replyto']) && isset($_POST['vanbanid'])) {
            $valueCommentvb = new Commentvanban();
            $valueCommentvb->comment = preg_replace('/\s+/', ' ', $_POST['comment']);
            $valueCommentvb->nguoicomment = Yii::$app->user->id;
            $valueCommentvb->vanbandi_id = $_POST['vanbanid'];
            if ($_POST['replyto'] != -1) {
                $valueCommentvb->commentvanban_id = $_POST['replyto'];
            }
            $duan = Duan::findOne($_POST['vanbanid']);
            if ($valueCommentvb->save()) {
                $userlist = [];
                array_push($userlist, $duan->nguoitao);
                array_push($userlist, $duan->nguoiphutrach);
                array_push($userlist, $duan->truongphongphutrach);
                $congviec = Congviec::find()->where(['duan_id'=>$duan->id])->all();
                $congvieclist = [];
                foreach ($congviec as $value){
                    $congvieclist[]=$value->id;
                }
                $nguoinhanviec = Nguoinhanviec::find()->where(["IN","congviecid",$congvieclist])->all();
                foreach ($nguoinhanviec as $value){
                    $userlist[]=$value->nguoiduocgan;
                }
                $uniquelist = array_unique($userlist);
                foreach ($uniquelist as $data){
                    Notification::push(
                        Yii::$app->user->identity->id,
                        $data,
                        Yii::$app->user->identity->ten." đã trao đổi vào Công việc <b>".$duan->ten."</b> trong đó bạn là người tham gia!",
                        "Tạo Công việc",
                        Yii::$app->user->identity->ten,
                        Yii::$app->urlManager->createUrl(['duan/detail','id'=>$duan->id])
                    );
                }

                return Json::encode([
                    'type' => "success",
                    'content' => ($_POST['replyto'] == -1) ? '<li class="media">
        <div class="media-body todo-comment" id="replyto-' . $valueCommentvb->id . '">
            <button type="button" data-reply="' . $valueCommentvb->id . '" user-reply="' . $valueCommentvb->nguoicomment0->ten . '"
                    class="todo-comment-btn btn btn-circle btn-default btn-xs">
                &nbsp; Trả lời &nbsp;  <span style="font-weight: bold">' . $valueCommentvb->nguoicomment0->ten . '</span> &nbsp; 
            </button>
            <p class="todo-comment-head">
                <span class="todo-comment-username">' . $valueCommentvb->nguoicomment0->ten . '</span>
                &nbsp; <span
                        class="todo-comment-date">' . $valueCommentvb->ngaycomment . '</span>
            </p>
            <p class="todo-text-color">
                ' . $valueCommentvb->comment . '
            </p>
        </div>
    </li>' : '<div class="media" style="padding-left: 15px">

                                                        <div class="media-body">
                                                            <p class="todo-comment-head">
                                                                <span class="todo-comment-username" >' . $valueCommentvb->nguoicomment0->ten . ' <i>trả lời ' . $valueCommentvb->commentvanban->nguoicomment0->ten . '</i></span>
                                                                &nbsp; <span
                                                                        class="todo-comment-date">' . $valueCommentvb->ngaycomment . '</span>
                                                            </p>
                                                            <p class="todo-text-color">
                                                                ' . $valueCommentvb->comment . '
                                                            </p>
                                                        </div>
                                                    </div>'
                ]);
            } else {
                return Json::encode([
                    'type' => 'fail',
                    'content' => Json::encode($valueCommentvb->errors)
                ]);
            }

        }
        return false;
    }

    public function actionThuhoicomment()
    {
        if (isset($_POST['id'])) {
            $comment = Commentvanban::find()->where(['id' => $_POST['id']])->one();
            if (!is_null($comment)) {
                /** @var Commentvanban $comment */
                if ($comment->nguoicomment == Yii::$app->user->id) {
                    $comment->comment = "@thuhoithuhoi@";

                    if ($comment->save()) {
                        return Json::encode([
                            'type' => 'success',
                            'content' => "Thành công!"
                        ]);
                    } else {
                        return Json::encode([
                            'type' => 'false',
                            'content' => Json::encode($comment->errors)
                        ]);
                    }
                } else {
                    $log = new Log();
                    $log->time = \func::getTimeNow();
                    $log->noidung = "Hành vi hack can thiệp vào hệ thống. Module Commentvanban";
                    $log->user = Yii::$app->user->identity->username;
                    $log->loai = 'Hack';
                    $log->banghi = 1;
                    $log->save();
                    return Json::encode([
                        'type' => 'false',
                        'content' => "Hành vi hack! Bạn không phải chủ sở hữu bình luận này!"
                    ]);
                }
            } else {
                return Json::encode([
                    'type' => 'false',
                    'content' => "Không tìm thấy bình luận cần thu hồi"
                ]);
            }
        } else {
            return false;
        }
    }

    public function actionUpdatenotice()
    {

        if ($_POST['type'] == 'tiendo') {
            $notice = (Notice::find()->where(['like', 'userlist', '%"' . Yii::$app->user->id . '"%', false])
                ->andWhere(['vanbandiid' => $_POST['id']])
                ->andWhere(['not like', 'activeuserlist', '%"' . Yii::$app->user->id . '"%', false]))
                ->orderBy('id desc')->all();

            foreach ($notice as $notices) {
                /** @var Notice $notices */
                var_dump(strpos($notices->type, "Cập nhật tiến độ công việc"));
                if (strpos($notices->type, "Cập nhật tiến độ công việc") !== false ||
                    strpos($notices->type, "Hoàn thành việc được giao") !== false ||
                    strpos($notices->type, "Hủy kết quả hoàn thành công việc") !== false ||
                    strpos($notices->type, "Hoàn thành Hồ sơ sức khỏe") !== false
                ) {

                    $jsonlist = Json::decode($notices->activeuserlist);
                    array_push($jsonlist, (string)Yii::$app->user->id);
                    $notices->activeuserlist = Json::encode($jsonlist);
                    $notices->save();
                }
            }

        } else if ($_POST['type'] == 'traodoi') {
            $notice = Notice::find()->where(['like', 'userlist', '%"' . Yii::$app->user->id . '"%', false])
                ->andWhere(['vanbandiid' => $_POST['id']])
                ->andWhere(['not like', 'activeuserlist', '%"' . Yii::$app->user->id . '"%', false])->orderBy('id desc')->all();
            foreach ($notice as $notices) {
                /** @var Notice $notices */

                if (strpos($notices->type, "Đăng bình luận Hồ sơ sức khỏe") !== false) {
                    $jsonlist = Json::decode($notices->activeuserlist);
                    array_push($jsonlist, (string)Yii::$app->user->id);
                    $notices->activeuserlist = Json::encode($jsonlist);
                    $notices->save();
                }
            }
        }
    }

    public function actionXuatbaocao($id)
    {
        ini_set('memory_limit', '-1');
        $listDuLieu = null;
        if ($id == -1 || $id == 0) {
            $listDuLieu = Khaibaoyte::find()->orderBy('donvi asc, id desc')->all();
        } else {
            $listDuLieu = Khaibaoyte::find()->where(['donvi' => $id])->orderBy('id desc')->all();
        }

        $objPHPExcel = new \PHPExcel();
        $objPHPExcel->getProperties()->setCreator("DC Tech")
            ->setLastModifiedBy("DC Tech")
            ->setTitle("Office 2007 XLSX")
            ->setSubject("Office 2007 XLSX")
            ->setDescription("generated by DC Tech.")
            ->setKeywords("office 2007 openxml php")
            ->setCategory("Result file");


        $objPHPExcel->createSheet(0);
        $sheet = $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setTitle('Báo cáo' . \func::getTimeNowForFilename());

        $objPHPExcel->getActiveSheet()
            ->getPageSetup()
            ->setOrientation(\PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        $objPHPExcel->getActiveSheet()
            ->getPageSetup()
            ->setPaperSize(\PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
//            $sheet->setCellValue('A1', 1);
        $default = array(
            'font' => array(
                'bold' => false,
                'color' => array('rgb' => '000000'),
                'size' => 11,
                'name' => 'Times new Roman'
            ),


        );
        $header = array(
            'font' => array(
                'bold' => true,
                'color' => array('rgb' => '000000'),
                'size' => 12,
                'name' => 'Times new Roman'
            ),

        );


        $sheet = $objPHPExcel->setActiveSheetIndex(0);
        $sheet->getDefaultStyle()->applyFromArray($default);

        $sheet->getStyle(1)->applyFromArray($header);

        \PHPExcel_Shared_Font::setAutoSizeMethod(\PHPExcel_Shared_Font::AUTOSIZE_METHOD_EXACT);

        $donvi = -2;
        $row = 1;
        $i = 0;
        foreach ((new Khaibaoyte())->attributeLabels() as $index => $value) {
            $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($i)
                ->setAutoSize(true);
            if ($index == "id") {
                $sheet->setCellValueByColumnAndRow($i, $row, "STT");
            } else {
                $sheet->setCellValueByColumnAndRow($i, $row, $value);
            }

            $i++;
        }
        $row++;
        $stt = 1;
        foreach ($listDuLieu as $dulieu) {
            /** @var Khaibaoyte $dulieu */

            if ((int)$donvi != (int)$dulieu->donvi) {
                $stt = 1;
                $sheet->mergeCellsByColumnAndRow(0, $row, count((new Khaibaoyte())->attributeLabels()) - 1, $row);
                $sheet->getStyleByColumnAndRow(0, $row)->getFont()->setBold(true)->getColor()->setRGB("FF0000");
                $sheet->setCellValueByColumnAndRow(0, $row, ($dulieu->donvi != -1) ? Benhvien::findOne($dulieu->donvi)->name : "Sở y tế");
                $donvi = $dulieu->donvi;
                var_dump($donvi);
                $row++;
            }

            $i = 0;
            foreach ((new Khaibaoyte())->attributeLabels() as $index => $value) {
                if ($index == "id") {
                    $sheet->setCellValueByColumnAndRow($i, $row, $stt);
                }else if($index == "yeutodichte_quocgiadiadiem"){
                    $sheet->setCellValueByColumnAndRow($i, $row, ($dulieu->yeutodichte_quocgiadiadiem==""||$dulieu->yeutodichte_quocgiadiadiem==", Các vùng dịch: ")?"Không":str_replace(", Các vùng dịch: ",", ",$dulieu->yeutodichte_quocgiadiadiem));
                }
                else {
                    if (is_bool($dulieu->$index)) {
                        $sheet->setCellValueByColumnAndRow($i, $row, ($dulieu->$index) ? "Có" : "Không");
                    } else {
                        $sheet->setCellValueByColumnAndRow($i, $row, $dulieu->$index);
                    }
                }
                $i++;
            }
            $stt++;
            $row++;
        }
//            exit;
        $filename = "Baocao" . \func::taoduongdan(\func::getTimeNow()) . ".xlsx";

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');


        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Transfer-Encoding: binary');
        ob_end_clean(); // this
        ob_start();
        $objWriter->save("php://output"); // Change filename to force download
    }

    public function actionXuatbaocaocanhbao($id)
    {


        $objPHPExcel = new \PHPExcel();
        $objPHPExcel->getProperties()->setCreator("DC Tech")
            ->setLastModifiedBy("DC Tech")
            ->setTitle("Office 2007 XLSX")
            ->setSubject("Office 2007 XLSX")
            ->setDescription("generated by DC Tech.")
            ->setKeywords("office 2007 openxml php")
            ->setCategory("Result file");


        $objPHPExcel->createSheet(0);
        $sheet = $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setTitle('Báo cáo' . \func::getTimeNowForFilename());

        $objPHPExcel->getActiveSheet()
            ->getPageSetup()
            ->setOrientation(\PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        $objPHPExcel->getActiveSheet()
            ->getPageSetup()
            ->setPaperSize(\PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
//            $sheet->setCellValue('A1', 1);
        $default = array(
            'font' => array(
                'bold' => false,
                'color' => array('rgb' => '000000'),
                'size' => 11,
                'name' => 'Times new Roman'
            ),


        );
        $header = array(
            'font' => array(
                'bold' => true,
                'color' => array('rgb' => '000000'),
                'size' => 12,
                'name' => 'Times new Roman'
            ),

        );


        $sheet = $objPHPExcel->setActiveSheetIndex(0);
        $sheet->getDefaultStyle()->applyFromArray($default);

        $sheet->getStyle(1)->applyFromArray($header);
        $sheet->setCellValueByColumnAndRow(0, 1, "STT");
        $sheet->setCellValueByColumnAndRow(1, 1, "Người bệnh");
        $sheet->setCellValueByColumnAndRow(2, 1, "SDT");
        $sheet->setCellValueByColumnAndRow(3, 1, "Người nhà 1");
        $sheet->setCellValueByColumnAndRow(4, 1, "Người nhà 2");
        $sheet->setCellValueByColumnAndRow(5, 1, "Thành phố");
        $sheet->setCellValueByColumnAndRow(6, 1, "Quận huyện");
        $sheet->setCellValueByColumnAndRow(7, 1, "Phường xã");
        $sheet->setCellValueByColumnAndRow(8, 1, "Địa chỉ");
        $sheet->setCellValueByColumnAndRow(9, 1, "Đơn vị khai báo");
        $sheet->setCellValueByColumnAndRow(10, 1, "Ngày khai báo");
        $sheet->setCellValueByColumnAndRow(11, 1, "Vùng dịch đã đến");
        for ($i = 0; $i < 12; $i++) {
            $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($i)->setAutoSize(true);
        }
        \PHPExcel_Shared_Font::setAutoSizeMethod(\PHPExcel_Shared_Font::AUTOSIZE_METHOD_EXACT);
        $row = 2;
        $model = (new \common\models\Khaibaoyte());
        foreach ($model->attributes() as $value) {

            if ((strpos($value, "dauhieu") !== false || strpos($value, "yeutodichte") !== false) && $value != "yeutodichte_quocgiadiadiem") {


                if ($id == -1 || $id == 0) {
                    $listDuLieu = Khaibaoyte::find()->where([$value => 1])->orderBy('donvi asc, id desc')->all();
                } else {
                    $listDuLieu = Khaibaoyte::find()->where(['donvi' => $id, $value => 1])->orderBy('id desc')->all();
                }
                if (!empty($listDuLieu)) {
                    $sheet->mergeCellsByColumnAndRow(0, $row, 11, $row);
                    $sheet->getStyleByColumnAndRow(0, $row)->getFont()->setBold(true)->getColor()->setRGB("FF0000");
                    $sheet->setCellValueByColumnAndRow(0, $row, $model->attributeLabels()[$value]);
                    $stt = 1;
                    $row++;
                    foreach ($listDuLieu as $list) {
                        /** @var Khaibaoyte $list */
                        $sheet->setCellValueByColumnAndRow(0, $row, $stt);
                        $sheet->setCellValueByColumnAndRow(1, $row, $list->hovaten);
                        $sheet->setCellValueByColumnAndRow(2, $row, $list->sodienthoai);
                        $sheet->setCellValueByColumnAndRow(3, $row, $list->nguoithan1);
                        $sheet->setCellValueByColumnAndRow(4, $row, $list->nguoithan2);
                        $sheet->setCellValueByColumnAndRow(5, $row, $list->tinhthanhphohktt);
                        $sheet->setCellValueByColumnAndRow(6, $row, $list->quanhuyenhktt);
                        $sheet->setCellValueByColumnAndRow(7, $row, $list->xaphuonghktt);
                        $sheet->setCellValueByColumnAndRow(8, $row, $list->diachi);
                        $sheet->setCellValueByColumnAndRow(9, $row, ($list->donvi!=0 && $list->donvi!=-1)?Benhvien::findOne($list->donvi)->name:"Sở y tế");
                        $sheet->setCellValueByColumnAndRow(10, $row, $list->ngaykhaibao);
                        $sheet->setCellValueByColumnAndRow(11, $row, ($list->yeutodichte_quocgiadiadiem==""||$list->yeutodichte_quocgiadiadiem==", Các vùng dịch: ")?"Không":str_replace(", Các vùng dịch: ",", ",$list->yeutodichte_quocgiadiadiem));
                        $row++;
                        $stt++;
                    }
                }
            }
        }

//            exit;
        $filename = "Baocao" . \func::taoduongdan(\func::getTimeNow()) . ".xlsx";

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');


        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Transfer-Encoding: binary');
        ob_end_clean(); // this
        ob_start();
        $objWriter->save("php://output"); // Change filename to force download
    }
    public function actionXuatbaocaocanhbaovungdich($id)
    {
        $listDuLieu = null;
        if ($id == -1 || $id == 0) {
            $listDuLieu = Khaibaoyte::find()->where(['<>','yeutodichte_quocgiadiadiem',""])->andWhere(['<>','yeutodichte_quocgiadiadiem',", Các vùng dịch:"])->orWhere(['like','nguoithan1',"Đã tới vùng dịch"])->orWhere(['like','nguoithan2',"Đã tới vùng dịch"])->orderBy('donvi asc, id desc')->all();
        } else {
            $listDuLieu = Khaibaoyte::find()->where(['<>','yeutodichte_quocgiadiadiem',""])->andWhere(['<>','yeutodichte_quocgiadiadiem',", Các vùng dịch:"])->orWhere(['like','nguoithan1',"Đã tới vùng dịch"])->orWhere(['like','nguoithan2',"Đã tới vùng dịch"])->andWhere(['donvi' => $id])->orderBy('id desc')->all();
        }

        $objPHPExcel = new \PHPExcel();
        $objPHPExcel->getProperties()->setCreator("DC Tech")
            ->setLastModifiedBy("DC Tech")
            ->setTitle("Office 2007 XLSX")
            ->setSubject("Office 2007 XLSX")
            ->setDescription("generated by DC Tech.")
            ->setKeywords("office 2007 openxml php")
            ->setCategory("Result file");


        $objPHPExcel->createSheet(0);
        $sheet = $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setTitle('Báo cáo' . \func::getTimeNowForFilename());

        $objPHPExcel->getActiveSheet()
            ->getPageSetup()
            ->setOrientation(\PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        $objPHPExcel->getActiveSheet()
            ->getPageSetup()
            ->setPaperSize(\PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
//            $sheet->setCellValue('A1', 1);
        $default = array(
            'font' => array(
                'bold' => false,
                'color' => array('rgb' => '000000'),
                'size' => 11,
                'name' => 'Times new Roman'
            ),


        );
        $header = array(
            'font' => array(
                'bold' => true,
                'color' => array('rgb' => '000000'),
                'size' => 12,
                'name' => 'Times new Roman'
            ),

        );


        $sheet = $objPHPExcel->setActiveSheetIndex(0);
        $sheet->getDefaultStyle()->applyFromArray($default);

        $sheet->getStyle(1)->applyFromArray($header);
        $donvi = -2;
        $row = 1;
        $i = 0;
        foreach ((new Khaibaoyte())->attributeLabels() as $index => $value) {
            $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($i)
                ->setAutoSize(true);
            if ($index == "id") {
                $sheet->setCellValueByColumnAndRow($i, $row, "STT");
            } else {
                $sheet->setCellValueByColumnAndRow($i, $row, $value);
            }

            $i++;
        }
        $row++;
        $stt = 1;
        foreach ($listDuLieu as $dulieu) {
            /** @var Khaibaoyte $dulieu */

            if ((int)$donvi != (int)$dulieu->donvi) {
                $stt = 1;
                $sheet->mergeCellsByColumnAndRow(0, $row, count((new Khaibaoyte())->attributeLabels()) - 1, $row);
                $sheet->getStyleByColumnAndRow(0, $row)->getFont()->setBold(true)->getColor()->setRGB("FF0000");
                $sheet->setCellValueByColumnAndRow(0, $row, ($dulieu->donvi != -1) ? Benhvien::findOne($dulieu->donvi)->name : "Sở y tế");
                $donvi = $dulieu->donvi;
                var_dump($donvi);
                $row++;
            }

            $i = 0;
            foreach ((new Khaibaoyte())->attributeLabels() as $index => $value) {
                if ($index == "id") {
                    $sheet->setCellValueByColumnAndRow($i, $row, $stt);
                }else if($index == "yeutodichte_quocgiadiadiem"){
                    $sheet->setCellValueByColumnAndRow($i, $row, ($dulieu->yeutodichte_quocgiadiadiem==""||$dulieu->yeutodichte_quocgiadiadiem==", Các vùng dịch: ")?"Không":str_replace(", Các vùng dịch: ",", ",$dulieu->yeutodichte_quocgiadiadiem));
                }
                else {
                    if (is_bool($dulieu->$index)) {
                        $sheet->setCellValueByColumnAndRow($i, $row, ($dulieu->$index) ? "Có" : "Không");
                    } else {
                        $sheet->setCellValueByColumnAndRow($i, $row, $dulieu->$index);
                    }
                }
                $i++;
            }
            $stt++;
            $row++;
        }

//            exit;
        $filename = "Baocao" . \func::taoduongdan(\func::getTimeNow()) . ".xlsx";

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');


        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Transfer-Encoding: binary');
        ob_end_clean(); // this
        ob_start();
        $objWriter->save("php://output"); // Change filename to force download
    }

    public function actionXuatbaocaocanhbaotheothoigian()
    {

        $id = $_GET['id'];

        $tungay = $_GET['tungay'];
        $denngay = $_GET['denngay'];
        if (!$tungay || !$denngay) {
            return $this->actionIndex();
        }
        if(isset($_GET['tugio'])){
            $tungay=$tungay." ".$_GET['tugio'].":00";
        }else{
            $tungay=$tungay." 00:00:00";
        }
        if(isset($_GET['dengio'])){
            $denngay=$denngay." ".$_GET['dengio'].":59";
        }else{
            $denngay=$denngay." 23:59:59";
        }
        $objPHPExcel = new \PHPExcel();
        $objPHPExcel->getProperties()->setCreator("DC Tech")
            ->setLastModifiedBy("DC Tech")
            ->setTitle("Office 2007 XLSX")
            ->setSubject("Office 2007 XLSX")
            ->setDescription("generated by DC Tech.")
            ->setKeywords("office 2007 openxml php")
            ->setCategory("Result file");


        $objPHPExcel->createSheet(0);
        $sheet = $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setTitle('Báo cáo' . \func::getTimeNowForFilename());

        $objPHPExcel->getActiveSheet()
            ->getPageSetup()
            ->setOrientation(\PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        $objPHPExcel->getActiveSheet()
            ->getPageSetup()
            ->setPaperSize(\PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
//            $sheet->setCellValue('A1', 1);
        $default = array(
            'font' => array(
                'bold' => false,
                'color' => array('rgb' => '000000'),
                'size' => 11,
                'name' => 'Times new Roman'
            ),


        );
        $header = array(
            'font' => array(
                'bold' => true,
                'color' => array('rgb' => '000000'),
                'size' => 12,
                'name' => 'Times new Roman'
            ),

        );


        $sheet = $objPHPExcel->setActiveSheetIndex(0);
        $sheet->getDefaultStyle()->applyFromArray($default);

        $sheet->getStyle(1)->applyFromArray($header);
        $sheet->setCellValueByColumnAndRow(0, 1, "STT");
        $sheet->setCellValueByColumnAndRow(1, 1, "Người bệnh");
        $sheet->setCellValueByColumnAndRow(2, 1, "SDT");
        $sheet->setCellValueByColumnAndRow(3, 1, "Người nhà 1");
        $sheet->setCellValueByColumnAndRow(4, 1, "Người nhà 2");
        $sheet->setCellValueByColumnAndRow(5, 1, "Thành phố");
        $sheet->setCellValueByColumnAndRow(6, 1, "Quận huyện");
        $sheet->setCellValueByColumnAndRow(7, 1, "Phường xã");
        $sheet->setCellValueByColumnAndRow(8, 1, "Địa chỉ");
        $sheet->setCellValueByColumnAndRow(9, 1, "Đơn vị khai báo");
        $sheet->setCellValueByColumnAndRow(10, 1, "Ngày khai báo");
        $sheet->setCellValueByColumnAndRow(11, 1, "Vùng dịch đã đến");
        for ($i = 0; $i < 12; $i++) {
            $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($i)->setAutoSize(true);
        }
        \PHPExcel_Shared_Font::setAutoSizeMethod(\PHPExcel_Shared_Font::AUTOSIZE_METHOD_EXACT);
        $row = 2;
        $model = (new \common\models\Khaibaoyte());
        foreach ($model->attributes() as $value) {

            if ((strpos($value, "dauhieu") !== false || strpos($value, "yeutodichte") !== false) && $value != "yeutodichte_quocgiadiadiem") {

                if ($id == -1 || $id == 0) {
                    $listDuLieu = Khaibaoyte::find()->where([$value => 1]);
                    if ($tungay != null && $denngay != null) {
                        $listDuLieu = $listDuLieu->andWhere(["<=", 'ngaykhaibao', $denngay])
                            ->andWhere([">=", 'ngaykhaibao', $tungay]);
                    }
                    $listDuLieu = $listDuLieu->orderBy('donvi asc, id desc')->all();
                } else {
                    $listDuLieu = Khaibaoyte::find()->where(['donvi' => $id, $value => 1]);
                    if ($tungay != null && $denngay != null) {
                        $listDuLieu = $listDuLieu->andWhere(["<=", 'ngaykhaibao', $denngay])
                            ->andWhere([">=", 'ngaykhaibao', $tungay]);
                    }
                    $listDuLieu = -$listDuLieu->orderBy('id desc')->all();
                }
                if (!empty($listDuLieu)) {
                    $sheet->mergeCellsByColumnAndRow(0, $row, 11, $row);
                    $sheet->getStyleByColumnAndRow(0, $row)->getFont()->setBold(true)->getColor()->setRGB("FF0000");
                    $sheet->setCellValueByColumnAndRow(0, $row, $model->attributeLabels()[$value]);
                    $stt = 1;
                    $row++;
                    foreach ($listDuLieu as $list) {
                        /** @var Khaibaoyte $list */
                        $sheet->setCellValueByColumnAndRow(0, $row, $stt);
                        $sheet->setCellValueByColumnAndRow(1, $row, $list->hovaten);
                        $sheet->setCellValueByColumnAndRow(2, $row, $list->sodienthoai);
                        $sheet->setCellValueByColumnAndRow(3, $row, $list->nguoithan1);
                        $sheet->setCellValueByColumnAndRow(4, $row, $list->nguoithan2);
                        $sheet->setCellValueByColumnAndRow(5, $row, $list->tinhthanhphohktt);
                        $sheet->setCellValueByColumnAndRow(6, $row, $list->quanhuyenhktt);
                        $sheet->setCellValueByColumnAndRow(7, $row, $list->xaphuonghktt);
                        $sheet->setCellValueByColumnAndRow(8, $row, $list->diachi);
                        $sheet->setCellValueByColumnAndRow(9, $row, ($list->donvi!=0 && $list->donvi!=-1)?Benhvien::findOne($list->donvi)->name:"Sở y tế");
                        $sheet->setCellValueByColumnAndRow(10, $row, $list->ngaykhaibao);
                        $sheet->setCellValueByColumnAndRow(11, $row, ($list->yeutodichte_quocgiadiadiem==""||$list->yeutodichte_quocgiadiadiem==", Các vùng dịch: ")?"Không":str_replace(", Các vùng dịch: ",", ",$list->yeutodichte_quocgiadiadiem));
                        $row++;
                        $stt++;
                    }
                }

            }
        }

//            exit;
        $filename = "Baocao" . \func::taoduongdan(\func::getTimeNow()) . ".xlsx";

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');


        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Transfer-Encoding: binary');
        ob_end_clean(); // this
        ob_start();
        $objWriter->save("php://output"); // Change filename to force download
    }

    public function actionXuatbaocaotheothoigian()
    {
        $id = $_GET['id'];
        $tungay = $_GET['tungay'];
        $denngay = $_GET['denngay'];
        if (!$tungay || !$denngay) {
            return $this->actionIndex();
        }

        if(isset($_GET['tugio'])){
            $tungay=$tungay." ".$_GET['tugio'].":00";
        }else{
            $tungay=$tungay." 00:00:00";
        }
        if(isset($_GET['dengio'])){
            $denngay=$denngay." ".$_GET['dengio'].":59";
        }else{
            $denngay=$denngay." 23:59:59";
        }

        $listDuLieu = [];
        if ($id == -1 || $id == 0) {
            $listDuLieu = Khaibaoyte::find();
            if ($tungay != null && $denngay != null) {
                $listDuLieu = $listDuLieu->where(["<=", 'ngaykhaibao', $denngay])
                    ->andWhere([">=", 'ngaykhaibao', $tungay]);
            }
            $listDuLieu = $listDuLieu->orderBy('donvi asc, id desc')->all();
        } else {
            $listDuLieu = Khaibaoyte::find()->where(['donvi' => $id]);
            if ($tungay != null && $denngay != null) {
                $listDuLieu = $listDuLieu->where(["<=", 'ngaykhaibao', $denngay])
                    ->andWhere([">=", 'ngaykhaibao', $tungay]);
            }
            $listDuLieu = $listDuLieu->orderBy('id desc')->all();
        }
        $objPHPExcel = new \PHPExcel();
        $objPHPExcel->getProperties()->setCreator("DC Tech")
            ->setLastModifiedBy("DC Tech")
            ->setTitle("Office 2007 XLSX")
            ->setSubject("Office 2007 XLSX")
            ->setDescription("generated by DC Tech.")
            ->setKeywords("office 2007 openxml php")
            ->setCategory("Result file");


        $objPHPExcel->createSheet(0);
        $sheet = $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setTitle('Báo cáo' . \func::getTimeNowForFilename());

        $objPHPExcel->getActiveSheet()
            ->getPageSetup()
            ->setOrientation(\PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        $objPHPExcel->getActiveSheet()
            ->getPageSetup()
            ->setPaperSize(\PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
//            $sheet->setCellValue('A1', 1);
        $default = array(
            'font' => array(
                'bold' => false,
                'color' => array('rgb' => '000000'),
                'size' => 11,
                'name' => 'Times new Roman'
            ),


        );
        $header = array(
            'font' => array(
                'bold' => true,
                'color' => array('rgb' => '000000'),
                'size' => 12,
                'name' => 'Times new Roman'
            ),

        );


        $sheet = $objPHPExcel->setActiveSheetIndex(0);
        $sheet->getDefaultStyle()->applyFromArray($default);

        $sheet->getStyle(1)->applyFromArray($header);

        \PHPExcel_Shared_Font::setAutoSizeMethod(\PHPExcel_Shared_Font::AUTOSIZE_METHOD_EXACT);

        $donvi = -2;
        $row = 1;
        $i = 0;
        foreach ((new Khaibaoyte())->attributeLabels() as $index => $value) {
            $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($i)
                ->setAutoSize(true);
            if ($index == "id") {
                $sheet->setCellValueByColumnAndRow($i, $row, "STT");
            }else {
                $sheet->setCellValueByColumnAndRow($i, $row, $value);
            }
            $i++;
        }
        $row++;
        $stt = 1;
        foreach ($listDuLieu as $dulieu) {
            /** @var Khaibaoyte $dulieu */

            if ((int)$donvi != (int)$dulieu->donvi) {
                $stt = 1;
                $sheet->mergeCellsByColumnAndRow(0, $row, count((new Khaibaoyte())->attributeLabels()) - 1, $row);
                $sheet->getStyleByColumnAndRow(0, $row)->getFont()->setBold(true)->getColor()->setRGB("FF0000");
                $sheet->setCellValueByColumnAndRow(0, $row, ($dulieu->donvi != -1) ? Benhvien::findOne($dulieu->donvi)->name : "Sở y tế");
                $donvi = $dulieu->donvi;
                var_dump($donvi);
                $row++;
            }

            $i = 0;
            foreach ((new Khaibaoyte())->attributeLabels() as $index => $value) {
                if ($index == "id") {
                    $sheet->setCellValueByColumnAndRow($i, $row, $stt);
                }else if($index == "yeutodichte_quocgiadiadiem"){
                    $sheet->setCellValueByColumnAndRow($i, $row,($dulieu->yeutodichte_quocgiadiadiem==""||$dulieu->yeutodichte_quocgiadiadiem==", Các vùng dịch: ")?"Không":str_replace(", Các vùng dịch: ",", ",$dulieu->yeutodichte_quocgiadiadiem));
                } else {
                    if (is_bool($dulieu->$index)) {
                        $sheet->setCellValueByColumnAndRow($i, $row, ($dulieu->$index) ? "Có" : "Không");
                    } else {
                        $sheet->setCellValueByColumnAndRow($i, $row, $dulieu->$index);
                    }
                }
                $i++;
            }
            $stt++;
            $row++;
        }
//            exit;
        $filename = "Baocao" . \func::taoduongdan(\func::getTimeNow()) . ".xlsx";

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');


        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Transfer-Encoding: binary');
        ob_end_clean(); // this
        ob_start();
        $objWriter->save("php://output"); // Change filename to force download
    }
    public function actionXuatbaocaocanhbaovungdichtheothoigian()
    {
        $id = $_GET['id'];

        $tungay = $_GET['tungay'];
        $denngay = $_GET['denngay'];
        if (!$tungay || !$denngay) {
            return $this->actionIndex();
        }
        if(isset($_GET['tugio'])){
            $tungay=$tungay." ".$_GET['tugio'].":00";
        }else{
            $tungay=$tungay." 00:00:00";
        }
        if(isset($_GET['dengio'])){
            $denngay=$denngay." ".$_GET['dengio'].":59";
        }else{
            $denngay=$denngay." 23:59:59";
        }
        $listDuLieu = [];
        if ($id == -1 || $id == 0) {
            $listDuLieu = Khaibaoyte::find()->where(['<>','yeutodichte_quocgiadiadiem',""])->andWhere(['<>','yeutodichte_quocgiadiadiem',", Các vùng dịch:"])->orWhere(['like','nguoithan1',"Đã tới vùng dịch"])->orWhere(['like','nguoithan2',"Đã tới vùng dịch"]);
            if ($tungay != null && $denngay != null) {
                $listDuLieu = $listDuLieu->where(["<=", 'ngaykhaibao', $denngay])
                    ->andWhere([">=", 'ngaykhaibao', $tungay]);
            }
            $listDuLieu = $listDuLieu->orderBy('donvi asc, id desc')->all();
        } else {
            $listDuLieu = Khaibaoyte::find()->where(['<>','yeutodichte_quocgiadiadiem',""])->andWhere(['<>','yeutodichte_quocgiadiadiem',", Các vùng dịch:"])->orWhere(['like','nguoithan1',"Đã tới vùng dịch"])->orWhere(['like','nguoithan2',"Đã tới vùng dịch"]);
            if ($tungay != null && $denngay != null) {
                $listDuLieu = $listDuLieu->where(["<=", 'ngaykhaibao', $denngay])
                    ->andWhere([">=", 'ngaykhaibao', $tungay]);
            }
            $listDuLieu = $listDuLieu->andWhere(['donvi' => $id])->orderBy('id desc')->all();
        }
        $objPHPExcel = new \PHPExcel();
        $objPHPExcel->getProperties()->setCreator("DC Tech")
            ->setLastModifiedBy("DC Tech")
            ->setTitle("Office 2007 XLSX")
            ->setSubject("Office 2007 XLSX")
            ->setDescription("generated by DC Tech.")
            ->setKeywords("office 2007 openxml php")
            ->setCategory("Result file");


        $objPHPExcel->createSheet(0);
        $sheet = $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setTitle('Báo cáo' . \func::getTimeNowForFilename());

        $objPHPExcel->getActiveSheet()
            ->getPageSetup()
            ->setOrientation(\PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        $objPHPExcel->getActiveSheet()
            ->getPageSetup()
            ->setPaperSize(\PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
//            $sheet->setCellValue('A1', 1);
        $default = array(
            'font' => array(
                'bold' => false,
                'color' => array('rgb' => '000000'),
                'size' => 11,
                'name' => 'Times new Roman'
            ),


        );
        $header = array(
            'font' => array(
                'bold' => true,
                'color' => array('rgb' => '000000'),
                'size' => 12,
                'name' => 'Times new Roman'
            ),

        );


        $sheet = $objPHPExcel->setActiveSheetIndex(0);
        $sheet->getDefaultStyle()->applyFromArray($default);

        $sheet->getStyle(1)->applyFromArray($header);

        \PHPExcel_Shared_Font::setAutoSizeMethod(\PHPExcel_Shared_Font::AUTOSIZE_METHOD_EXACT);

        $donvi = -2;
        $row = 1;
        $i = 0;
        foreach ((new Khaibaoyte())->attributeLabels() as $index => $value) {
            $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($i)
                ->setAutoSize(true);
            if ($index == "id") {
                $sheet->setCellValueByColumnAndRow($i, $row, "STT");
            }else {
                $sheet->setCellValueByColumnAndRow($i, $row, $value);
            }
            $i++;
        }
        $row++;
        $stt = 1;
        foreach ($listDuLieu as $dulieu) {
            /** @var Khaibaoyte $dulieu */

            if ((int)$donvi != (int)$dulieu->donvi) {
                $stt = 1;
                $sheet->mergeCellsByColumnAndRow(0, $row, count((new Khaibaoyte())->attributeLabels()) - 1, $row);
                $sheet->getStyleByColumnAndRow(0, $row)->getFont()->setBold(true)->getColor()->setRGB("FF0000");
                $sheet->setCellValueByColumnAndRow(0, $row, ($dulieu->donvi != -1) ? Benhvien::findOne($dulieu->donvi)->name : "Sở y tế");
                $donvi = $dulieu->donvi;
                var_dump($donvi);
                $row++;
            }

            $i = 0;
            foreach ((new Khaibaoyte())->attributeLabels() as $index => $value) {
                if ($index == "id") {
                    $sheet->setCellValueByColumnAndRow($i, $row, $stt);
                }else if($index == "yeutodichte_quocgiadiadiem"){
                    $sheet->setCellValueByColumnAndRow($i, $row,($dulieu->yeutodichte_quocgiadiadiem==""||$dulieu->yeutodichte_quocgiadiadiem==", Các vùng dịch: ")?"Không":str_replace(", Các vùng dịch: ",", ",$dulieu->yeutodichte_quocgiadiadiem));
                } else {
                    if (is_bool($dulieu->$index)) {
                        $sheet->setCellValueByColumnAndRow($i, $row, ($dulieu->$index) ? "Có" : "Không");
                    } else {
                        $sheet->setCellValueByColumnAndRow($i, $row, $dulieu->$index);
                    }
                }
                $i++;
            }
            $stt++;
            $row++;
        }
//            exit;
        $filename = "Baocao" . \func::taoduongdan(\func::getTimeNow()) . ".xlsx";

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');


        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Transfer-Encoding: binary');
        ob_end_clean(); // this
        ob_start();
        $objWriter->save("php://output"); // Change filename to force download
    }
    public function actionDownload($id){
        $config = Configure::getConfig();
        $phieu = Khaibaoyte::findOne(['id'=>$id]);
        if(!is_null($phieu)){
            if(is_file(Yii::getAlias('@root') . "/attachment/template.docx")){
                $document = new TemplateProcessor(Yii::getAlias('@root') . "/attachment/template.docx");

                foreach ($phieu->attributes as $value => $dulieu) {

                    if($value=="donvi"){
                        if($phieu->donvi==-1||$phieu->donvi==0){
                            $document->setValue("donvi", "Sở y tế");
                        }
                        else{
                            $benhvien = Benhvien::findOne($phieu->donvi);
                            $document->setValue("donvi", (is_null($benhvien)?"Không xác định":$benhvien->name));
                        }
                    }else if($value=="khoaphonglamviec"){
                        if($phieu->khoaphonglamviec!='#N/A'){
                            $document->setValue("khoaphonglamviec", $phieu->khoaphonglamviec);
                        }else{
                            $document->setValue("khoaphonglamviec", "");
                        }
                    }
                    else if($value=="yeutodichte_tiepxucduongtinh"){
                        $document->setValue("yeutodichte_tiepxucduongtinh", ($phieu->yeutodichte_tiepxucduongtinh)?"Có":"Không");
                    }else if(is_bool($phieu->$value)){
                        $document->setValue($value."_".($phieu->$value), "✓");
                        $document->setValue($value."_".(!$phieu->$value), "");
                    }
                    else
                        $document->setValue($value, $phieu->$value);
                }
                $now = getdate();
                $document->setValue("ngay", $now['mday']);
                $document->setValue("thang", $now['mon']);
                $document->setValue("nam", $now['year']);

                $filename = "Phieu_".\func::getTimeNowForFilename().".docx";
                if(!file_exists(Yii::getAlias('@root') . "/phieukhambenh/") ){
                    mkdir(Yii::getAlias('@root') . "/phieukhambenh/", 0777, true);
                }
                $document->saveAs(Yii::getAlias('@root') . "/phieukhambenh/" . $filename);
                header("Content-Disposition: attachment; filename=".$filename);
                readfile(Yii::getAlias('@root') . "/phieukhambenh/".$filename); // or echo file_get_contents($temp_file);
                unlink(Yii::getAlias('@root') . "/phieukhambenh/".$filename);
            }else{
                return "Không tìm thấy file template";
            }

        }else{
            return $this->redirect(['site/error']);
        }
    }
    public function actionViewcongvan($r){
        Yii::$app->response->format = Response::FORMAT_JSON;
        return [
            'title'=> $r,
            'content'=>$this->renderPartial('viewcongvan',['r'=>$r]),
            'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"])
        ];

    }
    public function actionGetnhanvienphongban(){
        if(isset($_POST['id'])){
           if(isset($_POST['modelid'])){
               $return=[];
               $model = Duan::findOne($_POST['modelid']);
               foreach ($_POST['id'] as $data){
                   $phongban = Phongban::findOne($data);
                   $admin = Admin::find()->where(['phongban_id'=>$data])->all();

                   $return[]=[
                       'phongban'=>$phongban,
                       'nhanvien'=> $admin
                   ];
               }
               return $this->renderPartial('getnhanvienphongbanwidthmodel',['data'=>$return,'listxulychinh'=>Json::decode($model->nguoinhanviec),
                   'listphoihop'=>Json::decode($model->nguoinhanviecchitiet)]);
           }else{
               $return=[];
               foreach ($_POST['id'] as $data){
                   $phongban = Phongban::findOne($data);
                   $admin = Admin::find()->where(['phongban_id'=>$data])->all();
                   $return[]=[
                       'phongban'=>$phongban,
                       'nhanvien'=> $admin
                   ];
               }
               return $this->renderPartial('getnhanvienphongban',['data'=>$return]);
           }
        }
    }
    public function actionGetnhanvienphongbanforcheckbox(){
        if(isset($_POST['id'])){
           if(isset($_POST['modelid'])){
               $return=[];
               $model = Duan::findOne($_POST['modelid']);
               foreach ($_POST['id'] as $data){
                   $phongban = Phongban::findOne($data);
                   $admin = Admin::find()->where(['phongban_id'=>$data])->all();

                   $return[]=[
                       'phongban'=>$phongban,
                       'nhanvien'=> $admin
                   ];
               }
               return $this->renderPartial('getnhanvienphongbanforcheckboxwidthmodel',['data'=>$return,'listxulychinh'=>Json::decode($model->nguoinhanviec),
                   'listphoihop'=>Json::decode($model->nguoinhanviecchitiet)]);
           }else{
               $return=[];
               foreach ($_POST['id'] as $data){
                   $phongban = Phongban::findOne($data);
                   $admin = Admin::find()->where(['phongban_id'=>$data])->all();
                   $return[]=[
                       'phongban'=>$phongban,
                       'nhanvien'=> $admin
                   ];
               }
               return $this->renderPartial('getnhanvienphongbanforcheckbox',['data'=>$return]);
           }
        }
    }
}
