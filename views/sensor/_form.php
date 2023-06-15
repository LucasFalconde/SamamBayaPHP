<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Url;

use app\models\Sensor;
use app\models\SensorSearch;

/** @var yii\web\View $this */
/** @var app\models\Sensor $model */
/** @var yii\widgets\ActiveForm $form */

$searchModel = new SensorSearch();
$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

?>

<div class="container">
    <div class="sensor-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'endSensor')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn  btn-success']) ?>
            <?= Html::a(Yii::t('app', 'Voltar'), ["sensor/index"] ,['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
    <br><br><hr>

    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            //'responsive' => true,
            //'resizableColumns' => true,
            'summary' => false,
            'containerOptions' => ['style' => 'overflow: auto; font-size:1.5em;',],
            //'resizableColumnsOptions' => ['resizeFromBody' => false],
            'option' => ['style' => 'font-size:1.5em'],

            /*'panel' => [
                'heading' => 'Dados - Plantas',
                'type' => 'primary',
                'footer' => false,                
            ],*/
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],

                'idSensor',
                'endSensor',
            ],
        ]); ?>
</div>