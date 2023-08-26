<?php

namespace backend\controllers;

use Yii;
use common\models\Configure;
use common\models\search\Configure as ConfigureSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\web\UploadedFile;

/**
 * ConfigureController implements the CRUD actions for Configure model.
 */
class ConfigureController extends Controller
{
    /**
     * @inheritdoc
     */

    /**
     * Lists all Configure models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionImageconfig(){
        return $this->render('image');
    }
    public function actionLuuconfig(){
        $file = UploadedFile::getInstanceByName('icon');
        $config= Configure::getConfig();
        if(!is_null($file)){
            if($config['favicon']!="" && is_file(Yii::getAlias('@root').$config['favicon']))
                unlink(Yii::getAlias('@root').$config['favicon']);
            $filename= "/images/favicon/".$file->name;
            $path = Yii::getAlias('@root').$filename;
            $file->saveAs($path);
            Configure::updateAll(['value'=>$filename],['name'=>'favicon']);
        }

        $file = UploadedFile::getInstanceByName('logo');
        if(!is_null($file)){
            if($config['contact_logo']!="" && is_file(Yii::getAlias('@root').$config['contact_logo']))
                unlink(Yii::getAlias('@root').$config['contact_logo']);
            $filename= "/images/logo/".$file->name;
            $path = Yii::getAlias('@root').$filename;
            $file->saveAs($path);
            Configure::updateAll(['value'=>$filename],['name'=>'contact_logo']);
        }

        $file = UploadedFile::getInstanceByName('logofooter');
        if(!is_null($file)){
            if($config['contact_logo_footer']!="" && is_file(Yii::getAlias('@root').$config['contact_logo_footer']))
                unlink(Yii::getAlias('@root').$config['contact_logo_footer']);
            $filename= "/images/logo/".$file->name;
            $path = Yii::getAlias('@root').$filename;
            $file->saveAs($path);
            Configure::updateAll(['value'=>$filename],['name'=>'contact_logo_footer']);
        }

        $file = UploadedFile::getInstanceByName('adnew');
        if(!is_null($file)){
            if($config['ad_news']!="" && is_file(Yii::getAlias('@root').$config['ad_news']))
                unlink(Yii::getAlias('@root').$config['ad_news']);
            $filename= "/images/advertisment/".$file->name;
            $path = Yii::getAlias('@root').$filename;
            $file->saveAs($path);
            Configure::updateAll(['value'=>$filename],['name'=>'ad_news']);
        }

        $file = UploadedFile::getInstanceByName('page_banner');
        if(!is_null($file)){
            if($config['page_banner']!="" && is_file(Yii::getAlias('@root').$config['page_banner']))
                unlink(Yii::getAlias('@root').$config['page_banner']);
            $filename= "/images/advertisment/".$file->name;
            $path = Yii::getAlias('@root').$filename;
            $file->saveAs($path);
            Configure::updateAll(['value'=>$filename],['name'=>'page_banner']);
        }

        foreach ($_POST['config'] as $index=> $value){
            Configure::updateAll(['value'=>trim($value)],'name=:name',[':name'=>$index]);
        }
        return 1;
    }
    /**
     * Displays a single Configure model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title'=> "Configure #".$id,
                'content'=>$this->renderAjax('view', [
                    'model' => $this->findModel($id),
                ]),
                'footer'=> Html::button('Đóng',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                    Html::a('Chỉnh sửa',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
            ];
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new Configure model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Configure();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create new Configure",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Đóng',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                        Html::button('Lưu',['class'=>'btn btn-primary','type'=>"submit"])

                ];
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Create new Configure",
                    'content'=>'<span class="text-success">Create Configure success</span>',
                    'footer'=> Html::button('Đóng',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                        Html::a('Thêm mới',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])

                ];
            }else{
                return [
                    'title'=> "Create new Configure",
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
     * Updates an existing Configure model.
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
                    'title'=> "Update Configure #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Đóng',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                        Html::button('Lưu',['class'=>'btn btn-primary','type'=>"submit"])
                ];
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Configure #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Đóng',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                        Html::a('Chỉnh sửa',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];
            }else{
                return [
                    'title'=> "Update Configure #".$id,
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
     * Delete an existing Configure model.
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
     * Delete multiple existing Configure model.
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
     * Finds the Configure model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Configure the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Configure::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
