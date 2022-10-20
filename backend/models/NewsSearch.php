<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\News;

/**
 * NewsSearch represents the model behind the search form of `common\models\News`.
 */
class NewsSearch extends News
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'views_count', 'category_id', 'region_id', 'created_at', 'updated_at'], 'integer'],
            [['title_uz', 'title_en', 'desc_uz', 'desc_en', 'body_uz', 'body_en', 'image', 'video'], 'safe'],
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
        $query = News::find();

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
            'views_count' => $this->views_count,
            'category_id' => $this->category_id,
            'region_id' => $this->region_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['ilike', 'title_uz', $this->title_uz])
            ->andFilterWhere(['ilike', 'title_en', $this->title_en])
            ->andFilterWhere(['ilike', 'desc_uz', $this->desc_uz])
            ->andFilterWhere(['ilike', 'desc_en', $this->desc_en])
            ->andFilterWhere(['ilike', 'body_uz', $this->body_uz])
            ->andFilterWhere(['ilike', 'body_en', $this->body_en])
            ->andFilterWhere(['ilike', 'image', $this->image])
            ->andFilterWhere(['ilike', 'video', $this->video]);

        return $dataProvider;
    }
}
