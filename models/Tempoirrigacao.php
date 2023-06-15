<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tempoirrigacao".
 *
 * @property int $idTempoIrrigacao
 * @property int $tempo
 */
class Tempoirrigacao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tempoirrigacao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tempo'], 'required'],
            [['tempo'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idTempoIrrigacao' => 'Id Tempo Irrigacao',
            'tempo' => 'Tempo',
        ];
    }
}
