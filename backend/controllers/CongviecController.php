<?php

namespace backend\controllers;

use common\models\Admin;
use common\models\Duan;
use common\models\Lo;
use common\models\Nguoinhanviec;
use common\models\Nguoiphoihop;
use common\models\Notification;
use Yii;
use common\models\Congviec;
use common\models\search\CongviecSearch;
use yii\base\BaseObject;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\web\UploadedFile;

/**
 * CongviecController implements the CRUD actions for Congviec model.
 */
class CongviecController extends Controller
{
    /**
     * @inheritdoc
     */
   

    /**
     * Lists all Congviec models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new CongviecSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Congviec model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Công việc",
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Đóng',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"])

                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new Congviec model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($ids)
    {
        $request = Yii::$app->request;
        $model = new Congviec();
        $model->duan_id=$_GET['ids'];
        $model->nguoigiao=Yii::$app->user->id;
        $model->status=0;
        $model->nguoinhan=-1414;
        if($request->isAjax){
            /*
            *   Process for ajax request
            */

            Yii::$app->response->format = Response::FORMAT_JSON;
            if(!Duan::findOne($_GET['ids'])->checkIsDuAnGranted() && !Yii::$app->user->can('duan/xemtatca')){
                return [
                    'forceReload'=>'#crud-datatable-pjax, #crud-datatable2-pjax, #crud-datatable3-pjax, #crud-datatable4-pjax',
                    'title'=> "Thêm mới chi tiết công việc",
                    'content'=>'<span class="text-danger">Tài khoản của bạn không có trong danh mục chi tiết công việc này</span>',
                    'footer'=> Html::button('Đóng',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"])

                ];
            }

            if($request->isGet){
                return [
                    'title'=> "Thêm mới chi tiết công việc",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Đóng',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Thêm mới',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) && $model->save()){
                Notification::push(
                    Yii::$app->user->identity->id,
                    $model->duan->nguoiphutrach,
                    Yii::$app->user->identity->ten." đã thực hiện thêm chi tiết công việc <b>".$model->tencongviec."</b> chi tiết công việc <b>".$model->duan->ten."</b>",
                    "Tạo chi tiết công việc",
                    Yii::$app->user->identity->ten,
                    Yii::$app->urlManager->createUrl(['duan/detail','id'=>$model->duan_id])
                );
                Notification::push(
                    Yii::$app->user->identity->id,
                    $model->duan->truongphongphutrach,
                    Yii::$app->user->identity->ten." đã thực hiện thêm chi tiết công việc <b>".$model->tencongviec."</b> chi tiết công việc <b>".$model->duan->ten."</b>",
                    "Tạo chi tiết công việc",
                    Yii::$app->user->identity->ten,
                    Yii::$app->urlManager->createUrl(['duan/detail','id'=>$model->duan_id])
                );
                if(isset($_POST['listnguoinhan'])){
                    foreach ($_POST['listnguoinhan'] as $value){
                        $nguoi = new Nguoinhanviec();
                        $nguoi->nguoiduocgan=$value;
                        $nguoi->nguoigan=Yii::$app->user->id;
                        $nguoi->congviecid=$model->id;
                        if(!$nguoi->save()){
                            var_dump($nguoi->errors);
                            exit;
                        }
                        Notification::push(
                            Yii::$app->user->identity->id,
                            $nguoi->nguoiduocgan,
                            Yii::$app->user->identity->ten." đã giao cho bạn chi tiết công việc <b>".$model->tencongviec."</b> thuộc công việc <b>".$model->duan->ten."</b>",
                            "Tạo chi tiết công việc",
                            Yii::$app->user->identity->ten,
                            Yii::$app->urlManager->createUrl(['duan/detail','id'=>$model->duan_id,'congviecid'=>$model->id])
                        );
                    }
                }
                if(isset($_POST['listnguoinhanphoihop'])){
                    foreach ($_POST['listnguoinhanphoihop'] as $value){
                        $nguoi = new Nguoiphoihop();
                        $nguoi->nguoiduocgan=$value;
                        $nguoi->nguoigan=Yii::$app->user->id;
                        $nguoi->congviecid=$model->id;
                        if(!$nguoi->save()){
                            var_dump($nguoi->errors);
                            exit;
                        }
                        Notification::push(
                            Yii::$app->user->identity->id,
                            $nguoi->nguoiduocgan,
                            Yii::$app->user->identity->ten." đã giao cho bạn phối hợp chi tiết công việc <b>".$model->tencongviec."</b> thuộc công việc <b>".$model->duan->ten."</b>",
                            "Tạo chi tiết công việc",
                            Yii::$app->user->identity->ten,
                            Yii::$app->urlManager->createUrl(['duan/detail','id'=>$model->duan_id,'congviecid'=>$model->id])
                        );
                    }
                }
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
                    $model->danhgiacongviec = Json::encode($filelist);
                    $model->save();
                }

                return [
                    'forceReload'=>'#crud-datatable-pjax, #crud-datatable2-pjax, #crud-datatable3-pjax, #crud-datatable4-pjax',
                    'title'=> "Thêm mới chi tiết công việc",
                    'content'=>'<span class="text-success">Thêm mới thành công!</span>',
                    'footer'=> Html::button('Đóng',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Tạo thêm mới',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{
                return [
                    'title'=> "Thêm mới chi tiết công việc",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Đóng',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Thêm mới',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if(!Duan::findOne($_GET['ids'])->checkIsDuAnGranted() && !Yii::$app->user->can('duan/xemtatca')){
                return "Tài khoản của bạn không có trong danh mục chi tiết công việc này";
            }
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
     * Updates an existing Congviec model.
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
                    'title'=> "Cập nhật chi tiết công việc",
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Đóng',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Lưu',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                Notification::push(
                    Yii::$app->user->identity->id,
                    $model->duan->nguoiphutrach,
                    Yii::$app->user->identity->ten." đã thực hiện cập nhật chi tiết công việc <b>".$model->tencongviec."</b> chi tiết công việc <b>".$model->duan->ten."</b>",
                    "Cập nhật chi tiết công việc",
                    Yii::$app->user->identity->ten,
                    Yii::$app->urlManager->createUrl(['duan/detail','id'=>$model->duan_id])
                );
                Notification::push(
                    Yii::$app->user->identity->id,
                    $model->duan->truongphongphutrach,
                    Yii::$app->user->identity->ten." đã thực hiện tcập nhật chi tiết công việc <b>".$model->tencongviec."</b> chi tiết công việc <b>".$model->duan->ten."</b>",
                    "Cập nhật chi tiết công việc",
                    Yii::$app->user->identity->ten,
                    Yii::$app->urlManager->createUrl(['duan/detail','id'=>$model->duan_id])
                );
                $nguoinhanviecs = [];
                if(isset($_POST['listnguoinhan'])){
                    $nguoinhanviecs=Nguoinhanviec::find()->where(['congviecid'=>$model->id])->andWhere(['NOT IN','id',$_POST['listnguoinhan']])->all();
                }
                foreach ($nguoinhanviecs as $value){
                    $value->delete();
                }
                if(isset($_POST['listnguoinhan'])){
                    foreach ($_POST['listnguoinhan'] as $value){
                       if(is_null(Nguoinhanviec::findOne(['nguoiduocgan'=>$value,'congviecid'=>$id]))){
                           $nguoi = new Nguoinhanviec();
                           $nguoi->nguoiduocgan=$value;
                           $nguoi->nguoigan=Yii::$app->user->id;
                           $nguoi->congviecid=$model->id;
                           if(!$nguoi->save()){
                               var_dump($nguoi->errors);
                               exit;
                           }
                           Notification::push(
                               Yii::$app->user->identity->id,
                               $nguoi->nguoiduocgan,
                               Yii::$app->user->identity->ten." đã chỉnh sửa/giao cho bạn chi tiết công việc <b>".$model->tencongviec."</b> thuộc công việc <b>".$model->duan->ten."</b>",
                               "Tạo chi tiết công việc",
                               Yii::$app->user->identity->ten,
                               Yii::$app->urlManager->createUrl(['duan/detail','id'=>$model->duan_id,'congviecid'=>$model->id])
                           );
                       }
                    }
                }
                if(isset($_POST['listnguoinhanphoihop'])){
                    foreach ($_POST['listnguoinhanphoihop'] as $value){
                        $nguoi = new Nguoiphoihop();
                        $nguoi->nguoiduocgan=$value;
                        $nguoi->nguoigan=Yii::$app->user->id;
                        $nguoi->congviecid=$model->id;
                        if(!$nguoi->save()){
                            var_dump($nguoi->errors);
                            exit;
                        }
                        Notification::push(
                            Yii::$app->user->identity->id,
                            $nguoi->nguoiduocgan,
                            Yii::$app->user->identity->ten." đã chỉnh sửa/giao cho bạn phối hợp chi tiết công việc <b>".$model->tencongviec."</b> thuộc công việc <b>".$model->duan->ten."</b>",
                            "Tạo chi tiết công việc",
                            Yii::$app->user->identity->ten,
                            Yii::$app->urlManager->createUrl(['duan/detail','id'=>$model->duan_id,'congviecid'=>$model->id])
                        );
                    }
                }
                $files = UploadedFile::getInstancesByName('fileinp');
                if(!empty($files)){
                    $current=[];
                    if(empty($model->danhgiacongviec)){
                        $current=[];
                    }
                    else{
                        $current=Json::decode($model->danhgiacongviec);

                    }
                    foreach ($files as $file){
                        if (!is_null($file)) {
                            $filename = '/congvan/' . \func::taoduongdan(time() . "-" . $file->name);
                            $current[]=$filename;
                            $path = dirname(dirname(__DIR__)) . $filename;
                            $file->saveAs($path);
                        }
                    }
                    $model->danhgiacongviec = Json::encode($current);
                    $model->save();
                }

                return [
                    'forceReload'=>'#crud-datatable-pjax, #crud-datatable2-pjax, #crud-datatable3-pjax, #crud-datatable4-pjax',
                    'title'=> "Cập nhật chi tiết công việc",
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Đóng',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"])
                ];    
            }else{
                 return [
                    'title'=> "Cập nhật chi tiết công việc",
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
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing Congviec model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $t=$this->findModel($id);
        $t->status=3;
        $t->save();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax, #crud-datatable2-pjax, #crud-datatable3-pjax, #crud-datatable4-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }


    }

     /**
     * Delete multiple existing Congviec model.
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
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax, #crud-datatable2-pjax, #crud-datatable3-pjax, #crud-datatable4-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
       
    }

    /**
     * Finds the Congviec model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Congviec the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Congviec::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionDeletefile($id,$file){
        $duan = Congviec::findOne($id);
        $files = Json::decode($duan->danhgiacongviec);
        if (($key = array_search($file, $files)) !== false) {
            if(is_file(dirname(dirname(__DIR__)).$file )){
                unlink(dirname(dirname(__DIR__)).$file);
            }
            unset($files[$key]);
        }
        $duan->danhgiacongviec=Json::encode($files);
        $duan->update();
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax, #crud-datatable2-pjax, #crud-datatable3-pjax, #crud-datatable4-pjax'];
    }
}
