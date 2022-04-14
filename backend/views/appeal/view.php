<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Appeal */

$this->title = Yii::t('main', 'Обращения');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Appeals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appeal-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'options'=>[
            'class'=> 'table table-lg',
        ],
        'attributes' => [
            'id',
            'date',
            'oRGANIZATION.name',
            [
                'attribute' => 'cryme_type',
                'filter'=>Yii::$app->params['cryme_type'],
                'value' => function ($data) {
                    return Yii::$app->params['cryme_type'][$data['cryme_type']];
                },
            ],
            [
                'attribute' => 'country',
                'filter'=>Yii::$app->params['country'],
                'value' => function ($data) {
                    return Yii::$app->params['country'][$data['country']];
                },
            ],
            [
                'attribute'=>'region',
                'filter'=>ArrayHelper::map(\common\models\Region::find()->asArray()->all(), 'id', 'name_ru'),
                'value' => function ($data) {
                    return $data['rEGION']['name_ru'];
                },
            ],
            [
                'attribute'=>'district',
                'filter'=>ArrayHelper::map(\common\models\District::find()->asArray()->all(), 'id', 'name_ru'),
                'value' => function ($data) {
                    return $data['dISTRICT']['name_ru'];
                },
            ],
            [
                'attribute' => 'status',
                'filter'=>Yii::$app->params['status'],
                'value' => function ($data) {
                    return Yii::$app->params['status'][$data['status']];
                },
            ]
        ],
    ]) ?>
    <div class="card">
        <div class="card-header">
            <h4><?=Yii::t('main','Жертвы')?></h4>
        </div>
        <div class="card-content">
            <?= $this->renderAjax('/citizen/citizen_table', ['appeal_id'=>$model->id,'status'=>1]);?>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4><?=Yii::t('main','Правонарушители')?></h4>
        </div>
        <div class="card-content">
            <?= $this->renderAjax('/citizen/citizen_table', ['appeal_id'=>$model->id,'status'=>2]);?>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4><?=Yii::t('main','Прикрепленные документы')?></h4>
        </div>
        <div class="card-content">
            <?= $this->renderAjax('/document/document_table', ['appeal_id'=>$model->id]);?>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4><?=Yii::t('main','История')?></h4>
        </div>
        <div id="assistance_form" class="card-content">
            <?= $this->renderAjax('/citizen/history', ['appeal_id'=>$model->id]);?>
        </div>
    </div>


</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true"  data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content p-2">
            <img src="<?=Url::to('@web/')?>images/svg-loaders/ball-triangle.svg" class="mx-auto my-5" style="width: 3rem" alt="audio">
        </div>
    </div>
</div>


<?php
$urlView = Url::to(['/citizen/view']);
$urlAssistance = Url::to(['/citizen/assistance']);
$script = <<< JS
    
    $('.viewBtn').click(function (){
        var id = $(this).data('key');
        $.ajax({
            url: '$urlView',
            data: {
                id: id,
            },
            success: function(result) {
                $('.modal-content').html(result);
            }
        });
    })
    
    $('.assistanceBtn').click(function (){
        var id = $(this).data('key');
        $.ajax({
            url: '$urlAssistance',
            data: {
                id: id,
            },
            success: function(result) {
                $('.modal-content').html(result);
            }
        });
    })
    
    
JS;
$this->registerJs( $script );
?>