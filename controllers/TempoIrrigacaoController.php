<?php

namespace app\controllers;

use app\models\TempoIrrigacao;
use app\models\TempoIrrigacaoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;

/**
 * TempoIrrigacaoController implements the CRUD actions for TempoIrrigacao model.
 */
class TempoIrrigacaoController extends Controller
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

    public function beforeAction($action)
    {
        // Verificar se o usuário está logado antes de executar a ação
        if (in_array($action->id, ['index']) && Yii::$app->user->isGuest) {
            throw new ForbiddenHttpException('Acesso negado. Faça o login para acessar esta página.');
        }

        return parent::beforeAction($action);
    }

    /**
     * Lists all TempoIrrigacao models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TempoIrrigacaoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TempoIrrigacao model.
     * @param int $idTempoIrrigacao Id Tempo Irrigacao
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idTempoIrrigacao)
    {
        return $this->render('view', [
            'model' => $this->findModel($idTempoIrrigacao),
        ]);
    }

    /**
     * Creates a new TempoIrrigacao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TempoIrrigacao();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idTempoIrrigacao' => $model->idTempoIrrigacao]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TempoIrrigacao model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idTempoIrrigacao Id Tempo Irrigacao
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idTempoIrrigacao)
    {
        $model = $this->findModel($idTempoIrrigacao);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idTempoIrrigacao' => $model->idTempoIrrigacao]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TempoIrrigacao model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idTempoIrrigacao Id Tempo Irrigacao
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idTempoIrrigacao)
    {
        $this->findModel($idTempoIrrigacao)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TempoIrrigacao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idTempoIrrigacao Id Tempo Irrigacao
     * @return TempoIrrigacao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idTempoIrrigacao)
    {
        if (($model = TempoIrrigacao::findOne(['idTempoIrrigacao' => $idTempoIrrigacao])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
