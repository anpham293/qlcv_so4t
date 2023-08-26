<?php

namespace backend\controllers;

use common\models\Congviec;
use common\models\Nguoinhanviec;
use common\models\Notification;
use Yii;
use common\models\Yeucaubosung;
use common\models\search\YeucaubosungSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * YeucaubosungController implements the CRUD actions for Yeucaubosung model.
 */
class YeucaubosungController extends Controller
{
    /**
     * @inheritdoc
     */


    /**
     * Lists all Yeucaubosung models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new YeucaubosungSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Yeucaubosung model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "Yeucaubosung #" . $id,
                'content' => $this->renderAjax('view', [
                    'model' => $this->findModel($id),
                ]),
                'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::a('Edit', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
            ];
        } else {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new Yeucaubosung model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($ids)
    {
        $request = Yii::$app->request;
        $model = new Yeucaubosung();
        $model->nguoiyeucau = Yii::$app->user->id;
        $model->congviec_id = $ids;
        $congviec = Congviec::findOne($ids);
        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                $congviec = Congviec::findOne($ids);
                if (!$congviec->checkIsGranted() &&
                    Yii::$app->user->id != $congviec->nguoigiao &&
                    Yii::$app->user->id != $congviec->duan->nguoiphutrach &&
                    Yii::$app->user->id != $congviec->duan->truongphongphutrach &&
                    Yii::$app->user->identity->username != "Superadmin" &&
                    Yii::$app->user->id != $congviec->duan->nguoitao &&
                    !Yii::$app->user->can('yeucaubosung/create')
                ) {
                    return [
                        'title' => "Thêm yêu cầu công việc",
                        'content' => "Bạn không được giao việc này, không thể thêm yêu cầu",
                        'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"])
                    ];
                }
                return [
                    'title' => "Thêm yêu cầu",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            } else if ($model->load($request->post()) && $model->save()) {
                $model->nguoiyeucau = Yii::$app->user->id;
                $model->congviec_id = $ids;
                $model->update();
                $arraynguoigan=[];
                $array = array_unique([$congviec->duan->nguoiphutrach, $congviec->duan->truongphongphutrach, $congviec->duan->nguoitao]);
                foreach (Nguoinhanviec::findAll(['congviecid' => $congviec->id]) as $model2) {
                    $arraynguoigan[]=$model2->nguoiduocgan;
                }
                $array=array_unique(array_merge($array,$arraynguoigan));
                foreach ($array as $values)
                Notification::push(
                    Yii::$app->user->identity->id,
                    $values,
                    Yii::$app->user->identity->ten . " đã thực hiện thêm yêu cầu <b>" . $model->noidungyeucau . "</b> công việc <b>" . $congviec->tencongviec . "</b> thuộc Công việc <b>" . $congviec->duan->ten . "</b>",
                    "Thêm yêu cầu công việc",
                    Yii::$app->user->identity->ten,
                    Yii::$app->urlManager->createUrl(['duan/detail', 'id' => $congviec->duan_id,'congviecid'=>$congviec->id])
                );


                return [
                    'title' => "Thêm yêu cầu",
                    'content' => "<span class='text-success'>Thêm yêu cầu bổ sung success</span><script>$.ajax({ url: '".Yii::$app->urlManager->createUrl(['duan/details'])."', dataType: 'html', type: 'post', data: { expandRowKey: ".$model->congviec_id." }, success: function (result) { $(document).find('#expand".$ids."').html(result); } })</script>",
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::a('Create More', ['create', 'ids' => $model->congviec_id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])

                ];
            } else {
                return [
                    'title' => "Thêm yêu cầu",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])

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
     * Updates an existing Yeucaubosung model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Update Yeucaubosung #" . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            } else if ($model->load($request->post()) && $model->save()) {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Yeucaubosung #" . $id,
                    'content' => $this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::a('Edit', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            } else {
                return [
                    'title' => "Update Yeucaubosung #" . $id,
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                        Html::button('Save', ['class' => 'btn btn-primary', 'type' => "submit"])
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
     * Delete an existing Yeucaubosung model.
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
     * Delete multiple existing Yeucaubosung model.
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
     * Finds the Yeucaubosung model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Yeucaubosung the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Yeucaubosung::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
