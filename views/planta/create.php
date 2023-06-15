<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Planta $model */

$this->title = 'Create Planta';
$this->params['breadcrumbs'][] = ['label' => 'Plantas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planta-create container" style="margin-top:5%;">

    <h1 style="font-size:4em"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
