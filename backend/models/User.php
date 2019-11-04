<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $user_id
 * @property string $user_name 用户名称
 * @property int $create_at 创建时间
 */
class User extends \yii\db\ActiveRecord
{

    /**
     * 用户关联微博
     **/
    public function getWeibo()
    {
        return $this->hasMany(Weibo::className(),['user_id'=>'user_id']);

    }

    /**
     * 用户关联回复
     **/
    public function getReply(){

        return $this->hasMany(Reply::className(),['user_id'=>'user_id']);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_name'], 'required'],
            [['create_at'], 'integer'],
            [['user_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_name' => 'User Name',
            'create_at' => 'Create At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }
}
