<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\DoubanGroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Douban Groups';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="douban-group-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Douban Group', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'groupId',
            'title',
            'cTime',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
