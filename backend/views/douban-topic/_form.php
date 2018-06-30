<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DoubanTopic */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="douban-topic-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'topicId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastResponse')->textInput() ?>

    <?= $form->field($model, 'mTime')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
