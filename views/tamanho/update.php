<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tamanho $model */

$this->title = 'Update Tamanho: ' . $model->idTamanho;
$this->params['breadcrumbs'][] = ['label' => 'Tamanhos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idTamanho, 'url' => ['view', 'idTamanho' => $model->idTamanho]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tamanho-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
