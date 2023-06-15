<?php

namespace app\controllers;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use Yii;

use app\models\Planta;
use app\models\PlantaSearch;

use app\models\Logoperacao;
use app\models\LogoperacaoSearch;


/**
 * PlantaController implements the CRUD actions for Planta model.
 */
class PlantaController extends Controller
{
    /**
     * @inheritDoc
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

    public function beforeAction($action)
    {
        // Verificar se o usuário está logado antes de executar a ação
        if (in_array($action->id, ['index']) && Yii::$app->user->isGuest) {
            throw new ForbiddenHttpException('Acesso negado. Faça o login para acessar esta página.');
        }

        return parent::beforeAction($action);
    }

    /**
     * Lists all Planta models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PlantaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Planta model.
     * @param int $idPlanta Id Planta
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idPlanta)
    {
        return $this->render('view', [
            'model' => $this->findModel($idPlanta),
        ]);
    }

    /**
     * Creates a new Planta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Planta();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $model->idUsuario = Yii::$app->user->identity->ID;

                if($model->idTamanho == 1){
                    $model->idTempoIrrigacao = 1;

                }elseif($model->idTamanho == 2){
                    $model->idTempoIrrigacao = 2;

                }elseif($model->idTamanho == 3){
                    $model->idTempoIrrigacao = 3;

                }

                $model->save();

                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Planta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idPlanta Id Planta
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idPlanta)
    {
        $model = $this->findModel($idPlanta);

        if ($this->request->isPost && $model->load($this->request->post())) {

            $model->idUsuario = Yii::$app->user->identity->ID;

            if($model->idTamanho == 1){
                $model->idTempoIrrigacao = 1;

            }elseif($model->idTamanho == 2){
                $model->idTempoIrrigacao = 2;

            }elseif($model->idTamanho == 3){
                $model->idTempoIrrigacao = 3;

            }

            $model->save();


            $model->save();
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionCadastra()
    {
        $plantas = Yii::$app->db->createCommand("SELECT * FROM planta WHERE atividade = 1")->queryAll();

        foreach($plantas as $planta){
            //$dataHora = date('Y-m-d H:i:s');
            $logOperacao = new Logoperacao();
            $logOperacao->idTempoIrrigacao = $planta["idTempoIrrigacao"];
            $logOperacao->idPlanta = $planta["idPlanta"];
            $logOperacao->save();
        }

        return $this->redirect(['executar']);
    }

    public function actionExecutar()
    {
        $searchModel = new PlantaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('executar', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Deletes an existing Planta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idPlanta Id Planta
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idPlanta)
    {
        $this->findModel($idPlanta)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Planta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idPlanta Id Planta
     * @return Planta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idPlanta)
    {
        if (($model = Planta::findOne(['idPlanta' => $idPlanta])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
