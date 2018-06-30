<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\DoubanTopic */

$this->title = 'Create Douban Topic';
$this->params['breadcrumbs'][] = ['label' => 'Douban Topics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="douban-topic-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
