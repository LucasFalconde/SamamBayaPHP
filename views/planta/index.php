<?php
use app\models\Planta;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
//use kartik\grid\GridView;
use yii\grid\GridView;

use app\models\Usuario;
use app\models\UsuarioSearch;

/** @var yii\web\View $this */
/** @var app\models\PlantaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Plantas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container" style="margin-top:5%;">
    <div class="planta-index">

        <h1 ><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Adicionar Planta', ['create'], ['class' => 'btn b btn-success']) ?>
            <?= Html::a('Executar', ['planta/executar'], ['class' => 'btn  btn-warning']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'responsive' => true,
            'resizableColumns' => true,
            'summary' => false,
            'containerOptions' => ['style' => 'overflow: auto; font-size:1.5em;',],
            'resizableColumnsOptions' => ['resizeFromBody' => false],
            'option' => ['style' => 'font-size:1.5em'],

            'panel' => [
                'heading' => 'Dados - Plantas',
                'type' => 'primary',
                'before' => Html::a('<i></i> Limpa Filtros', ['index'], ['class' => 'btn btn-lg btn-primary']),
                
            ],

            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],

                //'idPlanta',
                //'idSensor',
                //'idTempoIrrigacao',
                //'idTamanho',
                'descPlanta',
                'limiteRega',
                [
                    'attribute' => 'atividade',
                    'value' => function ($model) {
                        return $model->atividade == 1 ? 'Ativa' : 'Inativa';
                    },
                ],                
                [
                    'attribute' => 'idUsuario',
                    'value' => function ($model) {
                        // Consulta ao banco de dados para obter o nome do usuário
                        $usuario = Usuario::findOne($model->idUsuario);
                        return $usuario ? $usuario->Nome : '';
                    },
                ],
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, Planta $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'idPlanta' => $model->idPlanta]);
                    }
                ],
                            
            ],
        ]); ?>

    </div>
</div>