<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DoubanTopic */

$this->title = 'Update Douban Topic: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Douban Topics', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->topicId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="douban-topic-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
