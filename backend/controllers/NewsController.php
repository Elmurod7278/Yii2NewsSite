<?php

namespace backend\controllers;

use common\models\News;
use backend\models\NewsSearch;
use common\models\NewsTeg;
use common\models\Recommendations;
use common\models\Tegs;
use Yii;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all News models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
     * @param int $id ID
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $tegModel = new NewsTeg();
        $tegModel->news_id = $id;

        if ($tegModel->load(Yii::$app->request->post())) {
            if (!NewsTeg::findOne(['teg_id' => $tegModel->teg_id, 'news_id' => $tegModel->news_id])) {
                $tegModel->save();
            } else {
                Yii::$app->session->setFlash('error', 'Bu teg qo\'shilgan');
                return $this->redirect(['view', 'id' => $id]);
            }
            return $this->redirect(['view', 'id' => $id]);
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
            'tegModel' => $tegModel
        ]);
    }

    /**
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new News();


        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->upload_file()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->upload_file()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }


    public function actionRecommend($id)
    {
        $recommend = new Recommendations();
        $recommend->news_id = $id;
        $recommend->save();
        return $this->redirect(['index']);
    }

    public function actionAdd($news_id, $teg_id)
    {
        $newstag = new NewsTeg();
        $newstag->news_id = $news_id;
        $newstag->teg_id = $teg_id;
        $newstag->save();

    }
}
