<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "logoperacao".
 *
 * @property int $idOperacao
 * @property int $idTempoIrrigacao
 * @property int $idPlanta
 */
class Logoperacao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'logoperacao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idTempoIrrigacao', 'idPlanta'], 'required'],
            [['idTempoIrrigacao', 'idPlanta'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idOperacao' => 'Id Operacao',
            'idTempoIrrigacao' => 'Tempo Irrigacao',
            'idPlanta' => 'Nome Planta',
        ];
    }
}
