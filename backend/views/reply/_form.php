<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Reply */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reply-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'reply_content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'weibo_id')->textInput() ?>

    <?= $form->field($model, 'from_userid')->textInput() ?>

    <?= $form->field($model, 'to_userid')->textInput() ?>

    <?= $form->field($model, 'create_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
