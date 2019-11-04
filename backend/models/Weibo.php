<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "weibo".
 *
 * @property int $weibo_id
 * @property int $user_id 用户id
 * @property string $weibo_name 微博标题
 * @property string $weibo_content 微博内容
 * @property int $create_at 创建时间
 */
class Weibo extends \yii\db\ActiveRecord
{

    /**
     * 微博与用户关联
     **/
    public function getUser()
    {
        return $this->hasOne(User::className(),['user_id'=>'user_id']);
    }

    /**
     * 微博与图片关联
     **/
    public function getPrice(){
        return $this->hasMany(Price::className(),['weibo_id'=>'weibo_id']);
    }

    /**
     * 微博与评论关联
     **/
    public function getReply(){
        return $this->hasMany(Reply::className(),['weibo_id'=>'weibo_id']);

    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'weibo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'weibo_name', 'weibo_content'], 'required'],
            [['user_id', 'create_at'], 'integer'],
            [['weibo_content'], 'string'],
            [['weibo_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'weibo_id' => 'Weibo ID',
            'user_id' => 'User ID',
            'weibo_name' => 'Weibo Name',
            'weibo_content' => 'Weibo Content',
            'create_at' => 'Create At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return WeiboQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WeiboQuery(get_called_class());
    }
}
