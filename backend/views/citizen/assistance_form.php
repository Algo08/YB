<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Assistance */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(['id' => 'assistanceForm', 'enableClientValidation'=>true, 'enableAjaxValidation' => false, 'action' => Url::to(['/citizen/assistance-create'])]); ?>
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalCenterTitle"><?=Yii::t('main','Предоставление помощи')?>
    </h5>
    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <i data-feather="x"></i>
    </button>
</div>
<div class="modal-body">
    <?= $form->field($model, 'victim_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'type',['options'=>['class'=>'col']])->dropDownList(Yii::$app->params['assistance_type']) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
</div>
<div class="modal-footer form-group">
    <input type="button" value="Save" id="form-submit-assistance"class="btn btn-success col-12" data-bs-dismiss="modal" aria-label="Close">
</div>
<?php ActiveForm::end(); ?>

<?php
$url = Url::to(['citizen/assistance-create']);
$script = <<< JS
$( document ).ready(function() {
    
    $('#form-submit-assistance').click(function (){
        var form = $('#assistanceForm');    
        var formData = form.serialize();
    
        $.ajax({
            url: '$url',
            type: 'post',
            data: formData,
    
            success: function(result) {
                if(result != 'xato'){
                    $('#assistance_form').html(result);
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