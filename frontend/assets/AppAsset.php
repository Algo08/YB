<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'theme/css/style.css',
        'theme/css/ionicons.min.css',
        'css/site.css',
        'theme/css/animate.css',
        ];
    public $js = [
        'theme/js/superfish.js',
        'theme/js/wow.js',
        'theme/js/owl.carousel.min.js',
        'theme/js/jflickrfeed.min.js',
        'theme/js/jquery.fractionslider.min.js',
        'theme/js/jquery.isotope.min.js',
        'theme/js/jquery.fitvids.js',
        'theme/js/jquery-ui-1.10.4.custom.min.js',
        'theme/js/jquery.magnific-popup.js',
        'theme/js/main.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
