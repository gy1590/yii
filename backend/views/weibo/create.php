<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Weibo */

$this->title = 'Create Weibo';
$this->params['breadcrumbs'][] = ['label' => 'Weibos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="weibo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'UserData' => $UserData,
    ]) ?>

</div>
