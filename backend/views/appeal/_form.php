<?php

/* @var $this yii\web\View */
/* @var $model common\models\Appeal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="steps">
    <progress id="progress" value=0 max=100></progress>
    <div class="step-item">
        <button class="step-button text-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseOne">
            1
        </button>
        <div class="step-title">
            <?=Yii::t('main','Шаг.')?> 1
        </div>
    </div>
    <div class="step-item">
        <button id="stepTwoBtn" class="step-button text-center collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            2
        </button>
        <div class="step-title">
            <?=Yii::t('main','Шаг.')?> 2
        </div>
    </div>
    <div class="step-item">
        <button id="stepBtn3" class="step-button text-center collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            3
        </button>
        <div class="step-title">
            <?=Yii::t('main','Шаг.')?> 3
        </div>
    </div>
    <div class="step-item">
        <button id="stepBtn4" class="step-button text-center collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            4
        </button>
        <div class="step-title">
            <?=Yii::t('main','Шаг.')?> 4
        </div>
    </div>
</div>

<div class="accordion" id="accordionExample">
    <div class="accordion-item">
        <button class="btn btn-step btn-secondary" type="button" data-toggle="collapse"
            data-target="#edit-step1"><span><?=Yii::t('main','Шаг.')?> 1</span><?=Yii::t('main','Информация о заявке')?></button>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
            data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <?= $this->renderAjax('appeal_info', ['model'=>$model]);?>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <button class="btn btn-step btn-secondary" type="button" data-toggle="collapse"
            data-target="#edit-step2"><span><?=Yii::t('main','Шаг.')?> 2</span><?=Yii::t('main','Информация о жертве')?></button>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
            data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <?= $this->renderAjax('/citizen/citizen_info', ['appeal_id'=>$model->id,'status'=>1]);?>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <button class="btn btn-step btn-secondary" type="button" data-toggle="collapse"
            data-target="#edit-step3"><span><?=Yii::t('main','Шаг.')?> 3 </span><?=Yii::t('main','Информация о правонарушителе')?></button>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
            data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <?= $this->renderAjax('/citizen/citizen_info', ['appeal_id'=>$model->id,'status'=>2]);?>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <button class="btn btn-step btn-secondary" type="button" data-toggle="collapse"
            data-target="#edit-step4"><span><?=Yii::t('main','Шаг.')?> 4</span><?=Yii::t('main','Дополнения')?></button>
        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
            data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <?= $this->renderAjax('/document/document', ['appeal_id'=>$model->id]);?>
            </div>
        </div>
    </div>
    <span id="appealBtn" class="btn btn-success my-2 col-12"><?=Yii::t('main','Сохранять')?></span>
</div>
<?php
$url = \yii\helpers\Url::to(['create-new']);
$script = <<< JS


    $('#appealBtn').click(function (){
        
        var form = $('#form-appeal');    
        var formData = form.serialize();
       $.ajax({
            url: '$url',
            type: 'post',
            data: formData,
            success: function(result) {
                
            }
        });
    });
    const stepButtons = document.querySelectorAll('.step-button');  
        const progress = document.querySelector('#progress');

        Array.from(stepButtons).forEach((button,index) => {
            button.addEventListener('click', () => {
                progress.setAttribute('value', index * 100 /(stepButtons.length - 1) );//there are 3 buttons. 2 spaces.

                stepButtons.forEach((item, secindex)=>{
                    if(index > secindex){
                        item.classList.add('done');
                    }
                    if(index < secindex){
                        item.classList.remove('done');
                    }
                })
            })
        });

    if($(".steps-fields").length>0) {
    $(".steps-fields .scroll-to").click(function () {
        $('html, body').animate({
            scrollTop: $('.steps-fields').parent().offset().top
        }, 200);
    });
}
JS;
$this->registerJs( $script );
?>