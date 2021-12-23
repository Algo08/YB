<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<?php echo app\components\Slider::widget()?>

<!-- About Section -->
<?php echo app\components\About::widget()?>
<!-- End About item -->

<!-- Cource Section -->
<?/**php echo app\components\Cource::widget()**/?>
<!-- End Cource Section -->

<?php echo app\components\Opinion::widget()?>
<?php echo app\components\Gallery::widget()?>

<?php echo app\components\Video::widget()?>

<?php echo app\components\Contact::widget()?>

<!-- Fact box Section -->
<?php echo app\components\Statistics::widget()?>

<!-- End Fact box Section -->

