<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "http://fonts.googleapis.com/css?family=Montserrat:400,700",
        "http://fonts.googleapis.com/css?family=Roboto:300,400,700,400italic,700italic&amp;subset=latin,vietnamese",
        //build:css css/bootstrap.css
        "css/bootstrap.css",
        //build:css css/plugins.css
        "css/awe-icon.css?2",
        "css/font-awesome.css",
        "css/magnific-popup.css",
        "css/owl.carousel.css",
        "css/awemenu.css",
        "css/swiper.css",
        "css/easyzoom.css",
        "css/nanoscroller.css",
        //build:css css/styles.css
        "css/awe-background.css?8",
        "css/main.css?24",
        "css/docs.css",
    ];
    public $js = [
        //build:js js/vendor.js
        "js/vendor/modernizr-2.8.3.min.js",
        "js/vendor/jquery-1.11.3.min.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
