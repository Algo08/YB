<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<?php echo app\components\Slider::widget()?>

<!-- About Section -->
<?php echo app\components\About::widget()?>
<!-- End About item -->

<!-- Cource Section -->
<?php echo app\components\Cource::widget()?>
<!-- End Cource Section -->

<?php echo app\components\Contact::widget()?>

<!-- Fact box Section -->
<div class="container-counter-box">
   <div class="container">
      <div class="row">
         <div class="col-md-3">
            <div class="counter-box wow fadeInUp">
               <i class="ion-ios-heart-outline"> </i>
               <div class="counter-number"> 312 </div>
               <div class="counter-title"> Pizzas Ordered</div>
            </div>
         </div>
         <div class="col-md-3">
            <div class="counter-box wow fadeInUp" data-wow-delay=".2s">
               <i class="ion-ios-wineglass-outline"> </i>
               <div class="counter-number"> 810 </div>
               <div class="counter-title"> Happy Clients </div>
            </div>
         </div>
         <div class="col-md-3">
            <div class="counter-box wow fadeInUp" data-wow-delay=".4s">
               <i class="ion-ios-paw-outline"> </i>
               <div class="counter-number"> 980 </div>
               <div class="counter-title"> Projects Completed</div>
            </div>
         </div>
         <div class="col-md-3">
            <div class="counter-box wow fadeInUp" data-wow-delay=".6s">
               <i class="ion-ios-flame-outline"> </i>
               <div class="counter-number"> 600 </div>
               <div class="counter-title">Comments Reserved</div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- End Fact box Section -->

