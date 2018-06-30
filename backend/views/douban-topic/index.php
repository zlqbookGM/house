<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\DoubanTopicSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Douban Topics';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="douban-topic-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Douban Topic', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'topicId',
            ['header'=>'title', 'content'=>function($model){
                return mb_substr($model->title, 0, 30);
            }],
            ['header'=>'url', 'content'=>function($model){
                $id = $model->topicId;
                return "<a href='https://www.douban.com/group/topic/{$id}/' target='_blank'>jump</a>";
            }],
            'lastResponse',
            'mTime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
