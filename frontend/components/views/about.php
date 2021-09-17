<?php
/**
 * @var \common\models\About[] $about
 */
?>

<div id="about" class="container-about">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title-un">WHO WE ARE</h3>
                <div class="title-un-icon"><i class="fa ion-ios-flame-outline"></i></div>
                <p class="title-un-des">Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit
                    lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in
                    vulputate velit esse molestie consequat, </p>
            </div>
        </div>
        <div class="row">
            <?php foreach ($about as $key => $a):?>
            <div class="col-md-4">
                <!-- Service item -->
                <div class="service-box-sb wow fadeInUp">
                    <div class="service-img">
                        <img class="w-100" src="<?=\yii\helpers\Url::to('@web'.$a->image_location)?>" alt="Enfold">
                    </div>
                    <div class="service-info">
                        <h5><?=$a->head_text?></h5>
                        <div class="desc">
                            <?=$a->part_text?>
                            <a class="see-more" href="<?=\yii\helpers\Url::to(['about/index','id'=>$a->id])?>">
                                <?=Yii::t('main', 'Batafsil')?> &rarr;
                                <div class="line"></div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Service item -->
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>