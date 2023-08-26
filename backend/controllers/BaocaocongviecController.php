<?php

namespace backend\controllers;

use common\models\Admin;
use common\models\Congviec;
use common\models\Log;
use common\models\Nguoiphoihop;
use common\models\Notification;
use common\models\Thongsocongviecvalue;
use common\models\Thongsoduanvalue;
use Yii;
use common\models\Baocaocongviec;
use common\models\search\BaocaocongviecSearch;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\web\UploadedFile;

/**
 * BaocaocongviecController implements the CRUD actions for Baocaocongviec model.
 */
class BaocaocongviecController extends Controller
{
    /**
     * @inheritdoc
     */

    /**
     * Lists all Baocaocongviec models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BaocaocongviecSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Baocaocongviec model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "Đánh giá",
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
     * Creates a new Baocaocongviec model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($ids)
    {
        $request = Yii::$app->request;
        $model = new Baocaocongviec();
        $model->nguoibaocao = Yii::$app->user->id;
        $model->congviec_id = $ids;
        $congviec = Congviec::findOne($ids);
        if (isset($_GET['parent'])) {
            $model->parent = $_GET['parent'];
        }
        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;

            if ($request->isGet) {
                if (!$congviec->checkIsGranted() &&
                    Yii::$app->user->id != $congviec->nguoigiao &&
                    Yii::$app->user->id != $congviec->duan->nguoiphutrach &&
                    Yii::$app->user->identity->username != "Superadmin" &&
                    Yii::$app->user->id != $congviec->duan->nguoitao &&
                    !in_array(Yii::$app->user->id,Json::decode($congviec->duan->nguoinhanviec))&&
                    !in_array(Yii::$app->user->id,Json::decode($congviec->duan->nguoinhanviecchitiet))&&
                    is_null(Nguoiphoihop::findOne(['congviecid'=>$congviec->id,'nguoiduocgan'=>Yii::$app->user->id]))
                ) {
                    return [
                        'title' => "Thêm báo cáo",
                        'content' => "Bạn không được giao việc này, không thể báo cáo",
                        'footer' => Html::button('Đóng', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"])
                    ];
                }
                return [
                    'title' => "Thêm báo cáo",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Đóng', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Thêm mới', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            } else if ($model->load($request->post()) && $model->save()) {
                $model->nguoibaocao = Yii::$app->user->id;
                $model->congviec_id = $ids;
                $file = UploadedFile::getInstanceByName('fileupload');
                if (!is_null($file)) {
                    $model->filedinhkem = '/congvan/' . \func::taoduongdan(time() . "-" . $file->name);
                    $path = dirname(dirname(__DIR__)) . $model->filedinhkem;
                    $file->saveAs($path);
                }

                if (isset($_POST['thongso'])) {
                    foreach ($_POST['thongso'] as $index => $value) {
                        if ((int)$value > 0) {
                            $thongsocongviec = new Thongsocongviecvalue();
                            $thongsocongviec->congviec = $model->id;
                            $thongsocongviec->thongsoid = $index;
                            $thongsocongviec->value = $value;
                            $thongsocongviec->save();

                            $thongsoduan = Thongsoduanvalue::findOne(['thongsoid' => $index, 'duanid' => $model->congviec->duan_id]);
                            if (!is_null($thongsoduan)) {
                                $thongsoduan->dalam = $thongsoduan->dalam + (int)$value;
                                $thongsoduan->save();
                            }
                        }
                    }
                }
                $model->update();
                $array = array_unique([$congviec->duan->nguoiphutrach,$congviec->duan->truongphongphutrach,$congviec->duan->nguoitao]);
                foreach ($array as $value)
                Notification::push(
                    Yii::$app->user->identity->id,
                    $value,
                    Yii::$app->user->identity->ten." đã báo cáo công việc <b>".$congviec->tencongviec."</b> thuộc Công việc <b>".$congviec->duan->ten."</b>",
                    "Báo cáo công việc",
                    Yii::$app->user->identity->ten,
                    Yii::$app->urlManager->createUrl(['duan/detail','id'=>$congviec->duan_id,'congviecid'=>$congviec->id])
                );

                $datareload = Congviec::findOne($ids);
                return [
                    'title' => "Thêm báo cáo",
                    'content' => "<span class='text-success'>Thêm mới thành công!</span><script>$.ajax({ url: '".Yii::$app->urlManager->createUrl(['duan/details'])."', dataType: 'html', type: 'post', data: { expandRowKey: ".$model->congviec_id." }, success: function (result) { $(document).find('#expand".$ids."').html(result); } })</script>",
                    'footer' => Html::button('Đóng', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::a('Tạo thêm mới', ['create'], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])

                ];
            } else {
                return [
                    'title' => "Thêm báo cáo",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Đóng', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Thêm mới', ['class' => 'btn btn-primary', 'type' => "submit"])

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
     * Updates an existing Baocaocongviec model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);
        $congviec = Congviec::findOne($model->congviec_id);
        $oldAttribute = $model->attributes;
        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Cập nhật báo cáo công việc",
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Đóng', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Lưu', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            } else if ($model->load($request->post()) && $model->save()) {

                $file = UploadedFile::getInstanceByName('fileupload');
                if (!is_null($file)) {
                    if (is_file($model->filedinhkem)) {
                        unlink(dirname(dirname(__DIR__)) . $model->filedinhkem);
                    }
                    $model->filedinhkem = '/congvan/' . \func::taoduongdan(time() . "-" . $file->name);
                    $path = dirname(dirname(__DIR__)) . $model->filedinhkem;
                    $file->saveAs($path);
                }
                $thongsolog="";
                if (isset($_POST['thongso'])) {
                    foreach ($_POST['thongso'] as $index => $value) {

                        if ((int)$value >= 0) {
                            $thongsocongviec = Thongsocongviecvalue::findOne(['congviec' => $model->id, 'thongsoid' => $index]);
                            if (!is_null($thongsocongviec)) {
                                $thongsoduan = Thongsoduanvalue::findOne(['thongsoid' => $index, 'duanid' => $model->congviec->duan_id]);
                                if (!is_null($thongsoduan)) {
                                    $thongsoduan->dalam = $thongsoduan->dalam - (int)$thongsocongviec->value;
                                    $thongsoduan->save();
                                }
                                $thongsolog.=". Thông số (".$thongsoduan->thongsoid."), giá trị (".$thongsocongviec->value.")";
                                $thongsocongviec->value = $value;
                                $thongsocongviec->save();

                                if (!is_null($thongsoduan)) {
                                    $thongsoduan->dalam = $thongsoduan->dalam + (int)$value;
                                    $thongsoduan->save();
                                }
                                $thongsolog.="=> giá trị (".$value.")";

                            }
                        }
                    }
                }
                $model->update();
                $log = new Log();
                $log->time=\func::getTimeNow();
                $log->noidung="Cập nhật báo cáo: ".json_encode($oldAttribute).". Dữ liệu mới: ".json_encode($model->attributes).$thongsolog;
                $log->user=Yii::$app->user->identity->username;
                $log->loai='UpdateBaoCao';
                $log->banghi=1;
                $log->save();
                $array = array_unique([$congviec->duan->nguoiphutrach,$congviec->duan->truongphongphutrach,$congviec->duan->nguoitao]);
                foreach ($array as $value)
                Notification::push(
                    Yii::$app->user->identity->id,
                    $value,
                    Yii::$app->user->identity->ten." đã chỉnh sửa báo cáo công việc <b>".$congviec->tencongviec."</b> thuộc Công việc <b>".$congviec->duan->ten."</b>",
                    "Chỉnh sửa Báo cáo công việc",
                    Yii::$app->user->identity->ten,
                    Yii::$app->urlManager->createUrl(['duan/detail','id'=>$congviec->duan_id,'congviecid'=>$congviec->id])
                );
                $datareload = Congviec::findOne($model->congviec_id);
                return [
                    'title' => "Sửa báo cáo",
                    'content' => "<span class='text-success'>Sửa báo cáo thành công!</span><script>$.ajax({ url: '".Yii::$app->urlManager->createUrl(['duan/details'])."', dataType: 'html', type: 'post', data: { expandRowKey: ".$model->congviec_id." }, success: function (result) { $(document).find('#expand".$model->congviec_id."').html(result); } })</script>",
                    'footer' => Html::button('Đóng', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::a('Chỉnh sửa', ['create'], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])

                ];
            } else {
                return [
                    'title' => "Cập nhật báo cáo công việc",
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

    public function actionDanhgia($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);
        $congviec=$model->congviec;
        $model->nguoidanhgia = Yii::$app->user->id;
        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Đánh giá báo cáo công việc",
                    'content' => $this->renderAjax('danhgia', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Đóng', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Lưu', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            } else if ($model->load($request->post()) && $model->save()) {
                $model->thoigiandanhgia = date('Y-m-d H:i:s', time());
                $model->nguoidanhgia = Yii::$app->user->id;
                $model->save();

                return [
                    'title' => "Đánh giá",
                    'content' => '<span class="text-success">Đánh giá thành công!</span>',
                    'footer' => Html::button('Đóng', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"])

                ];
            } else {
                return [
                    'title' => "Đánh giá báo cáo công việc",
                    'content' => $this->renderAjax('danhgia', [
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
                return $this->render('danhgia', [
                    'model' => $model,
                ]);
            }
        }
    }

    public function actionViewdanhgia($id)
    {
        $request = Yii::$app->request;
        $t = $this->findModel($id);
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "Đánh giá",
                'content' => $this->renderAjax('view', [
                    'model' => $t,
                ]),
                'footer' => Html::button('Đóng', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    ((Yii::$app->user->id == $t->congviec->nguoigiao) ? Html::a('Sửa', ['danhgia', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote']) : "")
            ];
        } else {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Delete an existing Baocaocongviec model.
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
     * Delete multiple existing Baocaocongviec model.
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
     * Finds the Baocaocongviec model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Baocaocongviec the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Baocaocongviec::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
