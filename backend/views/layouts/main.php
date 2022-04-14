<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?=Url::to('@web/../frontend/web/theme/img/logo-alt.png')?>" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap"
        rel="stylesheet" />
    <script src="/project/theme/js/jquery.js"></script>

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>

<body id="page-top">
    <?php $this->beginBody() ?>

    <div id="app">
        <div id="main" class="layout-horizontal">

            <!-- Sidebar -->
            <?php echo app\components\Sidebar::widget()?>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div  class="content-wrapper container">
                <!-- Main Content -->
                <div id="content">
                    <!-- Begin Page Content -->
                    
                    <nav aria-label="breadcrumb">
                        <?= Breadcrumbs::widget([
                            'tag'=>'ol',
                            'options'=>[
                                'class' => 'breadcrumb'
                            ],
                            'itemTemplate'=>'<li class="breadcrumb-item">{link}</li>',
                            'activeItemTemplate'=>'<li class="breadcrumb-item active">{link}</li>',
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]) ?>
                    </nav>
                    <?= Alert::widget() ?>
                    <?= $content ?>
                    <!-- End of Page Content -->
                </div>
            </div>
        </div>
    </div>

    <?php $this->endBody() ?>

</body>

</html>
<?php $this->endPage() ?>