<?php
/* @var $model common\models\Appeal */

use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;


?>

<?php $form = ActiveForm::begin(['id' => 'form-appeal','enableAjaxValidation' => false]); ?>
<div class="row">
    <?= $form->field($model, 'date',['options'=>['class'=>'col']])->widget(
                    DatePicker::className(), [
                    'name' => 'check_issue_date',
                    'options' => ['placeholder' => 'Sana tanlang'],
                    'pickerIcon' => '<i class="bi bi-calendar-check-fill text-primary"></i>',
                    'removeIcon' => '<i class="bi bi-trash-fill text-danger"></i>',
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'todayBtn' => true,
                        'todayHighlight' => true,
                        'autoclose' => true,
                    ]
                ]);?>

    <?= $form->field($model, 'organization',['options'=>['class'=>'col']])->dropDownList(ArrayHelper::map(\common\models\Organization::find()->all(), 'id', 'name')) ?>

</div>

<div class="row">
    <?= $form->field($model, 'cryme_type',['options'=>['class'=>'col']])->dropDownList(Yii::$app->params['cryme_type']) ?>

    <?= $form->field($model, 'responsible',['options'=>['class'=>'col']])->dropDownList(ArrayHelper::map(\common\models\User::find()->where(['status'=>9])->all(), 'id', 'firstname')) ?>

</div>

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

    DistrictA();
    $('#appeal-region').on('change', function (){
        DistrictA();
    });

    function DistrictA(){
        var region = $('#appeal-region').val();
        $.ajax({
            url: '$urlDistrictDropdown',
            data: {
                region: region,
            },
            success: function(result) {
                $('#appeal-district').html(result);
                $('#appeal-district').val($model->district);

            }
        });
    }
JS;
$this->registerJs( $script );
?>