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
class MyAppAsset extends AssetBundle
{
    public $jsOptions = array(
        'position' => \yii\web\View::POS_END
    );
    public $js = [
        "http://maps.google.com/maps/api/js?sensor=true",
        "js/vendor/jquery-ui.min.js",
        //build:js js/plugins.js
        "js/plugins/bootstrap.min.js",
        "js/plugins/awemenu.min.js?1",
        "js/plugins/headroom.min.js",
        "js/plugins/hideshowpassword.min.js",
        "js/plugins/jquery.parallax-1.1.3.min.js",
        "js/plugins/jquery.magnific-popup.min.js",
        "js/plugins/jquery.nanoscroller.min.js",
        "js/plugins/swiper.min.js",
        "js/plugins/owl.carousel.min.js",
        "js/plugins/jquery.countdown.min.js",
        "js/plugins/easyzoom.js",
        "js/plugins/masonry.pkgd.min.js",
        "js/plugins/isotope.pkgd.min.js",
        "js/plugins/imagesloaded.pkgd.min.js",
        "js/plugins/gmaps.min.js",
        //build:js js/main.js
        "js/awe/awe-carousel-branch.js",
        "js/awe/awe-carousel-blog.js",
        "js/awe/awe-carousel-products.js",
        "js/awe/awe-carousel-testimonial.js",
        "js/awe-hosoren.js",
        "js/main.js?4",
        //build:js js/docs.js
        "js/plugins/list.min.js",
        "js/docs.js",
    ];
}
