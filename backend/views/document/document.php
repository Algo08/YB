<?php
/* @var $model common\models\Document */
/* @var $appeal_id int */

use kartik\file\FileInput;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$model = new \common\models\Document();

?>

<?php $form = ActiveForm::begin(['id' => 'form-document','enableAjaxValidation' => false, 'options'=>['enctype'=>'multipart/form-data']]); ?>
    <?= $form->field($model, 'appeal_id')->hiddenInput(['value'=>$appeal_id])->label(false) ?>

    <?= $form->field($model, 'description')->textarea() ?>

    <?= $form->field($model, 'file[]')->widget(FileInput::classname(), [
        'options' => ['multiple'=>true],
        'pluginOptions' => ['previewFileType' => 'any', 'uploadUrl' => Url::to(['/document/file-upload','appeal_id'=>$appeal_id, 'description'=>$model->description])]
    ])->label(false) ?>
<?php ActiveForm::end(); ?>
<div id="document-table">
    <?= $this->renderAjax('document_table', ['appeal_id'=>$appeal_id]);?>
</div>
<?php
$url = Url::to(['/document/index']);
$script = <<< JS
    $('.fileinput-upload.fileinput-upload-button').click(function (){
       setTimeout(function() {
            $.ajax({
                url: '$url',
                data: {
                    appeal_id: $appeal_id,
                },
                success: function(result) {
                    $('#document-table').html(result);
                }
            });
       }, 2000);
    });
JS;
$this->registerJs( $script );
?>