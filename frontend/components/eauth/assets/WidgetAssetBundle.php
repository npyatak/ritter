<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\components\eauth\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class WidgetAssetBundle extends AssetBundle
{
	public $sourcePath = '@eauth/assets';
	public $css = [
		'css/eauth.css',
	];
	public $js = [
		'js/eauth.js',
	];
	public $depends = [
		'yii\web\JqueryAsset',
	];
}
