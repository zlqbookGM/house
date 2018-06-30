<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\DoubanGroup */

$this->title = 'Create Douban Group';
$this->params['breadcrumbs'][] = ['label' => 'Douban Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="douban-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
