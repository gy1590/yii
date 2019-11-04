<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Weibo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="weibo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        if (isset($UserData)) {
            $form->field($model, 'user_id')->dropDownList($UserData);
        }
    ?>
    <?= $form->field($model, 'weibo_name')->textInput(['maxlength' => true])->label('微博标题') ?>

    <?= $form->field($model, 'weibo_content')->textarea(['rows' => 6])->label('微博内容') ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
