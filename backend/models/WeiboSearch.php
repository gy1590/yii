<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Weibo;

/**
 * WeiboSearch represents the model behind the search form of `app\models\Weibo`.
 */
class WeiboSearch extends Weibo
{

    public $user_name; //定义用户名称,方便搜索
    public $price_url; //定义图片url
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['weibo_id', 'user_id', 'create_at'], 'integer'],
            [['weibo_name', 'weibo_content','user_name'], 'safe'],
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
        $query = Weibo::find();

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

        //连接查询,user_name代表用户名称,price_url代表图片链接
        $query->select(['weibo.*','user.user_name','price.price_url']);
        $query->joinWith('user', true, 'Left join');
        $query->joinWith('price',true,'left join');
        $query->andFilterWhere(['like', 'user.user_name', $this->user_name]);


        // grid filtering conditions
        $query->andFilterWhere([
            'weibo_id' => $this->weibo_id,
            'weibo.user_id' => $this->user_id,
            'weibo.create_at' => $this->create_at,
        ]);

        $query->andFilterWhere(['like', 'weibo.weibo_name', $this->weibo_name])
            ->andFilterWhere(['like', 'weibo.weibo_content', $this->weibo_content]);

        return $dataProvider;
    }

    /**
     * 连表查询
     * @param string $id
     * @return ActiveDataProvider
     **/
    public function joinSearch($id)
    {
        $query = Weibo::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $query->select(['user.*','weibo.*','reply.*'])
            ->joinWith(['reply'=>function($query){
                $query->joinWith('user',true,'left join');
            }])
            ->andWhere(['weibo.weibo_id'=> $id]);

        print_r($query->createCommand()->getRawSql());
        print_r($query->asArray()->all());exit();
        return $dataProvider;
    }

}
