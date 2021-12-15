<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Opinion */

$this->title = Yii::t('main', 'Create Opinion');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Opinions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="opinion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
