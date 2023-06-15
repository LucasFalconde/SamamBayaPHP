<?php

namespace app\controllers;

use app\models\Logoperacao;
use app\models\LogoperacaoSearch;
use yii\web\ForbiddenHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LogoperacaoController implements the CRUD actions for Logoperacao model.
 */
class LogoperacaoController extends Controller
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
     * Lists all Logoperacao models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LogoperacaoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Logoperacao model.
     * @param int $idOperacao Id Operacao
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idOperacao)
    {
        return $this->render('view', [
            'model' => $this->findModel($idOperacao),
        ]);
    }

    /**
     * Creates a new Logoperacao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Logoperacao();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idOperacao' => $model->idOperacao]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionAdicionaLog()
    {
            $idTempoIrrigacao = Yii::$app->request->post('idTempoIrrigacao');
            $idPlanta = Yii::$app->request->post('idPlanta');

            $dataHora = date('Y-m-d H:i:s');
            $logOperacao = new Logoperacao();
            $logOperacao->idTempoIrrigacao = $idTempoIrrigacao;
            $logOperacao->idPlanta = $idPlanta;
            
            // Exibe a mensagem "Executando..."
            echo "Executando...";
            ob_flush();
            flush();
            
            // Salva o log de operação
            if ($logOperacao->save()) {
                // Exibe a mensagem "Concluído"
                echo "Concluído";
                ob_flush();
                flush();
                
                return 'success';
            }else{
                'erro';
            }

    }

    /**
     * Updates an existing Logoperacao model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idOperacao Id Operacao
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idOperacao)
    {
        $model = $this->findModel($idOperacao);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idOperacao' => $model->idOperacao]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Logoperacao model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idOperacao Id Operacao
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idOperacao)
    {
        $this->findModel($idOperacao)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Logoperacao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idOperacao Id Operacao
     * @return Logoperacao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idOperacao)
    {
        if (($model = Logoperacao::findOne(['idOperacao' => $idOperacao])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
