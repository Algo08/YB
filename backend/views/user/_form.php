<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(['options'=>['id'=>'userForm','class'=>'form']]); ?>
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalCenterTitle"><?=Yii::t('main','Профили')?>
    </h5>
    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <i data-feather="x"></i>
    </button>
</div>
<div class="modal-body">
    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'middlename')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'organization')->dropDownList(ArrayHelper::map(\common\models\Organization::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'group')->dropDownList(ArrayHelper::map(\common\models\Group::find()->all(), 'id', 'name')) ?>
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'password')->passwordInput(['placeholder'=>Yii::t('main','Parol')])->label(false)?>
    <?= $form->field($model, 'repeat_password')->passwordInput(['placeholder'=>Yii::t('main','Parolni qaytaring')])->label(false)?>
</div>
<div class="modal-footer form-group">
    <?= Html::submitButton(Yii::t('main','Сохранять'), ['class' => 'btn btn-primary me-1 mb-1']) ?>
    <button type="reset" class="btn btn-light-secondary me-1 mb-1"><?=Yii::t('main','Сброс')?></button>
</div>
<?php ActiveForm::end(); ?>