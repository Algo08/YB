<?php

use dosamigos\multiselect\MultiSelect;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gallery-form">


    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Uz</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="rasm-tab" data-toggle="tab" href="#rasm" role="tab" aria-controls="rasm" aria-selected="false">Rasm</a>
        </li>
    </ul>

    <?php $form = ActiveForm::begin(); ?>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <?= $form->field($model, 'name_uz')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>
            
            <?= $form->field($model, 'sections[]')->widget(MultiSelect::className(),[
                'id'=>"multiXX",
                'data' => $model->CategoryDropdown,
                'name' => 'multti', // name for the form
                "options" => [
                    'multiple'=>"multiple", 
                ],
                'value' => $model->sections,
                'name' => 'multti',
                "clientOptions" =>[
                    'numberDisplayed' => 2,
                    'nonSelectedText' => $model->sectionsName ?? 'Tanlang'
                ],
            ]) ?>
            
        </div>
        <div class="tab-pane fade" id="rasm" role="tabpanel" aria-labelledby="rasm-tab">
            <div class="text-center mt-3">
                <?=$form->field($model, 'imageFile')
                    ->fileInput()
                    ->label(false);?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('main', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
