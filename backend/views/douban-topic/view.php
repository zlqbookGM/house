<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\DoubanTopic */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Douban Topics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="douban-topic-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->topicId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->topicId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'topicId',
            'title',
            'lastResponse',
            'mTime',
        ],
    ]) ?>

</div>
