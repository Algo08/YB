<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\AuthAssignment;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('main', 'Auth Assignments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-assignment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <button data-key="" type="button" class="btn btn-primary me-1 mb-1 modalBtn" data-bs-toggle="modal"
            data-bs-target="#exampleModalCenter">
            Create Auth Assignment
        </button>
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

            'item_name',
            'user_id',
            'created_at',
            ['class' => 'yii\grid\ActionColumn',
                'contentOptions'=>['class'=> 'text-center', 'style'=>'width: 160px'],
                'buttons'=>[
                    'view'=>function ($url, $model) {
                        return Html::a('<i class="bi bi-eye-fill mx-1"></i>',\yii\helpers\Url::to(['view']),
                            ['class' => 'view d-none']);
                    },
                    'update'=>function ($url, $model) {
                        return Html::a( '<i class="bi bi-pencil-fill mx-1"></i>','javascript:0',
                            ['class' => 'update modalBtn d-none', 'data-bs-toggle'=>'modal',
            'data-bs-target'=>'#exampleModalCenter'] );
                    },
                    'delete'=>function ($url, $model) {
                        return Html::a( '<i class="bi bi-trash-fill mx-1"></i>',\yii\helpers\Url::to(['delete', 'item_name'=>$model->item_name, 'user_id'=>$model->user_id]),
                            ['class' => 'delete',
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
            $.ajax({
                url: '$url',
                success: function(result) {
                modal.html(result);
                }
            });     
        });
JS;
$this->registerJs( $script );
?>