<?php

namespace app\controllers;

use Yii;
use app\models\Event;
use app\models\search\EventSearch;
use yii\web\Controller;

use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;

use yii\filters\VerbFilter;

use yii\data\ActiveDataProvider;
use app\models\User;
use app\models\Access;

/**
 * EventController implements the CRUD actions for Event model.
 */
class EventController extends Controller
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
                ],
            ],
            'access' => [
            	'class' => \yii\filters\AccessControl::className(),
            	'only' => ['create', 'update', 'delete', 'view', 'my', 'shared', 'accessed'],
            	'rules' => [
            		[
            	   	'allow' => true,
            	   	'roles' => ['@'],
            	   ],
            	],
        		],
        ];
    }

    /**
     * Lists all Event models.
     * @return mixed
     */
    public function actionMy()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Event::find()->byCreator(Yii::$app->user->id),
        ]);

        return $this->render('my', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionIndex()
    {
        // $searchModel = new EventSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // return $this->render('index', [
        //     'searchModel' => $searchModel,
        //     'dataProvider' => $dataProvider,
        // ]);
        return $this->redirect(['my']);
    }

    /**
     * Lists all Event models.
     * @return mixed
     */
    public function actionShared()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Event::find()
            	->byCreator(Yii::$app->user->id)
            	->innerJoinWith(Event::RELATION_ACCESSES),
        ]);

        return $this->render('shared', [
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Lists all Event models.
     * @return mixed
     */
    public function actionAccessed()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Event::find()
            	->innerJoinWith(Event::RELATION_ACCESSES)
            	->where(['access.user_id' => Yii::$app->user->id]),
        ]);

        return $this->render('accessed', [
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Displays a single Event model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
    	$modelEvent = Event::findOne($id);
        if (!$modelEvent || $modelEvent->creator_id !== Yii::$app->user->id) {
            throw new ForbiddenHttpException();
        }
        
        $model = $this->findModel($id);

        $dataProvider = new ActiveDataProvider([
            'query' => $model->getAccesses()
        ]);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Creates a new Event model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Event();
        $model->creator_id = Yii::$app->user->id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('info', 'Created');
            return $this->redirect(['my']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Event model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
    	$modelEvent = Event::findOne($id);
    	if (!$modelEvent || $modelEvent->creator_id !== Yii::$app->user->id) 
    	{
    		throw new ForbiddenHttpException();
      }

        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // return $this->redirect(['view', 'id' => $model->id]);
            Yii::$app->session->setFlash('info', 'Updated');
            return $this->redirect(['my']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Event model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
    	$modelEvent = Event::findOne($id);
    	if (!$modelEvent || $modelEvent->creator_id !== Yii::$app->user->id) 
    	{
    		throw new ForbiddenHttpException();
      }

        $this->findModel($id)->delete();
        // return $this->redirect(['index']);
        Yii::$app->session->setFlash('info', 'Deleted');
        return $this->redirect(['my']);
    }

    /**
     * Finds the Event model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Event the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Event::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
