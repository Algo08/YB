<div class="footer-area-container">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="footer-widget">
                    <a href="index.html"><img class="footer-logo" src="<?=Yii::$app->homeUrl.'/img/logo.png'?>"
                            alt="Enfold"></a>
                    <p>Dow wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl.
                        Duis autem vel eum iriure dolor in hendrerit.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-widget widget_nav_menu">
                    <h4 class="footer-widget-title">Get In Touch</h4>
                    <p>Caecenas wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis
                        nisl.</p>
                    <div> <i class="ion-ios-location-outline"></i> <?=$address->address?>
                        <br>
                        <i class="ion-ios-telephone-outline"></i> <?=$address->phone?>
                        <br>
                        <i class="ion-paper-airplane"></i> <a href="mailto:<?=$address->email?>"><?=$address->email?>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="footer-widget widget_nav_menu">
                    <h4 class="footer-widget-title"><?=Yii::t('main', 'Manzil')?></h4>
                        <?=$address->location?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Footer area -->
<!-- Footer -->
<div class="footer-holder">
    <div class="container">
        <footer class="site-footer">
            <div class="row">
                <div class="col-md-6">
                    <p>© Visit 2021 | <a href="#" target="_blank"><?=Yii::t('main', 'Barcha huquqlar himoyalangan!');?></a></p>
                </div>
                <div class="col-md-6">
                    <ul class="footer-nav">
                        <li><a href="#">Support</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Terms</a></li>
                        <li><a href="#">Privacy</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>