<?php

namespace kouosl\platformer\controllers\backend;

use Yii;
use vendor\kouosl\platformer\models\Highscores;
use vendor\kouosl\platformer\models\HighscoresSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HighscoresController implements the CRUD actions for Highscores model.
 */
class HighscoresController extends Controller
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
     * Lists all Highscores models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HighscoresSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Highscores model.
     * @param integer $userid
     * @param integer $gameid
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($userid, $gameid)
    {
        return $this->render('view', [
            'model' => $this->findModel($userid, $gameid),
        ]);
    }

    /**
     * Creates a new Highscores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Highscores();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'userid' => $model->userid, 'gameid' => $model->gameid]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Highscores model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $userid
     * @param integer $gameid
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($userid, $gameid)
    {
        $model = $this->findModel($userid, $gameid);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'userid' => $model->userid, 'gameid' => $model->gameid]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Highscores model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $userid
     * @param integer $gameid
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($userid, $gameid)
    {
        $this->findModel($userid, $gameid)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Highscores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $userid
     * @param integer $gameid
     * @return Highscores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($userid, $gameid)
    {
        if (($model = Highscores::findOne(['userid' => $userid, 'gameid' => $gameid])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
