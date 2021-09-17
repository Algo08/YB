<?php

/* @var $this \yii\web\View */
/* @var $content string */

use cinghie\multilanguage\widgets\MultiLanguageWidget;
use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
   <meta charset="<?= Yii::$app->charset ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <?php $this->registerCsrfMetaTags() ?>
   <title><?= Html::encode($this->title) ?></title>
   <?php $this->head() ?>
</head>

<body class="box-layout">
   <!-- Page Loader -->
   <div class="page-loader">
      <div class="loader">
         <span class="cssload-loading"></span>
      </div>
   </div>
   <!-- End Page Loader -->
   <?php $this->beginBody() ?>
   <div class="inner-conterner">

      <header>
         <div class="header-inner">
            <!-- navigation panel -->
            <div class="container">
               <div class="row">
                  <div class="header-table col-md-12">
                     <div class="brand">
                        <a href="<?=Yii::$app->homeUrl?>">
                           <img src="<?=Yii::$app->homeUrl.'/img/logo.png'?>" alt="Enfold">
                        </a>
                     </div>
                     <nav id="nav-wrap" class="main-nav">
                        <div id="mobnav-btn"> </div>
                        <?php 
                           $menuItems = [
                              ['label' => 'Home', 'url' => ['/']],
                              ['label' => 'About', 'url' => ['#about']],
                              ['label' => 'Contact', 'url' => ['/site/contact']],
                           ];
                           $menuItems[] =
                              '<li class="nav-item">'.
                                    MultiLanguageWidget::widget([
                                             'addCurrentLang' => true, // add current lang
                                             'calling_controller' => $this->context,
                                             'image_type' => 'classic', // classic or rounded
                                             'link_home' => false, // true or false
                                             'widget_type' => 'classic', // classic or selector
                                             'width' => '20'
                                          ]).
                              '.</li>';
                           echo Nav::widget([
                              'options' => ['class' => 'sf-menu row justify-content-end'],
                              'items' => $menuItems,
                           ]);?>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>

      <main role="main" class="flex-shrink-0">
         <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
         <?= Alert::widget() ?>
         <?= $content ?>
      </main>


      <!-- Footer area -->
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
                     <div> <i class="ion-ios-location-outline"></i> Moonshine St. 14/05 Light City
                        <br>
                        <i class="ion-ios-telephone-outline"></i> 00 (123) 456 78 90
                        <br>
                        <i class="ion-paper-airplane"></i> <a href="first.last@email.com"> first.last@email.com</a>
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="footer-widget widget_nav_menu">
                     <h4 class="footer-widget-title">LINKS</h4>
                     <ul>
                        <li class="menu-item"><a href="#"> Brand Creation </a></li>
                        <li class="menu-item"><a href="#"> Press inquiries</a></li>
                        <li class="menu-item"><a href="#"> Corporate Identity </a></li>
                        <li class="menu-item"><a href="#"> Company Analysis </a></li>
                        <li class="menu-item"><a href="#"> Creative homepage </a></li>
                     </ul>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="footer-widget">
                     <h4 class="footer-widget-title">Flickr stream</h4>
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
                     <p>© Copyright 2016 | <a href="#" target="_blank">Template Stock</a></p>
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
      <!-- End Footer -->
   </div>
   <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();