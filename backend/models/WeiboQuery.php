<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Weibo]].
 *
 * @see Weibo
 */
class WeiboQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Weibo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Weibo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
