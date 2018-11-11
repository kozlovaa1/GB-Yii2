<?php

namespace app\controllers;

use app\behaviors\DurationBehavior;
use app\сomponents\ActivityComponent;
use Yii;
use app\models\Activity;
use app\models\ActivitySearch;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ActivityController implements the CRUD actions for Activity model.
 */
class ActivityController extends BaseController
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
     * Lists all Activity models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->can('viewActivity')) {

            $searchModel = new ActivitySearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            $activities = Yii::$app->db->cache(function () {
                return Yii::$app->db->createCommand();
            });

            /** @var ActivityComponent $activity_dao */
            $activity_dao = Yii::createObject([
                'class' => ActivityComponent::class
            ]);

            //$activities = $activity_dao->getAllActivitiesArray();

            $model = Activity::find()->orderBy('start_day')->all();

            return $this->render('index', [
                'model' => $model,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            throw new ForbiddenHttpException('Необходимо авторизоваться. Permission: viewActivity');
        }
    }

    /**
     * Displays a single Activity model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = Activity::findOne(['id' => $id]);
        /*$model->attachBehavior('duration', ['class' => DurationBehavior::class,
            'finish_attribute' => 'end_day',
            'start_attribute' => 'start_day']);*/

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Activity model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Activity();
        if (!Yii::$app->user->can('createActivity', ['activity' => $model])) {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                $model->getErrors();
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        } else {
            throw new ForbiddenHttpException('createActivity');
        }
    }

    /**
     * Updates an existing Activity model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (!Yii::$app->user->can('updateActivity', ['activity' => $model])) {


            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                $model->trigger(Yii::$app->params['EVENT_STATUS']);
//                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        } else {
            throw new ForbiddenHttpException('updateActivity');
        }
    }

    /**
     * Deletes an existing Activity model.
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
     * Finds the Activity model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Activity the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Activity::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
