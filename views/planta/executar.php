<?php
use app\models\Planta;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\ActionColumn;
use kartik\grid\GridView;

?>

<div class="container" style="margin-top:6%">

    <p>
        <?= Html::a('Voltar', ['index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <div class="card text-center">
        <div class="card-header">
            <h3><b>Execução</b></h3>
        </div>
        <div class="card-body">

            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                    <th style="background-color:#DCDCDC">Nome Planta</th>
                    <th style="background-color:#DCDCDC">Atividade</th>
                    <th style="background-color:#DCDCDC">Umidade Desejada</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
            
                    $plantas = Yii::$app->db->createCommand("SELECT * FROM planta WHERE atividade = 1")->queryAll();

                    foreach($plantas as $planta){
                        echo'<tr data-desc-planta="'.$planta["idPlanta"].'" data-atividade="'.$planta["idTempoIrrigacao"].'">
                        <td>'.$planta["descPlanta"].'</td>
                        <td>'.$planta["atividade"].'</td>
                        <td>'.$planta["limiteRega"].'</td></tr>';

                    }
                    ?>

                </tbody>
            </table>
        </div>
        <div class="card-footer text-body-secondary">
            <?= Html::a('Executar', ['planta/cadastraLog'], ['class' => 'btn btn-lg btn-primary', 'id' => 'btn-executar']) ?>
        </div>
        </div>
        <div id="executando-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Executando</h5>
        </div>
        <div class="modal-body">
            <p>Executando...</p>
        </div>
        </div>
    </div>
    </div>

    <div id="concluido-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Concluído</h5>
        </div>
        <div class="modal-body">
            <p>Concluído!</p>
        </div>
        </div>
    </div>
    </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    $('#btn-executar').click(function(event) {
        event.preventDefault(); // Impede o redirecionamento padrão do botão
        
        // Exibir a janela "Executando"
        $('#executando-modal').modal('show');
        
        // Aguardar 3 segundos e, em seguida, exibir a janela "Concluído"
        setTimeout(function() {
            $('#executando-modal').modal('hide');
            setTimeout(function() {
                window.location.href = 'http://localhost/SamamBaya/web/index.php?r=planta/cadastra';
            }, 0); // Aguarda mais 3 segundos antes de redirecionar
            $('#concluido-modal').modal('show');
        }, 3000);
    });
    });
</script>


