<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\GallerySection */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gallery-section-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'status')->radioList(
        [
            '0' => 'Aktivmas',
            '1' => 'Aktiv'
        ],
        [
            'item' => function ($index, $label, $name, $checked, $value) {
                $class_btn = 'btn-info'; // Style for disable
                return
                    '<label class="btn '. $class_btn.'">' . Html::radio($name, $checked, ['value' => $value]) . $label . '</label>';
            },
            'class' => 'btn-group', "data-toggle"=>"buttons", // Bootstrap class for Button Group
        ]
    )->label(false);?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('main', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
