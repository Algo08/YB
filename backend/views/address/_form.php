<?php

use borales\extensions\phoneInput\PhoneInput;
use marqu3s\summernote\Summernote;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Contact */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contact-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'address_uz')?>
    <?= $form->field($model, 'address_ru')?>
    <?= $form->field($model, 'address_en')?>

    <?= $form->field($model, 'phone')->widget(PhoneInput::className(), [
        'jsOptions' => [
            'allowExtensions' => true,
            'onlyCountries' => ['uz'],
            'nationalMode' => false
        ]
    ])?>


    <?= $form->field($model, 'location')->widget(Summernote::className(), [
        'clientOptions' => [
        ]
    ])?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
