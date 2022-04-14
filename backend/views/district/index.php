<?php

/* @var $this yii\web\View */
/* @var $models \common\models\Region */

use yii\helpers\Html;
use yii\helpers\Url;
$this->title = Yii::t('main', 'Regions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="region-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="accordion" id="accordionExample">
        <?php foreach ($models as $key => $model):?>
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading<?=$key?>">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse<?=$key?>" aria-expanded="false" aria-controls="collapse<?=$key?>">
                    <?=$model->name_ru?>
                    <span class="badge bg-light text-secondary ms-2 p-2"><?=$model->cOUNT?></span>
                    <a class="btn btn-sm btn-outline-success ms-2 px-3 modalBtn" data-bs-toggle="modal"
                        data-bs-target="#exampleModalCenter" data-region="<?=$model->id?>">add</a>
                </button>
            </h2>
            <div id="collapse<?=$key?>" class="accordion-collapse collapse" aria-labelledby="heading<?=$key?>"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>NAME</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($model->dISTRICT as $key => $region):?>
                                <tr>
                                    <td class="text-bold-500"><?=$region->name_ru?></td>
                                    <td class="text-bold-500">
                                        <a class="btn btn-outline-warning modalBtn" 
                                            data-bs-toggle="modal"
                                            data-bs-target="#exampleModalCenter" data-key="<?=$region->id?>">edit</a>
                                        <?=Html::a( 'Delete',\yii\helpers\Url::to(['delete','id'=>$region->id]),
                                        ['class' => 'btn btn-outline-danger',
                                            'data' => [
                                                'confirm' => Yii::t('main','Вы уверены, что хотите удалить этот элемент?'),
                                                'method' => 'post',
                                            ],
                                        ] );?>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>

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
            var region = $(this).data('region');
            var district = $(this).data('key');
            $.ajax({
                url: '$url',
                data: {
                    region: region,
                    district: district
                },
                success: function(result) {
                modal.html(result);
                }
            });     
        });
JS;
$this->registerJs( $script );
?>