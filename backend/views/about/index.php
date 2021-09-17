<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('main', 'Abouts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="about-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('main', 'Create About'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
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
            //'main_text_uz:ntext',
            //'main_text_ru:ntext',
            //'main_text_en:ntext',
            //'image_location',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
