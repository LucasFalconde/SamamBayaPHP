<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Logoperacao $model */

$this->title = 'Update Logoperacao: ' . $model->idOperacao;
$this->params['breadcrumbs'][] = ['label' => 'Logoperacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idOperacao, 'url' => ['view', 'idOperacao' => $model->idOperacao]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="logoperacao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
