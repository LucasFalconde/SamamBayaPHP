<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PlantaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="planta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idPlanta') ?>

    <?= $form->field($model, 'idSensor') ?>

    <?= $form->field($model, 'idTempoIrrigacao') ?>

    <?= $form->field($model, 'idTamanho') ?>

    <?= $form->field($model, 'idUsuario') ?>

    <?php // echo $form->field($model, 'descPlanta') ?>

    <?php // echo $form->field($model, 'limiteRega') ?>

    <?php // echo $form->field($model, 'atividade') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
