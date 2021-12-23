<?php
/* @var $galleries \common\models\Videos[] */

?>
<!-- Portfolio Section -->
<div class="container-about-portfolio">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h3 class="title-un">OUR LATEST WORKS</h3>
            <div class="title-un-icon"><i class="fa ion-ios-heart-outline"></i></div>
            <p class="title-un-des">Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit
               lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in
               vulputate velit esse molestie consequat, </p>
         </div>
         <div class="content col-12">
            <div class="video-gallery">
               <?php foreach ($videos as $key => $video):?>
               <div class="gallery-item">
                  <img src="<?=\yii\helpers\Url::to('@web').$video->image_location?>"
                     alt="North Cascades National Park" />
                  <div class="gallery-item-caption">
                     <div>
                        <h2>Video</h2>
                        <p><?=$video->text?></p>
                     </div>
                     <a class="vimeo-popup" href="<?=$video->video_url?>"></a>
                  </div>
               </div>
               <?php endforeach;?>
               <div class="clearfix"></div>
            </div>
         </div>
      </div>
   </div>
</div>