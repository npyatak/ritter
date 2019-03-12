<?php
namespace frontend\widgets\share;

use Yii;
use yii\helpers\Url;
use yii\helpers\Html;

class ShareWidget extends \yii\base\Widget 
{

	public $share = [
		'title' => 'Калейдоскоп вкусов и призов от Ritter Sport!',
        'text' => 'Пройди тест и выиграй дорожный рюкзак и другие призы от Ritter Sport!',
		'image' => '/img/share/share_4.png',
	];
	public $showButtons = true;
	public $addClass = '';
	public $image;
	public $location;

    public function init()
    {
		if($this->showButtons) {
        	$this->registerAssets();
        }
    }

    public function run() {
    	$scheme = isset($_SERVER['REQUEST_SCHEME']) ? $_SERVER['REQUEST_SCHEME'] : 'https';

    	if($this->image) {
    		$this->share['image'] = $this->image;
    	} elseif ($this->location) {
    		$this->share['image'] = $this->location->image_share;
    	}

        $this->share['url'] = Url::current(['location_id' => $this->location ? $this->location->id : null], $scheme);
        //$this->share['url'] = Url::toRoute(['site/index'], $scheme);
        $this->share['imageUrl'] = isset($this->share['image']) ? Url::to([$this->share['image']], $scheme) : null;

        $view = $this->getView();
		$view->registerMetaTag(['property' => 'og:description', 'content' => $this->share['text']], 'og:description');
		$view->registerMetaTag(['property' => 'og:title', 'content' => $this->share['title']], 'og:title');
		$view->registerMetaTag(['property' => 'og:url', 'content' => $this->share['url']], 'og:url');
		$view->registerMetaTag(['property' => 'og:type', 'content' => 'website'], 'og:type');
		$view->registerMetaTag(['property' => 'fb:app_id', 'content' => '328584791224962'], 'fb:app_id');
		if(isset($this->share['image']) && $this->share['image']) {
        	$imagePath = __DIR__ . '/../../../frontend/web'.$this->share['image'];
        	if(is_file($imagePath)) {
				$view->registerMetaTag(['property' => 'og:image', 'content' => $this->share['imageUrl']], 'og:image');
				$size = getimagesize($imagePath);
				if(is_array($size)) {
					$view->registerMetaTag(['property' => 'og:image:width', 'content' => $size[0]], 'og:image:width');
					$view->registerMetaTag(['property' => 'og:image:height', 'content' => $size[1]], 'og:image:height');
				}
			}
		}

		if($this->showButtons) {
		    echo Html::a('<i class="fa fa-vk" aria-hidden="true"></i>', '', [
		        'class' => 'social_1 share '.$this->addClass,
		        'data-soc' => 'vk',
		        'data-url' => $this->share['url'],
		        'data-title' => $this->share['title'],
		        'data-image' => $this->share['imageUrl'],
		        'data-text' => $this->share['text'],
		        'data-ga-click' => 'click_share_vk',
		    ]);
			echo Html::a('<i class="fa fa-facebook" aria-hidden="true"></i>', '', [
		        'class' => 'social_1 share '.$this->addClass,
		        'data-soc' => 'fb',
		        'data-url' => $this->share['url'],
		        'data-title' => $this->share['title'],
		        'data-image' => $this->share['imageUrl'],
		        'data-text' => $this->share['text'],
		        'data-ga-click' => 'click_share_fb',
		    ]);
		    echo Html::a('<i class="fa fa-odnoklassniki" aria-hidden="true"></i>', '#', [
		        'class' => 'social_1 share '.$this->addClass,
		        'data-soc' => 'ok',
		        'data-url' => $this->share['url'],
		        'data-title' => $this->share['title'],
		        'data-text' => $this->share['text'],
		        'data-image' => $this->share['imageUrl'],
		        'data-ga-click' => 'click_share_ok',
		    ]);
		}
    }

    private function registerAssets()
    {
        $view = $this->getView();

        $asset = ShareAsset::register($view);
    }
}