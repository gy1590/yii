<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Price;

/**
 * PriceSearch represents the model behind the search form of `app\models\Price`.
 */
class PriceSearch extends Price
{

    public $weibo_name;//定义微博名称

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price_id', 'weibo_id', 'create_at', 'update_at'], 'integer'],
//            [['price_url'], 'safe'],
            [['weibo_name'],'safe'],
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
        $query = Price::find();

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


        $query->select(['price.*','weibo.weibo_name'])
              ->joinWith('weibo',true,'left join')
              ->andFilterWhere(['like','weibo.weibo_name',$this->weibo_name]);

        // grid filtering conditions
        $query->andFilterWhere([
            'price_id' => $this->price_id,
            'weibo_id' => $this->weibo_id,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
        ]);

        $query->andFilterWhere(['like', 'price_url', $this->price_url]);

        return $dataProvider;
    }
}
