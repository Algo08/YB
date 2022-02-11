<?php
/* @var $galleries \common\models\Gallery[] */
/* @var $sections \common\models\GallerySection[] */

?>
<!-- Portfolio Section -->
<div class="container-about-portfolio">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h3 class="title-un">OUR LATEST WORKS</h3>
            <div class="title-un-icon"><i class="fa ion-ios-heart-outline"></i></div>
            <p class="title-un-des">Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, </p>
         </div>
      </div>
   </div>
</div>
<div id="gallery-section" class="gallery-portfolio-container">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <nav class="port-filter m-port-filter">
               <ul>
                  <?php foreach ($sections as $key => $section):?>
                     <li class="<?= $key==0 ? 'active' : ''?>">
                        <a href="#" data-filter="<?= $key==0 ? '*' : '.'.$section->id?>"><?=$section->name?></a>
                     </li>
                  <?php endforeach;?>
               </ul>
            </nav>
            <div id="gallery" class="classic-portfolio col-3-portfolio portfolio gallery-portfolio shortc-mp">
               <?php foreach ($galleries as $key => $gallery):?>
                  <div class="project-item <?=str_replace(',',' ',$gallery->section)?>">
                        <img class="gallery-img" src="<?=\yii\helpers\Url::to('@web'.$gallery->image_location)?>" alt="">
                        <a href="#lightbox-<?=$key?>"><?=$gallery->name?></a>
                  </div>
               <?php endforeach;?>
            </div>
            <?php foreach ($galleries as $key => $gallery):?>
               <div class="lightbox" id="lightbox-<?=$key?>">
                  <div class="content">
                     <img src="<?=\yii\helpers\Url::to('@web'.$gallery->image_location)?>" />
                     <div class="title"><?=$gallery->name?></div>
                     <a class="close" href="#gallery-section"></a>
                  </div>
               </div>
               <?php endforeach;?>
         </div>
      </div>
   </div>
</div>
<!-- End Portfolio Section -->