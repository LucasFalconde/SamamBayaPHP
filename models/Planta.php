<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "planta".
 *
 * @property int $idPlanta
 * @property int $idSensor
 * @property int $idTempoIrrigacao
 * @property int $idTamanho
 * @property int $idUsuario
 * @property string $descPlanta
 * @property int $limiteRega
 * @property int $atividade
 */
class Planta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'planta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['idSensor', 'idTempoIrrigacao', 'idTamanho', 'idUsuario', 'descPlanta', 'limiteRega', 'atividade'], 'required'],
            [['idSensor', 'idTempoIrrigacao', 'idTamanho', 'idUsuario', 'limiteRega', 'atividade'], 'integer'],
            [['descPlanta'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPlanta' => 'Id',
            'idSensor' => 'Sensor',
            'idTempoIrrigacao' => 'Tempo Irrigacao',
            'idTamanho' => 'Tamanho',
            'idUsuario' => 'Responsavel Cadastro',
            'descPlanta' => 'Nome Planta',
            'limiteRega' => 'Porcentagem Umidade',
            'atividade' => 'Atividade',
        ];
    }
}
