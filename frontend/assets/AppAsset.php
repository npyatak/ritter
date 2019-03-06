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
        'css/libs.min.css',
        'css/main.css',
        'css/dropanddrag.css',
    ];
    public $js = [
        'js/libs.min.js',
        'js/jquery.touchSwipe.min.js',
        'js/common.js',
        'js/dropanddrag.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
