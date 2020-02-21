<?php

namespace common\models\party;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\party\VisitInfo;

/**
 * VisitInfoSearch represents the model behind the search form of `common\models\party\VisitInfo`.
 */
class VisitInfoSearch extends VisitInfo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['people', 'unit', 'type', 'problem', 'feedback', 'recording', 'pics', 'videos'], 'safe'],
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
        $query = VisitInfo::find();

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
        ]);

        $query->andFilterWhere(['like', 'people', $this->people])
            ->andFilterWhere(['like', 'unit', $this->unit])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'problem', $this->problem])
            ->andFilterWhere(['like', 'feedback', $this->feedback])
            ->andFilterWhere(['like', 'recording', $this->recording])
            ->andFilterWhere(['like', 'pics', $this->pics])
            ->andFilterWhere(['like', 'videos', $this->videos]);

        return $dataProvider;
    }
}
