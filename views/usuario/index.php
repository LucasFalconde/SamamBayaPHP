<?php

use app\models\Usuario;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\UsuarioSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container" style="margin-top:5%">

    <div class="usuario-index">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Criar Usuario', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'responsive' => true,
            'resizableColumns' => true,
            'summary' => false,
            'containerOptions' => ['style' => 'overflow: auto; font-size:1.5em;',],
            'resizableColumnsOptions' => ['resizeFromBody' => false],
            'option' => ['style' => 'font-size:1.5em'],

            'panel' => [
                'heading' => 'Dados - Usúarios',
                'type' => 'primary',
                'before' => Html::a('<i></i> Limpa Filtros', ['index'], ['class' => 'btn btn-lg btn-primary']),
                
            ],
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],

                'ID',
                'Login',
                'Senha',
                'Nome',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, Usuario $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'ID' => $model->ID]);
                    }
                ],
            ],
        ]); ?>


    </div>
</div>
