<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tamanho".
 *
 * @property int $idTamanho
 * @property string $tamanho
 */
class Tamanho extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tamanho';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tamanho'], 'required'],
            [['tamanho'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idTamanho' => 'Id Tamanho',
            'tamanho' => 'Tamanho',
        ];
    }
}
