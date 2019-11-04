<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Weibo */

$this->title = $model->weibo_id;
$this->params['breadcrumbs'][] = ['label' => 'Weibos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="weibo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->weibo_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->weibo_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
        [
                'label' => '微博名称',
                'attribute' => 'weibo_name',
        ],
//            'user_id',
            [
                'label' => '微博内容',
                'attribute' => 'weibo_content',
                'format' => 'ntext',
            ],
            [
                'label' => '发布时间',
                'attribute' => 'create_at',
                'value' => function ($model) {
                    return date('Y-m-d H:i:s', $model->create_at);
                }
            ],
        ],
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => '回复者',
                'attribute' => 'user.user_name',
            ],
            [
                'label' => '回复内容',
                'attribute' => 'reply.reply_content',
            ],
            'weibo_name',
        ],
    ]) ?>

</div>
