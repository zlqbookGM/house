<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ArrayDataProvider;

echo Html::a('View All', ['douban/all'], ['class' => 'btn btn-primary', 'style'=>'float:right;']);
?>
<form method="post" style="margin-bottom: 20px;">
    <input name="keywords">
    <button type="submit">Submit</button>
</form>

<?php
if($key){
    echo '<div class="alert alert-info">'.implode(', ', $key).'</div>';
}

echo GridView::widget([
    'dataProvider' => new ArrayDataProvider(['allModels'=>$data]),
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'topicId',
        ['header'=>'title', 'content'=>function($model){
            return mb_substr($model['title'], 0, 30);
        }],
        ['header'=>'url', 'content'=>function($model){
            $id = $model['topicId'];
            return "<a href='https://www.douban.com/group/topic/{$id}/' target='_blank'>jump</a>";
        }],
    ],
]);