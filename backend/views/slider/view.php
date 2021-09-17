<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\slider */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sliders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="slider-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'head_text_uz',
            'head_text_ru',
            'head_text_en',
            'part_text_uz:ntext',
            'part_text_ru',
            'part_text_en',
            [
                'attribute' => 'rasm',
                'format' => 'html',
                'contentOptions'=>['class'=> 'text-center', 'style'=>'width: 80%'],
                'value' => function ($data) {
                    return Html::img(Yii::getAlias('@web').'/..'. $data['image_location'],
                        ['width' => '100px', 'style'=>['background-color'=>'#393939']]);
                },
            ],
        ],
    ]) ?>

</div>
