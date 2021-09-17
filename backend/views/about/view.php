<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\About */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Abouts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="about-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('main', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('main', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('main', 'Are you sure you want to delete this item?'),
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
            'part_text_uz',
            'part_text_ru',
            'part_text_en',
            'main_text_uz:raw',
            'main_text_ru:raw',
            'main_text_en:raw',
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
