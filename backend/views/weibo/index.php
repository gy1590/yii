<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WeiboSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Weibos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="weibo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Weibo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => '用户名称',
                'attribute' => 'user.user_name',
                'filter' => Html::activeTextInput($searchModel, 'user_name', ['class' => 'form-control']),
            ],
            [
                'label' => '微博标题',
                'attribute' => 'weibo_name',
            ],
            [
                'label' => '微博内容',
                'attribute' => 'weibo_content',
            ],
            [
                    'label' => '微博图片',
                    'attribute' => 'price.price_url',
                    'format' => 'raw',
                    'value' => function($model) {
                        return Html::img('https://ss1.baidu.com/6ONXsjip0QIZ8tyhnq/it/u=2865451141,4177814101&fm=173&app=25&f=JPEG?w=544&h=317&s=AC0323D000A3AAB420A48033030040D3', ['height' => '50px','width'=>'50px']);
                    },
            ],
//            'weibo_content:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
