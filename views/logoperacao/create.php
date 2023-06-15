<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Logoperacao $model */

$this->title = 'Create Logoperacao';
$this->params['breadcrumbs'][] = ['label' => 'Logoperacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="logoperacao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
