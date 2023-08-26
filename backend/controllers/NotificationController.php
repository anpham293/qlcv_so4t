<?php

namespace backend\controllers;

use Yii;
use common\models\Notification;
use common\models\search\NotificationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * NotificationController implements the CRUD actions for Notification model.
 */
class NotificationController extends Controller
{
    /**
     * @inheritdoc
     */


    /**
     * Lists all Notification models.
     * @return mixed
     */
    public function actionIndex()
    {    
       return $this->redirect(["site/index"]);
    }


    /**
     * Displays a single Notification model.
     * @param integer $id
     * @return mixed
     */
    /**
     * Finds the Notification model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Notification the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Notification::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
