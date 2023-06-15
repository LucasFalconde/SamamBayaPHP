<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Logoperacao $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="logoperacao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idTempoIrrigacao')->textInput() ?>

    <?= $form->field($model, 'idPlanta')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
