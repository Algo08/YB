<?php
/* @var $this yii\web\View */

$this->title = $about->head_text;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <p>
        <?=$about->main_text?>
    </p>
</div>