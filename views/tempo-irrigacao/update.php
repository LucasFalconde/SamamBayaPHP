<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TempoIrrigacao $model */

$this->title = 'Update Tempo Irrigacao: ' . $model->idTempoIrrigacao;
$this->params['breadcrumbs'][] = ['label' => 'Tempo Irrigacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idTempoIrrigacao, 'url' => ['view', 'idTempoIrrigacao' => $model->idTempoIrrigacao]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tempo-irrigacao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
