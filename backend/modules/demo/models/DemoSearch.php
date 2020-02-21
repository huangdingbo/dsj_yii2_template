<?php

namespace backend\modules\demo\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * DemoSearch represents the model behind the search form of `backend\modules\demo\models\Demo`.
 */
class DemoSearch extends Demo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'radio'], 'integer'],
            [['text', 'type', 'time', 'area'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Demo::find();

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
            'id' => $this->id,
            'radio' => $this->radio,
        ]);

        $query->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'time', $this->time])
            ->andFilterWhere(['like', 'area', $this->area]);

        return $dataProvider;
    }
}
