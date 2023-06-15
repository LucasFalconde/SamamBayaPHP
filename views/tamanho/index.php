<?php

use app\models\Tamanho;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TamanhoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tamanhos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container" style="margin-top:2%">
    <div class="tamanho-index">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Create Tamanho', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'idTamanho',
                'tamanho',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, Tamanho $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'idTamanho' => $model->idTamanho]);
                    }
                ],
            ],
        ]); ?>


    </div>
</div>