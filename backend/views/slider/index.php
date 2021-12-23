<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sliders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Slider', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'options'=>[
            'class'=>'table-responsive'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'head_text_uz',
            'head_text_ru',
            'head_text_en',
            'part_text_uz',
            [
                'attribute' => 'rasm',
                'format' => 'html',
                'contentOptions'=>['class'=> 'text-center', 'style'=>'width: 220px'],
                'value' => function ($data) {
                    return Html::img(Yii::getAlias('@web').'/..'. $data['image_location'],
                        ['width' => '100px', 'style'=>['background-color'=>'#393939']]);
                },
            ],
            //'part_text_ru',
            //'part_text_en',
            //'image_location',

            ['class' => 'yii\grid\ActionColumn',
                'contentOptions'=>['class'=> 'text-center', 'style'=>'width: 160px'],
                'buttons'=>[
                    'view'=>function ($url, $model) {
                        return Html::a('<i class="fa fa-eye mx-1"></i>',\yii\helpers\Url::to(['view','id'=>$model->id]),
                            ['class' => 'view btn btn-info btn-circle btn-sm']);
                    },
                    'update'=>function ($url, $model) {
                        return Html::a( '<i class="fa fa-pencil-alt mx-1"></i>',\yii\helpers\Url::to(['update','id'=>$model->id]),
                            ['class' => 'update btn btn-warning btn-circle btn-sm'] );
                    },
                    'delete'=>function ($url, $model) {
                        return Html::a( '<i class="fa fa-trash mx-1"></i>',\yii\helpers\Url::to(['delete','id'=>$model->id]),
                            ['class' => 'delete btn btn-danger btn-circle btn-sm', 'data-key'=>$model->id,
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ] );
                    }
                ],
            ],
        ],
    ]); ?>


</div>
