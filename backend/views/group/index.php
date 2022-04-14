<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('main','Группа');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <span data-key="" class="btn btn-primary me-1 mb-1 modalBtn" data-bs-toggle="modal"
            data-bs-target="#exampleModalCenter">
            <?=Yii::t('main','Создать группа')?>
        </span>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "{items}\n{pager}",
        'options'=>[
            'class'=> 'table-responsive',
        ],
        'tableOptions' => ['class' => 'table table-lg'],

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{update} {delete}',
                'contentOptions'=>['class'=> 'text-center', 'style'=>'width: 160px'],
                'buttons'=>[
                    'update'=>function ($url, $model) {
                        return Html::a( '<i class="bi bi-pencil-fill mx-1"></i>','javascript:0',
                            ['class' => 'update modalBtn', 'data-key'=>$model->id, 'data-bs-toggle'=>'modal',
                                'data-bs-target'=>'#exampleModalCenter'] );
                    },
                    'delete'=>function ($url, $model) {
                        return Html::a( '<i class="bi bi-trash-fill mx-1"></i>',\yii\helpers\Url::to(['delete','id'=>$model->id]),
                            ['class' => 'delete', 'data-key'=>$model->id,
                                'data' => [
                                    'confirm' => Yii::t('main','Вы уверены, что хотите удалить этот элемент?'),
                                    'method' => 'post',
                                ],
                            ] );
                    }
                ],
            ],
        ],
    ]); ?>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-bs-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <img src="<?=Url::to('@web/')?>images/svg-loaders/ball-triangle.svg" class="mx-auto my-5" style="width: 3rem" alt="audio">
            </div>
        </div>
    </div>

</div>

<?php
$url = Url::to(['create']);
$script = <<< JS
    
    var modal = $('.modal-content');
   
        var create = $('.modalBtn');
        create.click(function (){
            console.log('asd');
            var id = $(this).data('key');
            $.ajax({
                url: '$url',
                data: {
                    id: id
                },
                success: function(result) {
                modal.html(result);
                }
            });     
        });
JS;
$this->registerJs( $script );
?>