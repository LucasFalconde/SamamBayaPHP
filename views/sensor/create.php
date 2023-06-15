<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Sensor $model */

$this->title = 'Create Sensor';
$this->params['breadcrumbs'][] = ['label' => 'Sensors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sensor-create container" style="margin-top:5%;">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
