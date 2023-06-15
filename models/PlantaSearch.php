<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Planta;

/**
 * PlantaSearch represents the model behind the search form of `app\models\Planta`.
 */
class PlantaSearch extends Planta
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPlanta', 'idSensor', 'idTempoIrrigacao', 'idTamanho', 'idUsuario', 'limiteRega', 'atividade'], 'integer'],
            [['descPlanta'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Planta::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idPlanta' => $this->idPlanta,
            'idSensor' => $this->idSensor,
            'idTempoIrrigacao' => $this->idTempoIrrigacao,
            'idTamanho' => $this->idTamanho,
            'idUsuario' => $this->idUsuario,
            'limiteRega' => $this->limiteRega,
            'atividade' => $this->atividade,
        ]);

        $query->andFilterWhere(['like', 'descPlanta', $this->descPlanta]);

        return $dataProvider;
    }
}
