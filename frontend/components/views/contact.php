<?php 
/**
 * @var \common\models\Contact $model
 */
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use borales\extensions\phoneInput\PhoneInput;

?>
<div class="container-newsletter" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title-un"><?=Yii::t('main', 'Aloqa')?></h3>
                <div class="title-un-icon"><i class="fa ion-ios-contact"></i></div>
                <p class="title-un-des">Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit
                    lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in
                    vulputate velit esse molestie consequat, </p>
                <?php $form = ActiveForm::begin(['action' => ['site/contact'],'id'=>'contact-form']); ?>
                <?= $form->field($model, 'full_name',['options'=>
                        ['class'=>'newsletter-container wow fadeInUp']])
                    ->textInput(['maxlength' => true,'class'=>'newsletter-field',
                    'placeholder'=>$model->getAttributeLabel( 'full_name' )])->label(false) ?>

                <?= $form->field($model, 'number',['options'=>
                        ['class'=>'newsletter-container wow fadeInUp']])
                    ->widget(PhoneInput::className(), [
                        'defaultOptions'=>[
                            'class'=>'newsletter-field'
                        ],
                        'jsOptions' => [
                            'allowExtensions' => false,
                            'onlyCountries' => ['uz'],
                            'nationalMode' => false
                        ]
                    ])->label(false)?>

                <?= $form->field($model, 'email',['options'=>
                        ['class'=>'newsletter-container wow fadeInUp']])
                    ->textInput(['maxlength' => true,'class'=>'newsletter-field',
                    'placeholder'=>$model->getAttributeLabel( 'email' )])->label(false) ?>

                <?= $form->field($model, 'text',['options'=>
                        ['class'=>'newsletter-container wow fadeInUp']])
                    ->textarea(['maxlength' => true,'class'=>'newsletter-field',
                    'placeholder'=>$model->getAttributeLabel( 'text' )])->label(false) ?>

                <div class="newsletter-container wow fadeInUp">
                    <?= Html::submitButton(Yii::t('main', 'Yuborish'), ['class' => 'button green-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>