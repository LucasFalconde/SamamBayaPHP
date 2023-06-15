<?php

use app\models\TempoIrrigacao;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TempoIrrigacaoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tempo Irrigacaos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tempo-irrigacao-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tempo Irrigacao', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idTempoIrrigacao',
            'tempo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TempoIrrigacao $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idTempoIrrigacao' => $model->idTempoIrrigacao]);
                 }
            ],
        ],
    ]); ?>


</div>
