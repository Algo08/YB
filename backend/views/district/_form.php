<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Region */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(['options'=>['id'=>'groupForm','class'=>'form']]); ?>
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalCenterTitle">Area
    </h5>
    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <i data-feather="x"></i>
    </button>
</div>
<div class="modal-body">
    <?= $form->field($model, 'name_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>
</div>
<div class="modal-footer form-group">
    <?= Html::submitButton(Yii::t('main','Сохранять'), ['class' => 'btn btn-primary me-1 mb-1']) ?>
    <button type="reset" class="btn btn-light-secondary me-1 mb-1"><?=Yii::t('main','Сброс')?></button>
</div>
<?php ActiveForm::end(); ?>
