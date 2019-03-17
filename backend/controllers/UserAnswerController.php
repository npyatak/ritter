<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

use common\models\UserAnswer;
use common\models\search\UserAnswerSearch;
/**
 * UserAnswerController implements the CRUD actions for UserAnswer model.
 */
class UserAnswerController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all UserAnswer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserAnswerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->joinWith(['user', 'stage', 'location']);
        $dataProvider->pagination->pageSize = 100;

        if (Yii::$app->request->isAjax) {
            $id = $_POST['id'];
            $model = $this->findModel($id);
            $model->status = $model->status == UserAnswer::STATUS_ACTIVE ? UserAnswer::STATUS_INACTIVE : UserAnswer::STATUS_ACTIVE;
            $model->save(false, ['status']);

            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ['label' => UserAnswer::getStatusArray()[$model->status]];
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UserAnswer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserAnswer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserAnswer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
