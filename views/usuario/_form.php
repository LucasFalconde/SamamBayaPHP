<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Url;

use app\models\Usuario;
use app\models\UsuarioSearch;

/** @var yii\web\View $this */
/** @var app\models\Usuario $model */
/** @var yii\widgets\ActiveForm $form */

$searchModel = new UsuarioSearch();
$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
?>

<div class="container">

    <div class="usuario-form">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'Login')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'Senha')->passwordInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'Nome')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            <?= Html::a(Yii::t('app', 'Voltar'), ["usuario/index"], ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

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

                'ID',
                'Login',
                'Senha',
                'Nome',
            ],
        ]); ?>
    
</div>
