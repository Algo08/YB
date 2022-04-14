<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Appeal;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('main', 'Обращения');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appeal-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('main', 'Создать обращение'), ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "{items}\n{pager}",
        'options'=>[
            'class'=> 'table-responsive',
        ],
        'tableOptions' => ['id'=>'table1','class' => 'table table-lg'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'date',
            [
                'attribute' => 'organization',
                'value' => 'oRGANIZATION.name'
            ],
            [
                'attribute' => 'cryme_type',
                'filter'=>Yii::$app->params['cryme_type'],
                'value' => function ($data) {
                    return Yii::$app->params['cryme_type'][$data['cryme_type']];
                },
            ],
            [
                'attribute' => 'responsible',
                'value' => 'rESPONSIBLE.username'
            ],
            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{view}',
                'contentOptions'=>['class'=> 'text-center', 'style'=>'width: 160px'],
                'buttons'=>[
                    'view'=>function ($url, $model) {
                        return Html::a('<i class="bi bi-eye-fill mx-1"></i>',\yii\helpers\Url::to(['view','id'=>$model->id]),
                            ['class' => 'view']);
                    }
                ],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
</div>