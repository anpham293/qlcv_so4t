<?php
namespace frontend\controllers;

use common\models\Album;
use common\models\Anhsanpham;
use common\models\Benhvien;
use common\models\Catnew;
use common\models\Catproduct;
use common\models\Configure;
use common\models\Congvanhanhchinh;
use common\models\Dienthoai;
use common\models\Dulieuhososuckhoe;
use common\models\Khaibaoyte;
use common\models\News;
use common\models\Page;
use common\models\Partner;
use common\models\Phuongxa;
use common\models\Picture;
use common\models\Product;
use common\models\Quanhuyen;
use common\models\Slides;
use frontend\models\ChangeAccountDetailForm;
use frontend\models\ChangeCompanyVerificationForm;
use frontend\models\ChangePasswordForm;
use frontend\models\UpdateDulieu;
use PhpOffice\PhpWord\TemplateProcessor;
use Yii;
use yii\base\InvalidParamException;
use yii\helpers\Json;
use yii\jui\Slider;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\Response;
use function foo\func;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $pageTitle;
    public $keyword="Sở y tế tỉnh Hải Dương";
    public $config;
    public $description="Website chính thức Sở y tế tỉnh Hải Dương";
    public $og_title;
    public $og_description;
    public $og_type = 'website';
    public $og_image;
    public $site_name;
    public $og_url;
    public $slides;
    public $album;
    public $vbhc;
    public $seoTitle="Sở y tế tỉnh Hải Dương";

    public $navbar = '';	//Thanh điều hướng cho trang con
    /**
     * @inheritdoc
     */
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?', '@'],
                    ],
                    [
                        'actions' => ['logout'],
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
    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionError()
    {
        return Yii::$app->controller->renderPartial("error404");
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionChecksdt(){
        if(isset($_POST['sdt'])&& trim($_POST['sdt'])!=""){
            $data = Khaibaoyte::find()->where(['sodienthoai'=>str_replace(" ","",trim($_POST["sdt"]))])->select("hovaten,ngaysinh,thangsinh,namsinh,gioitinh,diachi,tinhthanhphohktt,quanhuyenhktt,xaphuonghktt")->distinct()->all();
            return Json::encode($data);
        }
        return Json::encode([]);
    }
    public function actionTran(){
        return Yii::$app->session['trants']=$_POST['id'];
    }
    private function generateHtml($left, $right)
    {
        return '<div class="row" style="line-height: 180%;margin-top: 10px"><div class="col-xs-6" style="text-align: left; font-weight: bold">' . $left . '</div><div class="col-xs-6" style="text-align: left">' . $right . '</div></div>';
    }
    public function actionGetlichsu(){
        if(isset($_POST['sdt']) && $_POST['sdt']!=''){
            $khaibaos = Khaibaoyte::find()->where(['sodienthoai'=>$_POST['sdt']])->all();
            $array = [];
            foreach ($khaibaos as $khaibao){

                $dulieu = "";
                $dulieu.= $this->generateHtml("Họ và tên", $khaibao->hovaten);
                $dulieu.= $this->generateHtml("Ngày khai báo", $khaibao->ngaykhaibao);
                $dulieu.= $this->generateHtml("Ngày sinh", $khaibao->ngaysinh . "/" . $khaibao->thangsinh . "/" . $khaibao->namsinh);
                $dulieu.= $this->generateHtml("Giới tính", $khaibao->gioitinh);
                $dulieu.= $this->generateHtml("Địa chỉ", $khaibao->diachi.", ".$khaibao->xaphuonghktt.", ".$khaibao->quanhuyenhktt.", ".$khaibao->tinhthanhphohktt);
                $dulieu.= $this->generateHtml("Số điện thoại", $khaibao->sodienthoai);
                $dulieu.= $this->generateHtml("Lý do đến viện", $khaibao->lydodenvien);
                $dulieu.= $this->generateHtml("Người thân 1",$khaibao->nguoithan1);
                $dulieu.= $this->generateHtml("Người thân 2",$khaibao->nguoithan2);
                $dulieu.= $this->generateHtml("Phòng ban công tác (nếu là NV y tế)", $khaibao->khoaphonglamviec);
                $dulieu.= $this->generateHtml("Dấu hiệu", $khaibao->getDauHieu());
                $dulieu.= $this->generateHtml("Dịch tễ", $khaibao->getYeuToDichTe());
                $dulieu.= $this->generateHtml("Các vùng dịch đã đến", ($khaibao->yeutodichte_quocgiadiadiem==""||$khaibao->yeutodichte_quocgiadiadiem==", Các vùng dịch: ")?"Không":$khaibao->yeutodichte_quocgiadiadiem);
                $dulieu.= $this->generateHtml("Khai báo tại",($khaibao->donvi==0 ||$khaibao->donvi==-1)?"Website Sở Y Tế":(\common\models\Benhvien::find()->where(['id'=>$khaibao->donvi])->one())->name);
                $dulieu.= $this->generateHtml("In tờ khai",'<p><a class="btn btn-success" href="'.Yii::$app->urlManager->createUrl(['site/download','id'=>$khaibao->id]).'">In tờ khai</a></p>');

                $array[]=['ngaykhaibao'=>$khaibao->ngaykhaibao,"qrcode"=>$khaibao->privatekey,'data'=>$dulieu];
            }
            return Json::encode($array);
        }
        return Json::encode([['ngaykhaibao'=>"","qrcode"=>"",'data'=>'']]);
    }
    public function actionIndex()
    {
        return $this->redirect(Yii::$app->urlManager->baseUrl."/admin");
        $donvi = "";
        $iddonvi = -1;
        $currentUrl = "$_SERVER[HTTP_HOST]";
        $split = explode("dctech.haiduong.vn",$currentUrl);
        if($split[0]!=""){
            $domain = rtrim($split[0],".");
            $benhvien = Benhvien::findOne(['subdomain'=>$domain,'active'=>true]);
            if(is_null($benhvien)){
                return $this->redirect("http://dctech.haiduong.vn/");
            }else{
                $iddonvi=$benhvien->id;
                $donvi=$benhvien->name;
            }
        }
        $secret = "6Lc6HOQUAAAAAAsdfkr5bEUSN1Z9ebp7I6eN31Os";

        $response = null;

        $reCaptcha = new \ReCaptcha($secret);

        Yii::$app->language='vi-VN';
        $request = Yii::$app->request;
            $this->pageTitle = $donvi." Hệ thống khai báo y tế";
            $this->seoTitle = $donvi." Hệ thống khai báo y tế";
            $this->view->title = $donvi." Hệ thống khai báo y tế";
        $model = new Khaibaoyte();

        if($request->isGet){
            $model->loaikhaibao='Người bệnh';
            $model->namsinh=1990;
            $model->donvi=$iddonvi;
            $model->khoaphonglamviec="#N/A";
            return $this->render('index',['model'=>$model]);
        }
        elseif($request->isPost){

            if ($model->load($request->post())) {
                $model->hashcode=bin2hex(\func::getTimeNow());
                $model->listVungDich=(isset($_POST['Khaibaoyte']['listVungDich']))?$_POST['Khaibaoyte']['listVungDich']:[];
                $model->listVungDichNguoiNha1=(isset($_POST['Khaibaoyte']['listVungDichNguoiNha1']))?$_POST['Khaibaoyte']['listVungDichNguoiNha1']:[];
                $model->listVungDichNguoiNha2=(isset($_POST['Khaibaoyte']['listVungDichNguoiNha2']))?$_POST['Khaibaoyte']['listVungDichNguoiNha2']:[];
                //end json encode
                if(!$model->validate()){
                    return $this->render('index',['model'=>$model]);
                }
                //captcha
//                if(!isset($_POST['g-recaptcha-response']) || empty($_POST['g-recaptcha-response'])){
//                    Yii::$app->session->setFlash('gcaptcha','Chưa nhập captcha');
//                    return $this->render('index',['model'=>$model]);
//                }else{
//                    $response = $reCaptcha->verifyResponse(
//                        $_SERVER["REMOTE_ADDR"],
//                        $_POST["g-recaptcha-response"]
//                    );
//                }
//                if (!$response != null && !$response->success) {
//                    Yii::$app->session->setFlash('gcaptcha','Captcha không có giá trị hoặc Captcha không thuộc trang web này');
//                    return $this->render('index',['model'=>$model]);
//                }
                //endcaptcha

                if($model->save()){
                    $model->donvi=$iddonvi;
                    $returns = "";
                    if(is_array($model->listVungDich)){
                        foreach ($model->listVungDich as $listVungDich){
                            $returns.=$listVungDich." ;; ";
                        }
                    }
                    if(is_array($model->listVungDichNguoiNha1)){
                        $model->nguoithan1.=". Đã tới vùng dịch: ";
                        foreach ($model->listVungDichNguoiNha1 as $listVungDich){
                            $model->nguoithan1.=$listVungDich." ; ";
                        }
                    }
                    if(is_array($model->listVungDichNguoiNha2)){
                        $model->nguoithan2.=". Đã tới vùng dịch: ";
                        foreach ($model->listVungDichNguoiNha2 as $listVungDich){
                            $model->nguoithan2.=$listVungDich." ; ";
                        }
                    }
                    $model->yeutodichte_quocgiadiadiem = $model->yeutodichte_quocgiadiadiem.", Các vùng dịch: ".$returns;
                    $model->privatekey=md5($model->id."/".$model->hashcode);
                    $model->save();
                    return $this->redirect(['site/success','url'=>$model->privatekey]);
                }else{
                    return $this->render('index',['model'=>$model]);
                }
            }else{
                return $this->render('index',['model'=>$model]);
            }
        }
    }

    public function actionGetquanhuyenbytinhthanh(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        return Quanhuyen::getListQuanHuyenForDropdown($_POST['tinhthanh']);
    }
    public function actionGetphuongxabyquanhuyen(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        return Phuongxa::getListPhuongXaForDropdown($_POST['tinhthanh']);
    }

    public function beforeAction($action)
    {
        $this->navbar = '<li><a href="' . Yii::$app->urlManager->baseUrl . '" target="_self"><i class="fa fa-home"></i> Trang chủ</a></li>';
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }
    public function actionSuccess($url){
        $model = Khaibaoyte::findOne(['privatekey'=>$url]);
        if(is_null($model)){
            return $this->redirect(['site/error']);
        }

        if($model->privatekey == md5($model->id."/".$model->hashcode))
            return $this->render('success',['model'=>$model]);
        else{
            return $this->redirect(['site/error']);
        }
    }
    public function actionCanhan($code){
        $model = Khaibaoyte::findOne(['privatekey'=>$code]);
        if(is_null($model)){
            return $this->redirect(['site/error']);
        }

        if($model->privatekey == md5($model->id."/".$model->hashcode))
            return $this->render('canhan',['model'=>$model]);
        else{
            return $this->redirect(['site/error']);
        }
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    /* public function actionLogin()
     {
         if (!Yii::$app->user->isGuest) {
             return $this->goHome();
         }

         $model = new LoginForm();
         if ($model->load(Yii::$app->request->post()) && $model->login()) {
             return $this->goBack();
         } else {
             return $this->render('login', [
                 'model' => $model,
             ]);
         }
     }*/
    public function actionCheckupdate(){
        $model = new UpdateDulieu();
        $secret = "6Lc6HOQUAAAAAAsdfkr5bEUSN1Z9ebp7I6eN31Os";

        $response = null;
        $model->istreem=false;
        $reCaptcha = new \ReCaptcha($secret);

        Yii::$app->language='vi-VN';
        $request = Yii::$app->request;
        $this->pageTitle = "Hệ thống khai báo y tế";
        $this->seoTitle = "Hệ thống khai báo y tế";
        $this->view->title = "Hệ thống khai báo y tế";

        if($request->isGet){

            return $this->render('checkupdate',['model'=>$model]);
        }
        elseif($request->isPost){

            if ($model->load($request->post())) {


                //captcha
                if(!isset($_POST['g-recaptcha-response']) || empty($_POST['g-recaptcha-response'])){
                    Yii::$app->session->setFlash('gcaptcha','Chưa nhập captcha');
                    return $this->render('checkupdate',['model'=>$model]);
                }else{
                    $response = $reCaptcha->verifyResponse(
                        $_SERVER["REMOTE_ADDR"],
                        $_POST["g-recaptcha-response"]
                    );
                }
                if (!$response != null && !$response->success) {
                    Yii::$app->session->setFlash('gcaptcha','Captcha không có giá trị hoặc Captcha không thuộc trang web này');
                    return $this->render('checkupdate',['model'=>$model]);
                }
                if(isset($_POST['UpdateDulieu']['istreem'])){
                    if( (int)$_POST['UpdateDulieu']['istreem'] == 0){
                        $model->istreem=false;
                    }else{
                        $model->istreem=true;
                        $model->cmnd="TREEM";
                    }
                }
                //endcaptcha
                $t=$model->validates();

                if($model->validate() && $t==true){
                    if($model->istreem){
                        Yii::$app->session['acceptCMND']=$model->idcheck;
                    }else{
                        Yii::$app->session['acceptCMND']=$model->cmnd;
                    }
                    Yii::$app->session['acceptIPAdress']=\func::get_client_ip();
                    return $this->redirect(['site/update']);
                }else{
                   if($model->istreem){
                       $model->errorT="<div class='alert alert-danger'>"."Tên trẻ em hoặc mã hộ gia đình hoặc họ tên sai/ không tìm thấy"."</div>";
                   }else{
                       $model->errorT="<div class='alert alert-danger'>"."Số CMND hoặc mã hộ gia đình hoặc họ tên sai/ không tìm thấy"."</div>";
                   }
                    return $this->render('checkupdate',['model'=>$model]);
                }
            }else{
                return $this->render('checkupdate',['model'=>$model]);
            }
        }
        return $this->render('checkupdate',['model'=>$model]);
    }
    public function actionUpdate(){

        if(!isset(Yii::$app->session['acceptCMND']) ){
            return $this->redirect(['site/index']);
        }else{
            if(Yii::$app->session['acceptIPAdress']!=\func::get_client_ip()){
                return $this->redirect(['site/index']);
            }

            $secret = "6Lc6HOQUAAAAAAsdfkr5bEUSN1Z9ebp7I6eN31Os";

            $response = null;

            $reCaptcha = new \ReCaptcha($secret);

            Yii::$app->language='vi-VN';
            $request = Yii::$app->request;
            $this->pageTitle = "Hệ thống khai báo y tế";
            $this->seoTitle = "Hệ thống khai báo y tế";
            $this->view->title = "Hệ thống khai báo y tế";
            $model = Dulieuhososuckhoe::findOne(['socmnd'=>Yii::$app->session['acceptCMND']]);

           if(!is_null($model)){
               $cmnd = $model->socmnd;
               $mmahogiadinh = $model->mahogiadinh;
               $ten = $model->hovaten;
               if($request->isGet){
                   return $this->render('update',['model'=>$model]);
               }
               elseif($request->isPost){

                   if ($model->load($request->post())) {

                       //json encode vacxin
                       if(isset($_POST['vacxin'])){
                           $model->tiemchungcobantreem = Json::encode($_POST['vacxin']);
                       }
                       if(isset($_POST['vacxinngoai'])){
                           $model->tiemchungngoaichuongtrinhtcmr = Json::encode($_POST['vacxinngoai']);
                       }
                       if(isset($_POST['vacxinuonvan'])){
                           $model->tiemchungvxuonvan = Json::encode($_POST['vacxinuonvan']);
                       }
                       //end json encode

                       //captcha
                       if(!isset($_POST['g-recaptcha-response']) || empty($_POST['g-recaptcha-response'])){
                           Yii::$app->session->setFlash('gcaptcha','Chưa nhập captcha');
                           return $this->render('update',['model'=>$model]);
                       }else{
                           $response = $reCaptcha->verifyResponse(
                               $_SERVER["REMOTE_ADDR"],
                               $_POST["g-recaptcha-response"]
                           );
                       }
                       if (!$response != null && !$response->success) {
                           Yii::$app->session->setFlash('gcaptcha','Captcha không có giá trị hoặc Captcha không thuộc trang web này');
                           return $this->render('update',['model'=>$model]);
                       }
                       //endcaptcha

                       if($model->save()){
                           $model->socmnd=$cmnd;
                           $model->mahogiadinh=$mmahogiadinh;
                           $model->hovaten=$ten    ;
                           return $this->redirect(['site/success']);
                       }else{

                           return $this->render('update',['model'=>$model]);
                       }
                   }else{
                       return $this->render('update',['model'=>$model]);
                   }
               }
           }
           else{
               echo "Không tìm thấy dữ liệu tương ứng, liên hệ quản trị viên";
           }
        }
    }
    public function actionDangnhap()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        else{
            $model = new LoginForm();
            $model->username = $_POST['username'];
            $model->password = $_POST['password'];

            if($model->isBlocked()){
                return 'Your account is not activated.';
            }

            if ($model->login()) {
                return $this->goBack();
            } else {
                return 'Invalid username or password.';
            }
        }

    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionCatlist($id, $path){
        $cat = Catproduct::find()->where(['id'=>$id,'url'=>$path])->one();
        if(!is_null($cat)){
            $subcat = Catproduct::getAllSubCat($id);
            if(count($subcat)==1 && $subcat[0]->id == $id){
                $type = "subcat";
                $data= Product::find()->where(['cat_product_id'=>$id,'active'=>1])->orderBy('ord ASC')->all();
            }else{
                $type="root";
                $subcat = Catproduct::find()->where(['parent'=>$id])->orderBy('ord asc')->all();
                $data=[];
                foreach ($subcat as $subcats){
                    $data[]=[
                        'subcat'=>$subcats,
                        'product'=>Product::find()->where(['cat_product_id'=>$subcats->id,'active'=>1])->limit(8)->orderBy('hot DESC')->addOrderBy('ord ASC')->all()
                    ];
                }

            }
            return $this->render('product/catlist',['title'=>$cat->name,'data'=>$data,'type'=>$type]);
        }
        else
            return $this->redirect(['site/error']);
    }

    public function actionProduct($id, $path){
        $product = Product::findOne(['id'=>$id,'url'=>$path,'active'=>1]);
        if(!is_null($product)){
            if(!is_null($product->seo_title)|| $product->seo_title!="")
                $this->seoTitle=$product->seo_title;
            else
                $this->seoTitle=$product->name;

            if(!is_null($product->seo_desc)|| $product->seo_desc!="")
                $this->description=$product->seo_desc;
            else
                $this->description="Chỉ với ".number_format($product->sale,0,'','.')."đ Quý khách sẽ có ".$product->code." tốc độ cao với giá thành cạnh tranh
                và nhiều ưu đãi hấp dẫn.";

            $breadcrumb = Catproduct::findOne(['id'=>$product->cat_product_id]);
            $anhsanpham = Anhsanpham::findOne(['product_id'=>$id]);
            if(!is_null($anhsanpham) && is_file(Yii::getAlias('@root').$anhsanpham->image))
                $this->og_image=(isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]".$anhsanpham->image;
            else
                $this->og_image=(isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]".Yii::$app->urlManager->baseUrl.Configure::getConfig()['contact_logo'];
            return $this->render('product/product',['data'=>$product,'anhsanpham'=>$anhsanpham,'breadcrumb'=>$breadcrumb]);
        }else
            return $this->redirect(['site/index']);
    }

    public function actionContact(){
        return $this->render('contact');
    }

    public function actionNews($catname, $url, $id){


        $new = News::find()->where('url=:url and id=:id and active=1',[':url'=>$url,':id'=>$id])->one();
        $catnew = Catnew::find()->where(['url'=>$catname])->one();
        /** @var $new News */
        $this->navbar .= '<li><i class="fa fa-angle-right"></i></li><li><a href="'.Yii::$app->urlManager->createUrl(['site/listnews','id'=>$new->cat_new_id,'catname'=>\func::taoduongdan($new->catNew->name)]).'">'.$new->catNew->name.'</a></li><li><i class="fa fa-angle-right"></i></li><li><a href="javascript:void(0)">'.$new->title.'</a></li>';
        News::updateAll(['luotxem'=>$new->luotxem+rand(1,100)],['id'=>$new->id]);
        $catproduct = Catproduct::find()->all();
        $recentpost = News::find()->orderBy('id desc')->limit(Configure::getConfig()['news_lastest'])->all();
        $related = News::find()->where("cat_new_id=:id",[':id'=>$new->cat_new_id])->orderBy('id desc')->limit(5)->all();
        if(!is_null($new)){
            if(is_null($new->seo_title) || $new->seo_title==""){
                $this->og_title = $new->title;
                $this->seoTitle = $new->title;
            }
            else{
                $this->seoTitle=$new->seo_title;
                $this->og_title = $new->seo_title;
            }
            if(is_null($new->seo_desc) || $new->seo_desc=="" ){
                $this->description = $new->brief;
                $this->og_description = $new->brief;
            }
            else {
                $this->description = $new->seo_desc;
                $this->og_description = $new->seo_desc;
            }

            $this->keyword=$new->seo_keyword;
            $tin = News::find()->orderBy('hot DESC')->limit(3)->all();
            $goi = Product::find()->where('name like :name',[':name'=>"%4G%"])->orderBy('hot DESC')->limit(3)->all();
            return $this->render('news/index',['data'=>$new,'news'=>$recentpost,'product'=>$catproduct,'related'=>$related,'tin'=>$tin,'goi'=>$goi]);
        }else
            return $this->redirect(['site/error']);
    }

    public function actionListnews($catname, $id){
        $catnew = Catnew::find()->where('url=:url and id=:id and active=1',[':url'=>$catname,':id'=>$id])->one();
        /** @var $catnew Catnew */

        if(!is_null($catnew)){
            $this->navbar .= '<li><i class="fa fa-angle-right"></i></li><li><a href="javascript:void(0)">'.$catnew->name.'</a></li>';

            $catproduct = Catproduct::find()->all();
            $listnew = News::find()->where('cat_new_id=:id and active=1',[':id'=>$catnew->id])->orderBy('id desc')->all();
            $recentpost = News::find()->orderBy('id desc')->limit(Configure::getConfig()['news_lastest'])->all();
            $goi = Product::find()->where('name like :name',[':name'=>"%4G%"])->orderBy('hot DESC')->limit(3)->all();
            return $this->render("news/listnew",['news'=>$recentpost,'goi'=>$goi,'product'=>$catproduct,'data'=>$listnew,'cat'=>$catnew->name]);
        }else
            return $this->redirect(['site/error']);
    }

    public function actionPage($title,$id){

        $page = Page::findOne($id);
        $this->navbar .= '<li><i class="fa fa-angle-right"></i></li><li><a href="javascript:void(0)">'.$page->title.'</a></li>';
        if(!is_null($page)){
            if($page->seo_title=="" || is_null($page->seo_title)){
                $this->og_title = $page->title;
                $this->seoTitle = $page->title;
            }
            else{
                $this->seoTitle=$page->seo_title;
                $this->og_title = $page->seo_title;
            }
            $this->description = $page->seo_desc;
            $this->og_description = $page->seo_desc;

            $this->keyword=$page->seo_keyword;


            $tin = News::find()->orderBy('hot DESC')->limit(3)->all();
            $goi = Product::find()->where('name like :name',[':name'=>"%4G%"])->orderBy('hot DESC')->limit(3)->all();
            return $this->render('page',['data'=>$page,'tin'=>$tin,'goi'=>$goi]);
        }else
            return $this->redirect(['site/error']);
    }

    public function actionDienthoai(){
        $dienthoai = Dienthoai::find()->orderBy('hang asc')->all();
        $group =\common\models\Groupdienthoai::find()->all();
        $datagr=[];
        foreach ($group as  $value){
            $datagr[$value->hang]= $value->tong;
        }
        return $this->render('dienthoai',['dienthoai'=>$dienthoai,'datagr'=>$datagr]);
    }

    public function actionShopone(){
        return $this->renderPartial('shopone');
    }

    public function actionAlbum($id,$name){
        $album = Album::findOne(['id'=>$id]);
        $this->navbar .= '<li><i class="fa fa-angle-right"></i></li><li><a href="'.Yii::$app->urlManager->createUrl(['site/listalbum']).'">Album</a></li><li><i class="fa fa-angle-right"></i></li><li><a href="javascript:void(0)">'.$album->name_vi.'</a></li>';
        $anh = Picture::findAll(['album_id'=>$id]);
        return $this->render('album',['album'=>$album,'data'=>$anh]);
    }

    public function actionListalbum(){
        $album = Album::find()->all();
        $this->navbar .= '<li><i class="fa fa-angle-right"></i></li><li><a href="'.Yii::$app->urlManager->createUrl(['site/listalbum']).'">Album</a></li>';
        return $this->render('listalbum',['data'=>$album]);
    }

    public function actionListvanban(){
        $vbhc = Congvanhanhchinh::find()->all();
        $this->navbar .= '<li><i class="fa fa-angle-right"></i></li><li><a href="'.Yii::$app->urlManager->createUrl(['site/listvanban']).'">Hồ sơ sức khỏe hành chính</a></li>';
        return $this->render('listvanban',['data'=>$vbhc]);
    }
    public function actionChecklichsu(){
        return $this->render('checklichsu');
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

}
