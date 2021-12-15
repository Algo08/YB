<div class="container-counter-box">
   <div class="container">
      <div class="row">
         <?php foreach ($statistics as $key => $statistic):?>
        <div class="col-md-3">
            <div class="counter-box wow fadeInUp">
               <i class="<?=$statistic->icon?>"> </i>
               <div class="counter-number"><?=$statistic->count?></div>
               <div class="counter-title"><?=$statistic->name?></div>
            </div>
         </div>
        <?php endforeach;?>
      </div>
   </div>
</div>