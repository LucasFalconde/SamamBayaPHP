<?php

namespace app\controllers;

use app\models\Tamanho;
use app\models\TamanhoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;

/**
 * TamanhoController implements the CRUD actions for Tamanho model.
 */
class TamanhoController extends Controller
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
     * Lists all Tamanho models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TamanhoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tamanho model.
     * @param int $idTamanho Id Tamanho
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idTamanho)
    {
        return $this->render('view', [
            'model' => $this->findModel($idTamanho),
        ]);
    }

    /**
     * Creates a new Tamanho model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Tamanho();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idTamanho' => $model->idTamanho]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tamanho model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idTamanho Id Tamanho
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idTamanho)
    {
        $model = $this->findModel($idTamanho);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idTamanho' => $model->idTamanho]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tamanho model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idTamanho Id Tamanho
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idTamanho)
    {
        $this->findModel($idTamanho)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tamanho model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idTamanho Id Tamanho
     * @return Tamanho the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idTamanho)
    {
        if (($model = Tamanho::findOne(['idTamanho' => $idTamanho])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
