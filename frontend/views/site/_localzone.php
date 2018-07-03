<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/2/002
 * Time: 22:26
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use common\models\LocalZone;

$landmarkmsg =LocalZone::getAllLandMark();
?>
<?php $form = ActiveForm::begin(['id'=>'page-form']); ?>



    <?= $form->field($model, 'landmark')->dropDownList($landmarkmsg) ?>

<!--    --><?//= $form->field($model, 'district')->dropDownList($districtmsg) ?>


    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>