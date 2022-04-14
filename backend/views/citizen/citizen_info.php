<?php
/* @var $status int */
/* @var $appeal_id int */

use common\models\Citizen;
use common\models\Passport;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;

$model = new Citizen();
$passport = new Passport();

$this->title = $status == 1 ? Yii::t('main', 'Жертвы') : Yii::t('main', 'Правонарушители');

?>
<?php $form = ActiveForm::begin(['id' => 'form-citizen' . $status,'enableClientValidation'=>true, 'enableAjaxValidation' => false, 'action' => Url::to(['/citizen/create'])]); ?>
    <div class="border p-2 my-2">
        <h3><?= $this->title ?> data</h3>
        <?= $form->field($model, 'appeal_id')->hiddenInput(['id' => 'citizen-appeal_id' . $status, 'value'=>$appeal_id])->label(false) ?>
        <?= $form->field($model, 'status')->hiddenInput(['id' => 'citizen-status' . $status, 'value'=>$status])->label(false) ?>

        <div class="row">
            <?= $form->field($model, 'lastname', ['options' => ['class' => 'col']])->textInput(['id' => 'citizen-lastname' . $status]) ?>
            <?= $form->field($model, 'firstname', ['options' => ['class' => 'col']])->textInput(['id' => 'citizen-firstname' . $status]) ?>
            <?= $form->field($model, 'middlename', ['options' => ['class' => 'col']])->textInput(['id' => 'citizen-middlename' . $status]) ?>
        </div>
        <div class="row">
            <?= $form->field($model, 'lastname_latin', ['options' => ['class' => 'col']])->textInput(['id' => 'citizen-lastname_latin' . $status]) ?>
            <?= $form->field($model, 'firstname_latin', ['options' => ['class' => 'col']])->textInput(['id' => 'citizen-firstname_latin' . $status]) ?>
            <?= $form->field($model, 'middlename_latin', ['options' => ['class' => 'col']])->textInput(['id' => 'citizen-middlename_latin' . $status]) ?>
        </div>
        <div class="row">
            <?= $form->field($model, 'lastname_uzbek', ['options' => ['class' => 'col']])->textInput(['id' => 'citizen-lastname_uzbek' . $status]) ?>
            <?= $form->field($model, 'firstname_uzbek', ['options' => ['class' => 'col']])->textInput(['id' => 'citizen-firstname_uzbek' . $status]) ?>
            <?= $form->field($model, 'middlename_uzbek', ['options' => ['class' => 'col']])->textInput(['id' => 'citizen-middlename_uzbek' . $status]) ?>
        </div>

        <hr></hr>

        <div class="row">
            <?= $form->field($model, 'birth_date', ['options' => ['class' => 'col']])->widget(
                DatePicker::className(), [
                'name' => 'check_issue_date',
                'options' => ['id' => 'citizen-birth_date' . $status, 'placeholder' => 'Sana tanlang'],
                'pickerIcon' => '<i class="bi bi-calendar-check-fill text-primary"></i>',
                'removeIcon' => '<i class="bi bi-trash-fill text-danger"></i>',
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'todayBtn' => true,
                    'todayHighlight' => true,
                    'autoclose' => true,
                ]
            ]); ?>
            <?= $form->field($model, 'birth_place', ['options' => ['class' => 'col']])->dropDownList(Yii::$app->params['country'], ['id' => 'citizen-birth_place' . $status]) ?>
            <?= $form->field($model, 'citizenship', ['options' => ['class' => 'col']])->dropDownList(Yii::$app->params['country'], ['id' => 'citizen-citizenship' . $status]) ?>
        </div>
        <div class="row">
            <?= $form->field($model, 'marital_status', ['options' => ['class' => 'col']])->dropDownList(Yii::$app->params['materialStatus'], ['id' => 'citizen-marital_status' . $status]) ?>
            <?= $form->field($model, 'gender', ['options' => ['class' => 'col']])->dropDownList(Yii::$app->params['gender'], ['id' => 'citizen-gender' . $status]) ?>
        </div>
    </div>
    <div class="border p-2 my-2">
        <h3><?= $this->title ?> passport data</h3>
        <div class="row">
            <?= $form->field($passport, 'PINFL', ['options' => ['class' => 'col']])->textInput() ?>
            <?= $form->field($passport, 'series', ['options' => ['class' => 'col-1']])->textInput() ?>
            <?= $form->field($passport, 'number', ['options' => ['class' => 'col']])->textInput() ?>
            <?= $form->field($passport, 'issue_date', ['options' => ['class' => 'col']])->widget(
                DatePicker::className(), [
                'name' => 'check_issue_date',
                'options' => ['id' => 'passport-issue_date' . $status, 'placeholder' => 'Sana tanlang'],
                'pickerIcon' => '<i class="bi bi-calendar-check-fill text-primary"></i>',
                'removeIcon' => '<i class="bi bi-trash-fill text-danger"></i>',
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'todayBtn' => true,
                    'todayHighlight' => true,
                    'autoclose' => true,
                ]
            ]); ?>
            <?= $form->field($passport, 'expire_date', ['options' => ['class' => 'col']])->widget(
                DatePicker::className(), [
                'name' => 'check_issue_date',
                'options' => ['id' => 'passport-expire_date' . $status, 'placeholder' => 'Sana tanlang'],
                'pickerIcon' => '<i class="bi bi-calendar-check-fill text-primary"></i>',
                'removeIcon' => '<i class="bi bi-trash-fill text-danger"></i>',
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'todayBtn' => true,
                    'todayHighlight' => true,
                    'autoclose' => true,
                ]
            ]); ?>
        </div>
        <?= $form->field($passport, 'issue_place', ['options' => ['class' => 'col']])->textInput() ?>

    </div>
    <div class="border p-2 my-2">
        <h3>Location residence data</h3>
        <div class="row">
            <?= $form->field($model, 'current_country', ['options' => ['class' => 'col']])->dropDownList(Yii::$app->params['country'], ['id' => 'citizen-current_country' . $status]) ?>
            <?= $form->field($model, 'current_region', ['options' => ['class' => 'col']])->dropDownList(ArrayHelper::map(\common\models\Region::find()->all(), 'id', 'name_ru'), ['id' => 'citizen-current_region' . $status]) ?>
            <?= $form->field($model, 'current_district', ['options' => ['class' => 'col']])->dropDownList([], ['id' => 'citizen-current_district' . $status]) ?>
        </div>
        <?= $form->field($model, 'current_full_address', ['options' => ['class' => 'col']])->textInput(['id' => 'citizen-current_full_address' . $status]) ?>
    </div>
    <div class="border p-2 my-2">
        <h3>Place of registration</h3>
        <div class="row">
            <?= $form->field($model, 'registration_country', ['options' => ['class' => 'col']])->dropDownList(Yii::$app->params['country'], ['id' => 'citizen-registration_country' . $status]) ?>
            <?= $form->field($model, 'registration_region', ['options' => ['class' => 'col']])->dropDownList(ArrayHelper::map(\common\models\Region::find()->all(), 'id', 'name_ru'), ['id' => 'citizen-registration_region' . $status]) ?>
            <?= $form->field($model, 'registration_district', ['options' => ['class' => 'col']])->dropDownList([], ['id' => 'citizen-registration_district' . $status]) ?>
        </div>
        <?= $form->field($model, 'registration_full_address', ['options' => ['class' => 'col']])->textInput(['id' => 'citizen-registration_full_address' . $status]) ?>
    </div>
    <div class="border p-2 my-2">
        <h3>AdditionalInfo</h3>
        <?= $form->field($model, 'additional_info', ['options' => ['class' => 'col']])->textarea(['id' => 'citizen-additional_info' . $status]) ?>
    </div>
    <div class="row my-4">
        <div class="form-group pe-1 col">
            <input type="button" value="Append" id="form-submit<?= $status ?>"class="btn btn-success col-12">

        </div>
        <div class="form-group ps-1 col">
        <span class="btn btn-primary col-12" onclick="$('#stepBtn<?= $status + 2 ?>').click()">
            <?=Yii::t('main', 'Дальше')?>
        </span>
        </div>

    </div>
<?php ActiveForm::end(); ?>
<div id="citizen-table<?=$status?>">
    <?= $this->renderAjax('citizen_table', ['appeal_id'=>$appeal_id,'status'=>$status]);?>
</div>
<?php
$url = Url::to(['citizen/create']);
$urlDistrictDropdownC = Url::to(['/appeal/district']);
$script = <<< JS
$( document ).ready(function() {

    District{$status}();
    DistrictR{$status}();

    $('#citizen-current_region$status').on('change', function (){
        District{$status}($(this).val());
    });
    $('#citizen-registration_region$status').on('change', function (){
        DistrictR{$status}($(this).val());
    });

    function District{$status}(region=1){
        $.ajax({
            url: '$urlDistrictDropdownC',
            data: {
                region: region,
            },
            success: function(result) {
                $('#citizen-current_district$status').empty();
                $('#citizen-current_district$status').html(result);
                $('#citizen-current_district$status').val($model->current_district);
            }
        });
        return false;
    }
    function DistrictR{$status}(regionR=1){
        $.ajax({
            url: '$urlDistrictDropdownC',
            data: {
                region: regionR,
            },
            success: function(result) {
                $('#citizen-registration_district$status').empty();
                $('#citizen-registration_district$status').html(result);
                $('#citizen-registration_district$status').val($model->registration_district);
            }
        });
        return false;
    }
    $('#form-submit$status').click(function (){
        var form = $('#form-citizen$status');    
        var formData = form.serialize();
    
        $.ajax({
            url: '$url',
            type: 'post',
            data: formData,
    
            success: function(result) {
                if(result != 'xato'){
                    $('#citizen-table$status').html(result);
                    form.trigger("reset");                 
                }
                else alert('* to‘ldirish shart!')
            }
            
        });  
        return false;
    });
});

JS;
$this->registerJs($script);
?>