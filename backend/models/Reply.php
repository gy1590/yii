<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reply".
 *
 * @property int $reply_id
 * @property string $reply_content 回复内容
 * @property int $weibo_id 微博id
 * @property int $user_id 用户id
 * @property int $create_at 创建时间
 */
class Reply extends \yii\db\ActiveRecord
{

    /**
     * 回复关联微博
     **/
    public function getWeibo()
    {
        return $this->hasOne(Weibo::className(),['user_id'=>'user_id']);
    }
    /**
     * 回复与用户关联
     **/
    public function getUser()
    {
        return $this->hasMany(User::className(),['user_id'=>'user_id']);
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reply';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reply_content', 'weibo_id', 'user_id'], 'required'],
            [['reply_content'], 'string'],
            [['weibo_id', 'user_id', 'create_at'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'reply_id' => 'Reply ID',
            'reply_content' => 'Reply Content',
            'weibo_id' => 'Weibo ID',
            'user_id' => 'From Userid',
            'create_at' => 'Create At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ReplyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ReplyQuery(get_called_class());
    }
}
