<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DoubanGroup */

$this->title = 'Update Douban Group: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Douban Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->groupId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="douban-group-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
