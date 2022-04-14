<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Appeal */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Appeals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="appeal-view">

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



</div>
