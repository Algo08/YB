<?php
/**
 * @var \common\models\Slider[] $sliders
 */
?>

<!-- Slider -->
<div class="slider-wrapper">
    <div class="fr-slider">
        <div class="fs_loader"></div>
        <?php foreach ($sliders as $key => $slide):?>
        <div class="slide">
            <img data-fixed class="slide-bg" src="<?=\yii\helpers\Url::to('@web'.$slide->image_location)?>" alt="Slide">
            <div class="head-words d-flex align-items-center h-100 col-12">
                <div>
                    <h1 class="col-12"><?=$slide->head_text?></h1>
                    <h4 class="col-12"><?=$slide->part_text?></h4>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>
<!-- End Slider -->