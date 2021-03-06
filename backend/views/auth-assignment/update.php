<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AuthAssignment */

$this->title = Yii::t('main', 'Update Auth Assignment: {name}', [
    'name' => $model->item_name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Auth Assignments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->item_name, 'url' => ['view', 'item_name' => $model->item_name, 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = Yii::t('main', 'Обновить');
?>
<div class="auth-assignment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
