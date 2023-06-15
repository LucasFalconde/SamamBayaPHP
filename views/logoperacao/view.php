<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Logoperacao $model */

$this->title = $model->idOperacao;
$this->params['breadcrumbs'][] = ['label' => 'Logoperacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="planta-view container" style="margin-top: 5%">

    <div class="logoperacao-view">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Update', ['update', 'idOperacao' => $model->idOperacao], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Delete', ['delete', 'idOperacao' => $model->idOperacao], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a(Yii::t('app', 'Voltar'), ["index"] ,['class' => 'btn btn-primary']) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'idOperacao',
                'idTempoIrrigacao',
                'idPlanta',
            ],
        ]) ?>

    </div>
</div>