<?php

namespace backend\controllers;

use backend\models\Khokhan;
use common\models\Admin;
use common\models\Baocaocongviec;
use common\models\Code;
use common\models\Congviec;
use common\models\Congviecloaiduan;
use common\models\Khaibaoyte;
use common\models\Lo;
use common\models\Loaiduan;
use common\models\Mauxetnghiemvitri;
use common\models\Notification;
use common\models\Phongban;
use common\models\search\CongviecSearch;
use common\models\Vitrilo;
use Yii;
use common\models\Duan;
use common\models\search\DuannSearch;
use yii\base\BaseObject;
use yii\data\ActiveDataProvider;
use yii\db\Expression;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\web\UploadedFile;

/**
 * DuanController implements the CRUD actions for Duan model.
 */
class DuanController extends Controller
{
    /**
     * @inheritdoc
     */


    /**
     * Lists all Duan models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new DuannSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Duan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Cong viec #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }
    public function actionDetails(){
        $id = $_POST['expandRowKey'];
        $model = Congviec::findOne($id);
        if(!is_null($model))
        Notification::UpdateAll(["isseen"=>true],['reciever'=>Yii::$app->user->id,'isseen'=>false,'url'=>"/admin/duan/detail?id=".$model->duan_id."&congviecid=".$id]);

        return $this->renderPartial('_expand-row-details',['model'=>$model]);
    }
    public function actionViewthongso($id)
    {
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            $model = Duan::findOne($id);
            return [
                    'title'=> "Thông số Công việc #".$id,
                    'content'=>$this->renderAjax('viewthongso', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                        (($model->checkIsDuAnGranted())?Html::a('Edit',['thongsoduanvalue/create','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote']):"")
                ];
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new Duan model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Duan();
        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Thêm mới công việc",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                        'ids'=>isset($_GET['ids'])?$_GET['ids']:""
                    ]),
                    'footer'=> Html::button('Đóng',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Lưu',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) && $model->save()){
                $model->nguoitao=Yii::$app->user->id;
                $files = UploadedFile::getInstancesByName('fileinp');
                if(!empty($files)){
                    $filelist = [];
                    foreach ($files as $file){
                        if (!is_null($file)) {
                            $filename = '/congvan/' . \func::taoduongdan(time() . "-" . $file->name);
                            $filelist[]=$filename;
                            $path = dirname(dirname(__DIR__)) . $filename;
                            $file->saveAs($path);
                        }
                    }
                    $model->congvan = Json::encode($filelist);
                }

                if(isset($_POST['listphongban'])){
                    $model->truongphongphutrach=Json::encode($_POST['listphongban']);
                }
                if(isset($_POST['listphutrach'])){
                    $model->nguoiphutrach=Json::encode($_POST['listphutrach']);
                }
                if(isset($_POST['nhanvieninput'])){
                    $listnguoinhanviecchinh = [];
                    $listnguoinhanviecphoihop = [];
                    foreach ($_POST['nhanvieninput'] as $index => $value){
                        if($value=="xulychinh"){
                            $listnguoinhanviecchinh[]=(string)$index;
                               Notification::push(
                                Yii::$app->user->identity->id,
                                $index,
                                Yii::$app->user->identity->ten." đã khởi tạo Công việc <b>".$model->ten."</b> và chỉ định bạn là người xử lý chính!",
                                "cập nhật Công việc",
                                Yii::$app->user->identity->ten,
                                Yii::$app->urlManager->createUrl(['duan/detail','id'=>$model->id])
                            );
                        }else if($value=="phoihop"){
                            $listnguoinhanviecphoihop[]=(string)$index;
                             Notification::push(
                                Yii::$app->user->identity->id,
                                $index,
                                Yii::$app->user->identity->ten." đã khởi tạo Công việc <b>".$model->ten."</b> và chỉ định bạn là người phối hợp xử lý!",
                                "cập nhật Công việc",
                                Yii::$app->user->identity->ten,
                                Yii::$app->urlManager->createUrl(['duan/detail','id'=>$model->id])
                            );
                        }
                    }
                    $model->nguoinhanviec=Json::encode($listnguoinhanviecchinh);
                    $model->nguoinhanviecchitiet=Json::encode($listnguoinhanviecphoihop);
                }

                if(!$model->save()){
                    $t=Json::encode($model->errors);
                    $model->delete();
                    return [
                        'forceReload'=>'#crud-datatable-pjax, #crud-datatable2-pjax, #crud-datatable3-pjax, #crud-datatable4-pjax, #crud-datatable5-pjax',
                        'title'=> "Thêm mới công việc",
                        'content'=>'<span class="text-danger">'.$t.'</span>',
                        'footer'=> Html::button('Đóng',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Tạo thêm mới',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])

                    ];
                }
                if(isset($_POST['listphutrach'])){
                    foreach ($_POST['listphutrach'] as $value){
                        Notification::push(
                            Yii::$app->user->identity->id,
                            $value,
                            Yii::$app->user->identity->ten." đã khởi tạo Công việc <b>".$model->ten."</b> và chỉ định bạn là người phụ trách!",
                            "Tạo Công việc",
                            Yii::$app->user->identity->ten,
                            Yii::$app->urlManager->createUrl(['duan/detail','id'=>$model->id])
                        );
                    }
                }

                return [
                    'forceReload'=>'#crud-datatable-pjax, #crud-datatable2-pjax, #crud-datatable3-pjax, #crud-datatable4-pjax, #crud-datatable5-pjax',
                    'title'=> "Thêm mới công việc",
                    'content'=>'<span class="text-success">Thêm mới thành công!</span>',
                    'footer'=> Html::button('Đóng',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Tạo thêm mới',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{           
                return [
                    'title'=> "Thêm mới công việc",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Đóng',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Lưu',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
       
    }

    /**
     * Updates an existing Duan model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);       

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Cập nhật công việc",
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Đóng',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Lưu',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                $files = UploadedFile::getInstancesByName('fileinp');
                if(!empty($files)){
                    $current=[];
                    if(empty($model->congvan)){
                        $current=[];
                    }
                    else{
                        $current=Json::decode($model->congvan);

                    }
                    foreach ($files as $file){
                        if (!is_null($file)) {
                            $filename = '/congvan/' . \func::taoduongdan(time() . "-" . $file->name);
                            $current[]=$filename;
                            $path = dirname(dirname(__DIR__)) . $filename;
                            $file->saveAs($path);
                        }
                    }
                    $model->congvan = Json::encode($current);
                }
                if(isset($_POST['listphongban'])){
                    $model->truongphongphutrach=Json::encode($_POST['listphongban']);
                }
                if(isset($_POST['listphutrach'])){
                    $model->nguoiphutrach=Json::encode($_POST['listphutrach']);
                }
                if(isset($_POST['nhanvieninput'])){
                    $listnguoinhanviecchinh = [];
                    $listnguoinhanviecphoihop = [];
                    foreach ($_POST['nhanvieninput'] as $index => $value){
                        if($value=="xulychinh"){
                            $listnguoinhanviecchinh[]=(string)$index;
                            Notification::push(
                                Yii::$app->user->identity->id,
                                $index,
                                Yii::$app->user->identity->ten." đã thực hiện chỉnh sửa thông tin Công việc <b>".$model->ten."</b> trong đó bạn là người xử lý chính!",
                                "cập nhật Công việc",
                                Yii::$app->user->identity->ten,
                                Yii::$app->urlManager->createUrl(['duan/detail','id'=>$model->id])
                            );
                        }else if($value=="phoihop"){
                            $listnguoinhanviecphoihop[]=(string)$index;
                            Notification::push(
                                Yii::$app->user->identity->id,
                                $index,
                                Yii::$app->user->identity->ten." đã thực hiện chỉnh sửa thông tin Công việc <b>".$model->ten."</b> trong đó bạn là người phối hợp xử lý!",
                                "cập nhật Công việc",
                                Yii::$app->user->identity->ten,
                                Yii::$app->urlManager->createUrl(['duan/detail','id'=>$model->id])
                            );
                        }
                    }
                    $model->nguoinhanviec=Json::encode($listnguoinhanviecchinh);
                    $model->nguoinhanviecchitiet=Json::encode($listnguoinhanviecphoihop);
                }

                $model->update();
                if(isset($_POST['listphutrach'])) {
                    foreach ($_POST['listphutrach'] as $value) {
                        Notification::push(
                            Yii::$app->user->identity->id,
                            $value,
                            Yii::$app->user->identity->ten . " đã khởi tạo Công việc <b>" . $model->ten . "</b> và chỉ định bạn là người phụ trách!",
                            "Tạo Công việc",
                            Yii::$app->user->identity->ten,
                            Yii::$app->urlManager->createUrl(['duan/detail', 'id' => $model->id])
                        );
                    }
                }
                Notification::push(
                    Yii::$app->user->identity->id,
                    $model->nguoitao,
                    Yii::$app->user->identity->ten." đã thực hiện chỉnh sửa thông tin Công việc <b>".$model->ten."</b> trong đó bạn là người phụ trách!",
                    "cập nhật Công việc",
                    Yii::$app->user->identity->ten,
                    Yii::$app->urlManager->createUrl(['duan/detail','id'=>$model->id])
                );
                return [
                    'forceReload'=>'#crud-datatable-pjax, #crud-datatable2-pjax, #crud-datatable3-pjax, #crud-datatable4-pjax, #crud-datatable5-pjax',
                    'title'=> "Cong viec #".$id,
                    'content'=>"Cập nhật thành công",
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Cập nhật công việc",
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Đóng',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Lưu',['class'=>'btn btn-primary','type'=>"submit"])
                ];        
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return "Cập nhật thành công";
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }
    public function actionUpdatetruongphong($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Cập nhật công việc",
                    'content'=>$this->renderAjax('updatetruongphong', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Đóng',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Lưu',['class'=>'btn btn-primary','type'=>"submit"])
                ];
            }else if($model->load($request->post()) && $model->save()){

                $truongphong = Admin::findOne(['phongban_id'=>$model->truongphongphutrach,'chucvu_id'=>4]);
                if(is_null($truongphong)){
                    return [
                        'forceReload'=>'#crud-datatable-pjax, #crud-datatable2-pjax, #crud-datatable3-pjax, #crud-datatable4-pjax, #crud-datatable5-pjax',
                        'title'=> "Cong viec #".$id,
                        'content'=>"<p class='alert alert-success'>Thất bại, Phòng ban này chưa có trưởng phòng, không thể giao</p>",
                        'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"])
                    ];
                }


                $congvieclist = Congviecloaiduan::find()->where(['loaiduanid'=>$model->loaiduan_id])->all();
                foreach ($congvieclist as $congviec){/** @var Congviecloaiduan $congviec */
                   $congviecisset = Congviec::findOne(['duan_id'=>$model->id,'tencongviec'=>$congviec->congviec]);

                   if(!is_null($congviecisset)){
                       $congviecisset->nguoigiao=$truongphong->id;
                       $congviecisset->save();
                   }else{
                       $congviecs = new Congviec();
                       $congviecs->tencongviec=$congviec->congviec;
                       $congviecs->motacongviec=$congviec->mota;
                       $congviecs->nguoigiao=$truongphong->id;
                       $congviecs->ngaygiao=date_format(date_create(),"Y-m-d");
                       $congviecs->ngayhoanthanh=date_format(date_create(),"Y-m-d");
                       $congviecs->nguoinhan=-1;
                       $congviecs->status=0;
                       $congviecs->duan_id=$model->id;
                       $congviecs->save();
                   }
                }
                Notification::push(
                     Yii::$app->user->identity->id,
                    $model->nguoiphutrach,
                    Yii::$app->user->identity->ten." đã thực hiện chỉ định bạn là <b>Trưởng phòng phụ trách</b> Công việc <b>".$model->ten."</b>",
                    "Gán trưởng phòng",
                     Yii::$app->user->identity->ten,
                    Yii::$app->urlManager->createUrl(['duan/detail','id'=>$model->id])
                );
                return [
                    'forceReload'=>'#crud-datatable-pjax, #crud-datatable2-pjax, #crud-datatable3-pjax, #crud-datatable4-pjax, #crud-datatable5-pjax',
                    'title'=> "Cong viec #".$id,
                    'content'=>"<p class='alert alert-success'>Thành công</p>",
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"])
                ];
            }else{
                 return [
                    'title'=> "Cập nhật công việc",
                    'content'=>$this->renderAjax('updatetruongphong', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Đóng',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Lưu',['class'=>'btn btn-primary','type'=>"submit"])
                ];
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('updatetruongphong', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing Duan model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);

        if(!empty($model->congvan)){
            $current=Json::decode($model->congvan);
            if(is_array($current)){
                foreach ($current as $file){
                    if(is_file(dirname(dirname(__DIR__)).$file )){
                        unlink(dirname(dirname(__DIR__)).$file);
                    }
                }
            }
        }
        foreach (Congviec::findAll(['duan_id'=>$model->id]) as $data){
            if(!empty($data->danhgiacongviec)){
                $current2=Json::decode($data->danhgiacongviec);
                if(is_array($current2)){
                    foreach ($current2 as $file){
                        if(is_file(dirname(dirname(__DIR__)).$file )){
                            unlink(dirname(dirname(__DIR__)).$file);
                        }
                    }
                }
            }
            $data->delete();
        }
        $this->findModel($id)->delete();
        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }


    }

     /**
     * Delete multiple existing Duan model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkdelete()
    {        
        $request = Yii::$app->request;
        $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        foreach ( $pks as $pk ) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
       
    }

    /**
     * Finds the Duan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Duan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Duan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionDetail($id){
        $duan = Duan::findOne($id);

        if((is_null($duan)||!$duan->checkIsDuAnGranted())&&!Yii::$app->user->can('duan/xemtatca')){
            return $this->redirect(['site/quantri']);
        }
        Notification::UpdateAll(["isseen"=>true],['reciever'=>Yii::$app->user->id,'isseen'=>false,'url'=>"/admin/duan/detail?id=".$duan->id]);
        $searchModel = new CongviecSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$duan->id);



        return $this->render('detail',['model'=>$duan,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            ]);
    }
    public function actionTaitatcabaocao($id){

    }
    public function actionTaibaocao($id)
    {

        $duan = Duan::findOne($id);
        if(is_null($duan)){
            return false;
        }
        $congviecs = Congviec::findAll(['duan_id'=>$duan->id]);

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
        $objPHPExcel->getActiveSheet()->setTitle('BC - '. \func::getTimeNowForFilename());

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
            'borders' => array(
                'allborders' => array(
                    'style' => \PHPExcel_Style_Border::BORDER_THIN
                )
            )

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
        $objPHPExcel->getDefaultStyle()->applyFromArray($default);

        $sheet->getStyle(1)->applyFromArray($header);
        $col=0;
        foreach ($duan->attributes as $index=>$value){


                if($index=="nguoitao"||$index=="nguoiphutrach"){
                    $sheet->setCellValueByColumnAndRow($col, 1, $duan->attributeLabels()[$index]);
                    $sheet->setCellValueByColumnAndRow($col, 2, Admin::findOne($value)->ten);
                    $col++;
                }else if($index=='status'){
                    $sheet->setCellValueByColumnAndRow($col, 1, $duan->attributeLabels()[$index]);
                    $sheet->setCellValueByColumnAndRow($col, 2, $duan->getStatusTextNoFormat());
                    $col++;
                }
                else if($index=="loaiduan_id"){
                    $sheet->setCellValueByColumnAndRow($col, 1, $duan->attributeLabels()[$index]);
                    $sheet->setCellValueByColumnAndRow($col, 2, Loaiduan::findOne($value)->tenloai);
                    $col++;
                }else if($index=="truongphongphutrach"){
                    $phongban = Phongban::findOne($value);
                    $sheet->setCellValueByColumnAndRow($col, 1, $duan->attributeLabels()[$index]);
                    $sheet->setCellValueByColumnAndRow($col, 2, is_null($phongban)?"Chưa giao":$phongban->ten);
                    $col++;
                }
                else if($index!="id"){
                    $sheet->setCellValueByColumnAndRow($col, 1, $duan->attributeLabels()[$index]);
                    $sheet->setCellValueByColumnAndRow($col, 2, $value);
                    $col++;
                }
        }
        $row=3;
        foreach ($congviecs as $congviec){
            $col=1;
            $sheet->getStyle($row)->applyFromArray($header);

            foreach ($congviec->attributes as $index=>$value){

                if($index=="nguoigiao"||$index=="nguoinhan"){
                    $t=Phongban::findOne($value);
                    $sheet->setCellValueByColumnAndRow($col, $row+1,($value==-1 || is_null($t))?"Chưa giao":$t->ten);
                    $col++;
                }else if($index=='status'){
                    $sheet->setCellValueByColumnAndRow($col, $row+1, $congviec->getStatusTextNoFormat());
                    $col++;
                }
                else if($index!="duan_id" && $index!="id"){
                    $sheet->setCellValueByColumnAndRow($col, $row, $congviec->attributeLabels()[$index]);
                    $sheet->setCellValueByColumnAndRow($col, $row+1, $value);
                    $col++;
                }
            }
            $row+=2;
            $col=2;
            $sheet->getStyle($row)->applyFromArray($header);
            $sheet->setCellValueByColumnAndRow($col, $row, "Báo cáo");
            $sheet->setCellValueByColumnAndRow($col+1, $row, "Ngày báo cáo");
            $sheet->setCellValueByColumnAndRow($col+2, $row, "Người báo cáo");
            $sheet->setCellValueByColumnAndRow($col+3, $row, "Nội dung công việc");
            $sheet->setCellValueByColumnAndRow($col+4, $row, "Vướng mắc trong công việc");
            $sheet->setCellValueByColumnAndRow($col+5, $row, "Đánh giá báo cáo");
            $sheet->setCellValueByColumnAndRow($col+6, $row, "Thời gian đánh giá");
            $row++;
            foreach (Baocaocongviec::findAll(['congviec_id'=>$congviec->id]) as $value){
                $sheet->setCellValueByColumnAndRow($col+1, $row, $value->ngaybaocao);
                $sheet->setCellValueByColumnAndRow($col+2, $row, Admin::findOne($value->nguoibaocao)->ten);
                $sheet->setCellValueByColumnAndRow($col+3, $row, $value->noidungbaocao);
                $sheet->setCellValueByColumnAndRow($col+4, $row, $value->ketquadatduoc);
                $sheet->setCellValueByColumnAndRow($col+5, $row, $value->danhgaibaocao);
                $sheet->setCellValueByColumnAndRow($col+6, $row, $value->thoigiandanhgia);
            }
            $row+=2;
        }

        for ($i = 0; $i < 23; $i++) {
            $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($i)->setAutoSize(true);
        }
        \PHPExcel_Shared_Font::setAutoSizeMethod(\PHPExcel_Shared_Font::AUTOSIZE_METHOD_EXACT);



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
    public function actionCongviecdetails(){
        $id = $_POST['expandRowKey'];
        $model = Congviec::findOne($id);
        return $this->renderPartial('_expand-row-details.php',['model'=>$model]);
    }
    public function actionTaichinh(){
        $searchModel = new DuannSearch();
        $searchModel->loaiduan_id=5;
        $searchModel->taichinh=1;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('taichinh', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionXemtatca(){

    }
    public function actionDeletefile($id,$file){
        $duan = Duan::findOne($id);
        $files = Json::decode($duan->congvan);
        if (($key = array_search($file, $files)) !== false) {
            if(is_file(dirname(dirname(__DIR__)).$file )){
                unlink(dirname(dirname(__DIR__)).$file);
            }
            unset($files[$key]);
        }
        $duan->congvan=Json::encode($files);
        $duan->update();
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax, #crud-datatable2-pjax, #crud-datatable3-pjax, #crud-datatable4-pjax, #crud-datatable5-pjax'];
    }
    public function actionKhokhan($id){
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title'=> "Cong viec #".$id,
                'content'=>$this->renderAjax('view', [
                    'model' => $this->findModel($id),
                ]),
                'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                    Html::a('Thêm mới',['themkhokhan','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
            ];
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }
    public function actionThemkhokhan($id){
        $request = Yii::$app->request;
        $model = new Khokhan();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Thêm mới khó khăn vướng mắc",
                    'content'=>$this->renderAjax('createkhokhan', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::a('Đóng',['khokhan','id'=>$id],['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                        Html::button('Lưu',['class'=>'btn btn-primary','type'=>"submit"])

                ];
            }else if($model->load($request->post())){
                $duan = Duan::findOne($id);
                $temp = Json::decode($duan->khokhanvuongmac);
                if(is_array($temp)){
                    $temp[]=[
                        "noidung"=>$model->noidung,
                        "nguoiviet"=>Yii::$app->user->identity->id,
                        "thoigian"=>\func::getTimeNow(),
                        'uid'=>new Expression('NOW()')
                    ];
                }else{
                    $temp=[
                        [
                            "noidung"=>$model->noidung,
                            "nguoiviet"=>Yii::$app->user->identity->username,
                            "thoigian"=>\func::getTimeNow(),
                            'uid'=>time()
                        ]
                    ];
                }
                $duan->khokhanvuongmac=Json::encode($temp);
                $duan->update();

                $nguoinhanviec=Json::decode($duan->nguoinhanviec);
                $nguoinhanviecchitiet=Json::decode($duan->nguoinhanviecchitiet);

                if(is_array($nguoinhanviec)){
                    foreach ($nguoinhanviec as $value){
                        Notification::push(
                            Yii::$app->user->identity->id,
                            $value,
                            Yii::$app->user->identity->ten." đã thêm khó khăn vướng mắc thuộc Công việc <b>".$duan->ten."</b>!",
                            "khokhan",
                            Yii::$app->user->identity->ten,
                            Yii::$app->urlManager->createUrl(['duan/detail','id'=>$duan->id])
                        );
                    }
                }
                if(is_array($nguoinhanviecchitiet)){
                    foreach ($nguoinhanviecchitiet as $value){
                        Notification::push(
                            Yii::$app->user->identity->id,
                            $value,
                            Yii::$app->user->identity->ten." đã thêm khó khăn vướng mắc thuộc Công việc <b>".$duan->ten."</b>!",
                            "khokhan",
                            Yii::$app->user->identity->ten,
                            Yii::$app->urlManager->createUrl(['duan/detail','id'=>$duan->id])
                        );
                    }
                }

                Notification::push(
                    Yii::$app->user->identity->id,
                    $duan->nguoiphutrach,
                    Yii::$app->user->identity->ten." đã thêm khó khăn vướng mắc thuộc Công việc <b>".$duan->ten."</b>!",
                    "khokhan",
                    Yii::$app->user->identity->ten,
                    Yii::$app->urlManager->createUrl(['duan/detail','id'=>$duan->id])
                );
                Notification::push(
                    Yii::$app->user->identity->id,
                    $duan->nguoitao,
                    Yii::$app->user->identity->ten." đã thêm khó khăn vướng mắc thuộc Công việc <b>".$duan->ten."</b>!",
                    "khokhan",
                    Yii::$app->user->identity->ten,
                    Yii::$app->urlManager->createUrl(['duan/detail','id'=>$duan->id])
                );
                return [
                    'title'=> "Cong viec #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                        Html::a('Thêm mới',['themkhokhan','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];
            }else{
                return [
                    'title'=> "Thêm mới khó khăn vướng mắc",
                    'content'=>$this->renderAjax('createkhokhan', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::a('Đóng',['khokhan','id'=>$id],['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                        Html::button('Lưu',['class'=>'btn btn-primary','type'=>"submit"])

                ];
            }
        }else{
            /*
            *   Process for non-ajax request
            */
           return false;
        }

    }
}

