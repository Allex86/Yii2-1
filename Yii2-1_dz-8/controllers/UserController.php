<?php

namespace app\controllers;

use Yii;

use app\models\User;
use app\models\Event;
use app\models\Access;

use app\models\search\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
        ];
    }

    /**
     * Test action for User.
     */
    public function actionTest()
    {
        // Создать запись в таблице user.
        // 
        $testUser = new User();
        $testUser->username = 'user_5';
        $testUser->name = 'user_5';
        $testUser->password_hash = '555';
        $testUser->save();
        // _end($testUser->save());


        // Создать три связаные (с записью в user) запиcи в event, используя метод link()
        // 
        // $testUser = User::find()->where(['name' => 'user_5'])->one();
        $testUser = User::findOne(1);
        $testEvent = new Event();
        $testEvent->text = 'text user_5';
        $testEvent->link(Event::RELATION_CREATOR, $testUser);
        // _end($testEvent->link(Event::RELATION_CREATOR, $testUser));
        


        // Добавить с помощью созданного релейшена связь между записями в User и Event (метод link()
        //
        $addLinkToAccess->link(Event::RELATION_ACCESSED_USERS, $testUser);



        // Прочитать из базы все записи из User применив жадную подгрузку связанных данных из Event, с запросами без JOIN.
        // 
        $reedUser = Event::find()->with([Event::RELATION_CREATOR])->all();
        // _end($reedUserWith = Event::find()->with([Event::RELATION_CREATOR])->all());



        // Прочитать из базы все записи из User применив жадную подгрузку связанных данных из Event, с запросом содержащем JOIN
        // 
        $reedUserJoin = Event::find()->joinWith([Event::RELATION_CREATOR])->all();
        // _end($reedUserJoin = Event::find()->joinWith([Event::RELATION_CREATOR])->all());


        
        return $this->renderContent('Ok!');
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
