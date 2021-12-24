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
                           <img src="<?=\yii\helpers\Url::to('@web/img/logo.png')?>?>" alt="Enfold">
                        </a>
                     </div>
                     <nav id="nav-wrap" class="main-nav">
                        <div id="mobnav-btn"> </div>
                        <?php 
                           $menuItems = [
                              ['label' => Yii::t('main', 'Bosh sahifa'), 'url' => ['/#']],
                              ['label' => Yii::t('main', 'Biz haqimizda'), 'url' => ['/#about']],
                              ['label' => Yii::t('main', 'Aloqa'), 'url' => ['/#contact']],
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
      <?php echo app\components\Footer::widget()?>
      <!-- End Footer -->
   </div>
   <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();