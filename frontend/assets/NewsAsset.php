<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class NewsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'vendors/mdi/css/materialdesignicons.min.css',
        'vendors/aos/dist/aos.css/aos.css',
        'images/favicon.png',
        'css/style.css'
    ];
    public $js = [
        "vendors/js/vendor.bundle.base.js",
        "vendors/aos/dist/aos.js/aos.js",
        "js/demo.js",
        "js/jquery.easeScroll.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
