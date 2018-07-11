<?php

namespace app\controllers;

use Yii;
use app\models\Access;
use app\models\search\AccessSearch;
use yii\web\Controller;

use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;

use yii\filters\VerbFilter;

use app\models\Event;
use app\models\User;

/**
 * AccessController implements the CRUD actions for Access model.
 */
class AccessController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'delete-all' => ['POST'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['create', 'delete', 'delete-all'],
                'rules' => [
                    [
                    'allow' => true,
                    'roles' => ['@'],
                   ],
                ],
            ],
        ];
    }

//    /**
//     * Lists all Access models.
//     * @return mixed
//     */
//    public function actionIndex()
//    {
//        $searchModel = new AccessSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
//    }

//    /**
//     * Displays a single Access model.
//     * @param integer $id
//     * @return mixed
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    public function actionView($id)
//    {
//        return $this->render('view', [
//            'model' => $this->findModel($id),
//        ]);
//    }

    /**
     * Creates a new Access model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($eventId)
    {
        $modelEvent = Event::findOne($eventId);
        if (!$modelEvent || $modelEvent->creator_id !== Yii::$app->user->id) {
            throw new ForbiddenHttpException();
        }
        
        $model = new Access();
        $model->event_id = $eventId;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('info', 'Create access');
            // return $this->redirect(['event/my']);
            return $this->redirect(['event/shared']);
        }
        
        $users = User::find()
            ->where(['<>', 'id', Yii::$app->user->id])
            ->select('name')
            ->indexBy('id')
            ->column();

        return $this->render('create', [
            'users' => $users,
            'model' => $model,
        ]);
    }


    /**
     * Creates a new Access model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionDeleteAll($eventId)
    {
        /**/
        $modelEvent = Event::findOne($eventId);
        if (!$modelEvent || $modelEvent->creator_id !== Yii::$app->user->id) {
            throw new ForbiddenHttpException();
        }

        $modelEvent->unlinkAll(Event::RELATION_ACCESSED_USERS, true);
        Yii::$app->session->setFlash('info', 'All delete');
        return $this->redirect(['event/shared']);
    }


//    /**
//     * Updates an existing Access model.
//     * If update is successful, the browser will be redirected to the 'view' page.
//     * @param integer $id
//     * @return mixed
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    public function actionUpdate($id)
//    {
//    	$modelEvent = Event::findOne($id);
//    	if (!$modelEvent || $modelEvent->creator_id !== Yii::$app->user->id) 
//    	{
//    		throw new ForbiddenHttpException();
//      }
//
//        $model = $this->findModel($id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//        
//        Yii::$app->session->setFlash('info', 'Updated');
//        return $this->render('update', [
//            'model' => $model,
//        ]);
//    }

    /**
     * Deletes an existing Access model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
    	$modelEvent = $this->findModel($id);
    	if (!$modelEvent || $modelEvent->event->creator_id !== Yii::$app->user->id) 
    	{
    		throw new ForbiddenHttpException();
        }

        $this->findModel($id)->delete();

        Yii::$app->session->setFlash('info', 'Access deleted');
        
        return $this->redirect(['event/'.$modelEvent->event->id]);
    }

    /**
     * Finds the Access model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Access the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Access::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
