<?php


/* @var $this yii\web\View */
/* @var $model common\models\Citizen */

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;
$this->title = $model->full_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Citizen'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalCenterTitle"><?= Html::encode($this->title) ?>
    </h5>
    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <i data-feather="x"></i>
    </button>
</div>
<div class="appeal-view modal-body">

    <?= DetailView::widget([
        'model' => $model,
        'options'=>[
            'class'=> 'table table-lg',
        ],
        'attributes' => [
            'lastname',
            'firstname',
            'middlename',
            'birth_date',
            'pASSPORT.passport',
            'pASSPORT.PINFL',

            [
                'attribute' => 'current_country',
                'filter'=>Yii::$app->params['country'],
                'value' => function ($data) {
                    return Yii::$app->params['country'][$data['current_country']];
                },
            ],
            [
                'attribute'=>'current_region',
                'filter'=>ArrayHelper::map(\common\models\Region::find()->asArray()->all(), 'id', 'name_ru'),
                'value' => function ($data) {
                    return $data['cURRENTREGION']['name_ru'];
                },
            ],
            [
                'attribute'=>'current_district',
                'filter'=>ArrayHelper::map(\common\models\District::find()->asArray()->all(), 'id', 'name_ru'),
                'value' => function ($data) {
                    return $data['cURRENTDISTRICT']['name_ru'];
                },
            ]
        ],
    ]) ?>
</div>
