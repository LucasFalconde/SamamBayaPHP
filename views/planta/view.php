<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\ActionColumn;
use kartik\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\Planta $model */

$this->title = $model->idPlanta;
$this->params['breadcrumbs'][] = ['label' => 'Plantas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="planta-view container" style="margin-top: 5%">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idPlanta' => $model->idPlanta], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Delete', ['delete', 'idPlanta' => $model->idPlanta], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a(Yii::t('app', 'Voltar'), ["planta/index"] ,['class' => 'btn btn-primary']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idPlanta',
            'idSensor',
            'idTempoIrrigacao',
            'idTamanho',
            'idUsuario',
            'descPlanta',
            'limiteRega',
            'atividade',
        ],
    ]) ?>

</div>
