<?php

/** @var \yii\web\View $this view component instance */
/** @var \yii\mail\MessageInterface $message the message being composed */

?>
<?php $this->beginPage() ?>
<?php $this->beginBody() ?>
<div class="alert alert-primary" role="alert">
    <?= $model->text ?>
</div>
<?php $this->endBody() ?>
<?php $this->endPage() ?>
