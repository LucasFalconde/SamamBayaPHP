<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Sensor $model */

$this->title = 'Atualiza Sensor: ' . $model->idSensor;
$this->params['breadcrumbs'][] = ['label' => 'Sensors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idSensor, 'url' => ['view', 'idSensor' => $model->idSensor]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="sensor-update container" style="margin-top:5%;">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
