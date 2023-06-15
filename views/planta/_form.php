<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\grid\ActionColumn;
use kartik\grid\GridView;
use yii\helpers\Url;

use app\models\Planta;
use app\models\PlantaSearch;

use app\models\Sensor;
use app\models\SensorSearch;

use app\models\Tamanho;
use app\models\TamanhoSearch;

use app\models\Usuario;
use app\models\UsuarioSearch;


/** @var yii\web\View $this */
/** @var app\models\Planta $model */
/** @var yii\widgets\ActiveForm $form */

$searchModel = new PlantaSearch();
$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

?>

<div class="container">

    <div class="planta-form" style="font-size:1.5em">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'idSensor')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Sensor::find()->orderBy(['idSensor' => SORT_ASC])->all(), 'idSensor', 'endSensor'),
            'language' => 'de',
            'options' => ['placeholder' => 'Selecione um Sensor'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]) 
        ?>

        <?= $form->field($model, 'idTamanho')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Tamanho::find()->orderBy(['idTamanho' => SORT_ASC])->all(), 'idTamanho', 'tamanho'),
            'language' => 'de',
            'options' => ['placeholder' => 'Selecione um Tamanho'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])
        ?>

        <?= $form->field($model, 'descPlanta')->textInput(['maxlength' => true]) ?>

        *Recomendamos colocar uma porcentagem de Umidade de 75%
        <?= $form->field($model, 'limiteRega')->textInput() ?>

        <?= $form->field($model, 'atividade')->dropDownList(
            ['1' => 'Ativa',

             '0' => 'Inativa'],
            [
            'prompt' => 'Selecione a atividade da Planta',
            ]
            )  ?>

        <div class="form-group">
            <?= Html::submitButton('Salvar', ['class' => 'btn btn-lg btn-success']) ?>
            <?= Html::a(Yii::t('app', 'Voltar'), ["planta/index"] ,['class' => 'btn btn-lg btn-primary']) ?>
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

                //'idPlanta',
                //'idSensor',
                //'idTempoIrrigacao',
                //'idTamanho',
                'descPlanta',
                'limiteRega',
                [
                    'attribute' => 'atividade',
                    'value' => function ($model) {
                        return $model->atividade == 1 ? 'Ativa' : 'Inativa';
                    },
                ],                
                [
                    'attribute' => 'idUsuario',
                    'value' => function ($model) {
                        // Consulta ao banco de dados para obter o nome do usuário
                        $usuario = Usuario::findOne($model->idUsuario);
                        return $usuario ? $usuario->Nome : '';
                    },
                ],
            ],
        ]); ?>

</div>