<?php
/* @var $model common\models\Appeal */

use common\models\Document;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;

$model = new Document();

?>

<?php $form = ActiveForm::begin(['id' => 'form-appeal','enableAjaxValidation' => false]); ?>

    <div class="row">
        <?= $form->field($model, 'country',['options'=>['class'=>'col']])->dropDownList(Yii::$app->params['country']) ?>
        <?= $form->field($model, 'region',['options'=>['class'=>'col']])->dropDownList(ArrayHelper::map(\common\models\Region::find()->all(), 'id', 'name_ru')) ?>
        <?= $form->field($model, 'district',['options'=>['class'=>'col']])->dropDownList([]) ?>
    </div>

    <div class="row my-4">
        <div class="form-group">
        <span class="btn btn-primary col-12" onclick="$('#stepTwoBtn').click()">
            <?=Yii::t('main', 'Дальше')?>
    </span>
        </div>

    </div>
<?php ActiveForm::end(); ?>

<?php
$url = \yii\helpers\Url::to(['create']);
$urlDistrictDropdown = \yii\helpers\Url::to(['/appeal/district']);
$script = <<< JS

    
JS;
$this->registerJs( $script );
?>