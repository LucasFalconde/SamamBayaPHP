<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\TempoIrrigacao $model */

$this->title = $model->idTempoIrrigacao;
$this->params['breadcrumbs'][] = ['label' => 'Tempo Irrigacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tempo-irrigacao-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idTempoIrrigacao' => $model->idTempoIrrigacao], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idTempoIrrigacao' => $model->idTempoIrrigacao], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idTempoIrrigacao',
            'tempo',
        ],
    ]) ?>

</div>
