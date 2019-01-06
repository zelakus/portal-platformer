<?php

namespace kouosl\platformer\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use kouosl\platformer\models\Highscores;

/**
 * HighscoresSearch represents the model behind the search form of `vendor\kouosl\platformer\models\Highscores`.
 */
class HighscoresSearch extends Highscores
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userid', 'gameid', 'score'], 'integer'],
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
        $query = Highscores::find();

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
            'userid' => $this->userid,
            'gameid' => $this->gameid,
            'score' => $this->score,
        ]);

        return $dataProvider;
    }
}
