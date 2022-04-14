<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'theme/vendors/iconly/bold.css',
        'theme/vendors/bootstrap-icons/bootstrap-icons.css',
        'theme/css/bootstrap.css',
        'theme/css/pages/auth.css',
        'theme/css/pages/email.css',
        'theme/css/fileinput.css',
        'theme/css/app.css',
        'css/site.css',
    ];
    public $js = [
//        'theme/js/jquery.js',
        'theme/vendors/perfect-scrollbar/perfect-scrollbar.min.js',
        'theme/js/bootstrap.bundle.min.js',
        'theme/js/pages/horizontal-layout.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];
}
