<?php

use app\models\Sensor;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SensorSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Sensors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container" style="margin-top:5%">

    <div class="sensor-index">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Adicionar Sensor', ['create'], ['class' => 'btn btn-success']) ?>
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
                'heading' => 'Dados - Sensores',
                'type' => 'primary',
                'before' => Html::a('<i></i> Limpa Filtros', ['index'], ['class' => 'btn btn-lg btn-primary']),
                
            ],
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],

                'idSensor',
                'endSensor',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, Sensor $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'idSensor' => $model->idSensor]);
                    }
                ],
            ],
        ]); ?>


    </div>
</div>
