<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Tamanho $model */

$this->title = $model->idTamanho;
$this->params['breadcrumbs'][] = ['label' => 'Tamanhos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tamanho-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idTamanho' => $model->idTamanho], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idTamanho' => $model->idTamanho], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idTamanho',
            'tamanho',
        ],
    ]) ?>

</div>
