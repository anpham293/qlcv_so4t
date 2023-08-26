<?php

namespace backend\controllers;

use common\models\Hangmucchiphiduan;
use common\models\Ketoanduan;
use Yii;
use common\models\Thongsoketoan;
use common\models\search\ThongsoketoanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\web\UploadedFile;

/**
 * ThongsoketoanController implements the CRUD actions for Thongsoketoan model.
 */
class ThongsoketoanController extends Controller
{
    /**
     * @inheritdoc
     */


    /**
     * Lists all Thongsoketoan models.
     * @return mixed
     */
    public function actionIndex($ids)
    {
        $ketoan = Ketoanduan::findOne(['duan_id' => $ids,'userid'=>Yii::$app->user->id]);
        if (Yii::$app->user->identity->username == "Superadmin") {
            $searchModel = new ThongsoketoanSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $ids);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            if (is_null($ketoan)) {
                if(Yii::$app->user->can("ketoanduan/update")){
                    $searchModel = new ThongsoketoanSearch();
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $ids);

                    return $this->render('index', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                    ]);
                }
                return $this->redirect(['site/index']);
            }
            $searchModel = new ThongsoketoanSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $ids);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

    }


    /**
     * Displays a single Thongsoketoan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "Chi phí",
                'content' => $this->renderAjax('view', [
                    'model' => $this->findModel($id),
                ]),
                'footer' => Html::button('Đóng', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::a('Chỉnh sửa', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
            ];
        } else {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new Thongsoketoan model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($ids)
    {
        $request = Yii::$app->request;
        $model = new Thongsoketoan();
        $model->duan_id=$ids;
        $model->userid=Yii::$app->user->id;
        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Thêm mới Chi phí",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Dóng', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Lưu', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            } else if ($model->load($request->post()) && $model->save()) {
                $file = UploadedFile::getInstanceByName('fileupload');
                if (!is_null($file)) {
                    $model->congvandinhkem = '/vanban/' . \func::taoduongdan(time() . "-" . $file->name);
                    $path = dirname(dirname(__DIR__)) . $model->congvandinhkem;
                    $file->saveAs($path);
                }else{
                    $model->congvandinhkem="Không có";
                }

                if(isset($_POST['hangmuc'])){
                    foreach ($_POST['hangmuc'] as $index=>$value){
                        $hangmuc = new Hangmucchiphiduan();
                        $hangmuc->thongsoketoan_id=$model->id;
                        $hangmuc->hangmuc_id=$index;
                        $hangmuc->value=$value;
                        $hangmuc->save();
                    }
                }
                $model->update();
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Thêm mới Chi phí",
                    'content' => '<span class="text-success">Thêm thành công</span>',
                    'footer' => Html::button('Đóng', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::a('Tạo thêm mới', ['create','ids'=>$ids], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])

                ];
            } else {
                return [
                    'title' => "Thêm mới Chi phí",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Đóng', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Lưu', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            }
        } else {
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
     * Updates an existing Thongsoketoan model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);
        $congvandinhkem=$model->congvandinhkem;
        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Cập nhật chi phí",
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Đóng', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Lưu', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            } else if ($model->load($request->post()) && $model->save()) {

                $file = UploadedFile::getInstanceByName('fileupload');
                if (!is_null($file)) {
                    if(is_file($congvandinhkem)){
                        unlink(dirname(dirname(__DIR__)) . $$congvandinhkem);
                    }
                    $model->congvandinhkem = '/vanban/' . \func::taoduongdan(time() . "-" . $file->name);
                    $path = dirname(dirname(__DIR__)) . $model->congvandinhkem;
                    $file->saveAs($path);
                }

                if(isset($_POST['hangmuc'])){
                    Hangmucchiphiduan::deleteAll(['thongsoketoan_id'=>$model->id]);
                    foreach ($_POST['hangmuc'] as $index=>$value){
                        $hangmuc = new Hangmucchiphiduan();
                        $hangmuc->thongsoketoan_id=$model->id;
                        $hangmuc->hangmuc_id=$index;
                        $hangmuc->value=$value;
                        $hangmuc->save();
                    }
                }
                $model->update();

                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Chi phí",
                    'content' => $this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Đóng', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::a('Chỉnh sửa', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            } else {
                return [
                    'title' => "Cập nhật chi phí",
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Đóng', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Lưu', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            }
        } else {
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
     * Delete an existing Thongsoketoan model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        } else {
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }


    }

    /**
     * Delete multiple existing Thongsoketoan model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkdelete()
    {
        $request = Yii::$app->request;
        $pks = explode(',', $request->post('pks')); // Array or selected records primary keys
        foreach ($pks as $pk) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        } else {
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }

    }

    /**
     * Finds the Thongsoketoan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Thongsoketoan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Thongsoketoan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
