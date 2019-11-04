<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "price".
 *
 * @property int $price_id
 * @property int $weibo_id 微博id
 * @property string $price_url 图片链接
 * @property int $create_at 创建时间
 * @property int $update_at 修改时间
 */
class Price extends \yii\db\ActiveRecord
{


    /**
     * 关联微博与图片
     **/
    public function getWeibo()
    {
        return $this->hasOne(Weibo::className(),['weibo_id'=>'weibo_id']);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'price';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['weibo_id', 'price_url'], 'required'],
            [['weibo_id', 'create_at', 'update_at'], 'integer'],
            [['price_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'price_id' => 'Price ID',
            'weibo_id' => 'Weibo ID',
            'price_url' => 'Price Url',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return PriceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PriceQuery(get_called_class());
    }
}
