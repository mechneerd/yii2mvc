<?php

namespace app\modules\yiiform\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\yiiform\models\Yiiform;

/**
 * YiiformSearch represents the model behind the search form of `app\modules\yiiform\models\Yiiform`.
 */
class YiiformSearch extends Yiiform
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'employee_number'], 'integer'],
            [['name', 'email', 'gender', 'website'], 'safe'],
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
        $query = Yiiform::find();

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
            'employee_number' => $this->employee_number,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'website', $this->website])
			->andFilterWhere(['like', 'textarea', $this->textarea])
			->andFilterWhere(['like', 'movies', $this->movies])
			->andFilterWhere(['like', 'image', $this->image])
			->andFilterWhere(['like', 'country', $this->country])
			->andFilterWhere(['like', 'state', $this->state])
			;
			
        return $dataProvider;
    }
}
