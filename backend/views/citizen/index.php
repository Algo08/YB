<?php
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $tittle string */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = $tittle;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appeal-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "{items}\n{pager}",
        'options'=>[
            'class'=> 'table-responsive',
        ],
        'tableOptions' => ['class' => 'table table-lg'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'lastname',
            'firstname',
            'pASSPORT.passport',
            'pASSPORT.PINFL',
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
