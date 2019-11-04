<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Weibo */

$this->title = 'Update Weibo: ' . $model->weibo_id;
$this->params['breadcrumbs'][] = ['label' => 'Weibos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->weibo_id, 'url' => ['view', 'id' => $model->weibo_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="weibo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
