<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\UserAnswer;

/**
 * UserAnswerSearch represents the model behind the search form about `common\models\UserAnswer`.
 */
class UserAnswerSearch extends UserAnswer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'stage_id', 'location_id', 'user_id', 'score', 'is_finished', 'is_shared', 'status'], 'integer'],
            [['answers'], 'safe'],
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
        $query = UserAnswer::find();

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
            'stage_id' => $this->stage_id,
            'location_id' => $this->location_id,
            'user_id' => $this->user_id,
            'score' => $this->score,
            'is_finished' => $this->is_finished,
            'is_shared' => $this->is_shared,
            'user_answer.status' => $this->status,
        ]);

        return $dataProvider;
    }
}
