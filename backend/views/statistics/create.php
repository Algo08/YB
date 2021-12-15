<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Statistics */

$this->title = Yii::t('main', 'Create Statistics');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Statistics'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statistics-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
