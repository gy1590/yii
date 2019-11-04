<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PriceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Prices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="price-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Price', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'price_id',
//            'weibo_id',
            [
                    'label' => '微博名称',
                    'attribute' => 'weibo.weibo_name'
            ],
            [
                'label' => '图片',
                'attribute' => 'price_url',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::img($model->price_url, ['height' => '60px', 'width' => '60px']);
                }
            ],
//            'create_at',
//            'update_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
