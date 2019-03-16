<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use kartik\grid\EditableColumnAction;

use common\models\UserAnswer;
use common\models\search\UserAnswerSearch;
/**
 * UserAnswerController implements the CRUD actions for UserAnswer model.
 */
class UserAnswerController extends Controller
{
    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [
            'editable' => [                                       // identifier for your editable action
                'class' => EditableColumnAction::className(),     // action class name
                'modelClass' => UserAnswer::className(),                // the update model class
            ]
        ]);
    }
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

        if (Yii::$app->request->post('hasEditable')) {
            $post = Yii::$app->request->post();
            $model = $this->findModel($post['editableKey']);
            $model[$post['editableAttribute']] = $post['UserAnswer'][$post['editableIndex']][$post['editableAttribute']];
            $out = json_encode(['output'=>'', 'message'=>'']);
            if ($model->save(false, [$post['editableAttribute']])) {
                $output = '';
                $out = json_encode(['output'=>$output, 'message'=>'']); 
            }
            echo $out;
            return;
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
