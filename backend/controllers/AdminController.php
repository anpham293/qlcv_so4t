<?php

namespace backend\controllers;//636F707972696768742050681EA16D204B681EAF6320C26E202D204B6172696F6E2054656368204C696D69746564202D20303331303934303031313236

use common\models\Donvi;
use function GuzzleHttp\Psr7\str;
use Yii;
use common\models\Admin;
use common\models\search\AdminSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\web\UploadedFile;

/**
 * AdminController implements the CRUD actions for Admin model.
 */
class AdminController extends Controller
{
    /**
     * @inheritdoc
     */

    /**
     * Lists all Admin models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AdminSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Admin model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Quản trị",
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Đóng',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Cập nhật',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new Admin model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Admin();  

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Thêm mới quản trị",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Đóng',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Lưu',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Tạo mới Admin",
                    'content'=>'<span class="text-success">Thêm mới thành công!</span>',
                    'footer'=> Html::button('Đóng',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Thêm mới',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{           
                return [
                    'title'=> "Tạo mới Admin",
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
     * Updates an existing Admin model.
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
                    'title'=> "Cập nhật quản trị".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Đóng',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Lưu',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else{

                if(isset($_POST['password'])){
                    if($_POST['password']!=''){
                        $model->password_hash=Yii::$app->security->generatePasswordHash($_POST['password']);
                    }
                }
                $model->ten = $_POST['Admin']['ten'];
                $model->status = $_POST['Admin']['status'];
                $model->phongban_id = $_POST['Admin']['phongban_id'];
                $model->chucvu_id = $_POST['Admin']['chucvu_id'];
                $model->donvi_id = $_POST['Admin']['donvi_id'];


                if( $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Quản trị",
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Đóng',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Cập nhật',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Cập nhật quản trị",
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Đóng',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Lưu',['class'=>'btn btn-primary','type'=>"submit"])
                ];        
            }}
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
     * Delete an existing Admin model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
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
     * Delete multiple existing Admin model.
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
     * Finds the Admin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Admin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Admin::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionUpload(){
        return $this->render('excel');
    }
    public function actionExcel(){
        $file = UploadedFile::getInstanceByName('fileupload');

        if (!is_null($file)) {
            $thongbao = "";
            //upload file excel
            $namefile = \func::khongdau(time() . '-' . $file->name);
            $pathFile = dirname(dirname(__DIR__)) . '/upload/files/' . $namefile;
            $file->saveAs($pathFile);

            // đọc file excel

            $inputFileType = \PHPExcel_IOFactory::identify($pathFile);
            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
            $data = $objReader->load($pathFile)->getSheet(1)->toArray(null, true, true, true);
            $tam = '';
            $qh = '';
            try {
                foreach ($data as $index => $item) {
                    if($index>1){
                        if(!is_null(trim((string)$item['B'])) && trim((string)$item['B'])!=''){
                            $quanhuyen = trim((string)$item['B']);
                            if(!is_null(Donvi::findOne(['name'=>$quanhuyen]))){
                                $qh=$quanhuyen;
                                $user = new Admin();
                                $user->username = strtolower(trim((string)$item['D']));
                                $user->email = trim((string)$item['D'])."@viettel.com.vn";
                                $user->manv = trim((string)$item['D']);
                                $user->sdt = "1";
                                $user->trungtam = $quanhuyen;
                                $user->ten = trim((string)$item['C']);
                                $user->setPassword("123456aA@");
                                $user->status = 10;
                                $user->owner = \Yii::$app->user->identity->getId();
                                $user->generateAuthKey();
                                if ($user->save()) {
                                    $auth = \Yii::$app->authManager;
                                    $role = $auth->getRole("quanhuyen");
                                    $auth->assign($role, $user->id);
                                    $tam=$user->id;
                                }
                            }
                        }else{
                            if(!is_null(trim((string)$item['E'])) && trim((string)$item['E'])!=''){
                                $user = new Admin();
                                $user->username = strtolower(trim((string)$item['F']));
                                $user->email = trim((string)$item['F'])."@viettel.com.vn";
                                $user->manv = trim((string)$item['F']);
                                $user->sdt = "1";
                                $user->trungtam = $qh;
                                $user->ten = trim((string)$item['E']);
                                $user->setPassword("123456aA@");
                                $user->status = 10;
                                $user->owner = $tam;
                                $user->generateAuthKey();
                                if ($user->save()) {
                                    $auth = \Yii::$app->authManager;
                                    $role = $auth->getRole("nhanvien");
                                    $auth->assign($role, $user->id);
                                }
                            }
                        }
                    }
                }
            }catch (\Exception $e){

            }
        }
        return $this->redirect(['index']);
    }
}
