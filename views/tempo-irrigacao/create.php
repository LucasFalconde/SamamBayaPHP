<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TempoIrrigacao $model */

$this->title = 'Create Tempo Irrigacao';
$this->params['breadcrumbs'][] = ['label' => 'Tempo Irrigacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tempo-irrigacao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
