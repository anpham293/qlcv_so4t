<?php

namespace backend\controllers;

use common\models\Duan;
use Yii;
use common\models\Thongsoduanvalue;
use common\models\search\ThongsoduanvalueSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * ThongsoduanvalueController implements the CRUD actions for Thongsoduanvalue model.
 */
class ThongsoduanvalueController extends Controller
{
    /**
     * @inheritdoc
     */


    /**
     * Lists all Thongsoduanvalue models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new ThongsoduanvalueSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Thongsoduanvalue model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Thongsoduanvalue #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=>Html::a('Close',['duan/viewthongso','id'=>$model->duanid],['class'=>'btn btn-default','role'=>'modal-remote']).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new Thongsoduanvalue model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $request = Yii::$app->request;
        $model = new Thongsoduanvalue();  
        $model->duanid=$id;
        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create new Thongsoduanvalue",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::a('Close',['duan/viewthongso','id'=>$model->duanid],['class'=>'btn btn-default','role'=>'modal-remote']).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) && $model->save()){
                if(count(Thongsoduanvalue::findAll(['thongsoid'=>$model->thongsoid,'duanid'=>$model->duanid]))>1){
                    $model->delete();
                    return [
                        'forceReload'=>'#crud-datatable-pjax',
                        'title'=> "Thêm thông số",
                        'content'=>$this->renderPartial("//duan/viewthongso",[
                            'model' => Duan::findOne($id),
                            'loi'=>'<p class="alert alert-danger">Thông số đã được thêm vào Công việc trước đó rồi</p>'
                        ]),
                        'footer'=>  Html::a('Close',['duan/viewthongso','id'=>$model->duanid],['class'=>'btn btn-default','role'=>'modal-remote']).
                            Html::a('Create More',['create','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])

                    ];
                }
                $model->value=trim($model->value);
                if($model->value==""){
                    $model->value="0";
                }
                $model->save();
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Thêm thông số",
                    'content'=>$this->renderPartial("//duan/viewthongso",[
                        'model' => Duan::findOne($id),
                    ]),
                    'footer'=>  Html::a('Close',['duan/viewthongso','id'=>$model->duanid],['class'=>'btn btn-default','role'=>'modal-remote']).
                            Html::a('Create More',['create','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{           
                return [
                    'title'=> "Create new Thongsoduanvalue",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::a('Close',['duan/viewthongso','id'=>$model->duanid],['class'=>'btn btn-default','role'=>'modal-remote']).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
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
     * Updates an existing Thongsoduanvalue model.
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
                    'title'=> "Update Thongsoduanvalue #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::a('Close',['duan/viewthongso','id'=>$model->duanid],['class'=>'btn btn-default','role'=>'modal-remote']).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                $model->value=trim($model->value);
                if($model->value==""){
                    $model->value="0";
                }
                $model->save();
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Thông số #".$id,
                    'content'=>$this->renderAjax('//duan/viewthongso', [
                        'model' => Duan::findOne($model->duanid),
                    ]),
                    'footer'=> Html::a('Close',['duan/viewthongso','id'=>$model->duanid],['class'=>'btn btn-default','role'=>'modal-remote']).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update Thongsoduanvalue #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> HHtml::a('Close',['duan/viewthongso','id'=>$model->duanid],['class'=>'btn btn-default','role'=>'modal-remote']).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
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
     * Delete an existing Thongsoduanvalue model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $model=$this->findModel($id);
        $duanid=$model->duanid;
        $model->delete();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'forceReload'=>'#crud-datatable-pjax',
                'title'=> "Thông số #".$id,
                'content'=>$this->renderAjax('//duan/viewthongso', [
                    'model' => Duan::findOne($duanid),
                ]),
                'footer'=> Html::a('Close',['duan/viewthongso','id'=>$model->duanid],['class'=>'btn btn-default','role'=>'modal-remote']).
                    Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
            ];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }


    }

     /**
     * Delete multiple existing Thongsoduanvalue model.
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
     * Finds the Thongsoduanvalue model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Thongsoduanvalue the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Thongsoduanvalue::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
