<?php

use app\models\Logoperacao;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

use app\models\Planta;
use app\models\PlantaSearch;

use app\models\TempoIrrigacao;
use app\models\TempoIrrigacaoSearch;

/** @var yii\web\View $this */
/** @var app\models\LogoperacaoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Log Operação';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container" style="margin-top:5%">
    <div class="logoperacao-index">

        <h1><?= Html::encode($this->title) ?></h1>

        <br><br>
        <!--<p>
            <?= Html::a('Create Logoperacao', ['create'], ['class' => 'btn btn-success']) ?>
        </p>-->

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
                'heading' => 'Dados - Operações',
                'type' => 'primary',
                'before' => Html::a('<i></i> Limpa Filtros', ['index'], ['class' => 'btn btn-lg btn-primary']),
                
            ],
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],

                'idOperacao',
                //'idTempoIrrigacao',
                [
                    'attribute' => 'idPlanta',
                    'value' => function ($model) {
                        // Consulta ao banco de dados para obter o nome do usuário
                        $planta = Planta::findOne($model->idPlanta);
                        return $planta ? $planta->descPlanta : '';
                    },
                ],

                [
                    'attribute' => 'idTempoIrrigacao',
                    'value' => function ($model) {
                        // Consulta ao banco de dados para obter o nome do usuário
                        $tempoIrrigacao = TempoIrrigacao::findOne($model->idTempoIrrigacao);
                        return $tempoIrrigacao ? $tempoIrrigacao->tempo : '';
                    },
                ],
                [
                    'class' => ActionColumn::class,
                    'template' => '{view}',
                    'urlCreator' => function ($action, $model) {
                        if ($action === 'view') {
                            $url = Url::to(['view', 'idOperacao' => $model->idOperacao]);
                            return $url;
                        }
                    },
                ],
            ],
        ]); ?>

    </div>
</div>