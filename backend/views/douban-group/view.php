<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\DoubanGroup */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Douban Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="douban-group-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->groupId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->groupId], [
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
            'groupId',
            'title',
            'cTime',
        ],
    ]) ?>

</div>
