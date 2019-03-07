<?php
namespace frontend\widgets\share;

use Yii;
use yii\helpers\Url;
use yii\helpers\Html;

class ShareWidget extends \yii\base\Widget 
{

	public $share = [
		'title' => 'Калейдоскоп вкусов и призов от Ritter Sport!',
        'text' => 'Пройди тест и выиграй дорожный рюкзак и другие призы от Ritter Sport! #ПутешествуйсRitterSport',
		'image' => '/img/01_kagocel_studia_souz_sharing_fb.jpg',
	];
	public $showButtons = true;
	public $addClass = '';
	public $image;

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
    	}

        $this->share['url'] = Url::current([], $scheme);
        $this->share['imageUrl'] = isset($this->share['image']) ? Url::to([$this->share['image']], $scheme) : null;
        $this->share['imageUrlVk'] = isset($this->share['image_vk']) ? Url::to([$this->share['image_vk']], $scheme) : null;
        $this->share['imageUrlOk'] = isset($this->share['image_ok']) ? Url::to([$this->share['image_ok']], $scheme) : null;

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
		        'data-image' => $this->share['imageUrlVk'],
		        'data-text' => $this->share['text'],
		    ]);
			echo Html::a('<i class="fa fa-facebook" aria-hidden="true"></i>', '', [
		        'class' => 'social_1 share '.$this->addClass,
		        'data-soc' => 'fb',
		        'data-url' => $this->share['url'],
		        'data-title' => $this->share['title'],
		        'data-image' => $this->share['imageUrl'],
		        'data-text' => $this->share['text'],
		    ]);
		    echo Html::a('<i class="fa fa-odnoklassniki" aria-hidden="true"></i>', '#', [
		        'class' => 'social_1 share '.$this->addClass,
		        'data-soc' => 'ok',
		        'data-url' => $this->share['url'],
		        'data-title' => $this->share['title'],
		        'data-text' => $this->share['text'],
		        'data-image' => $this->share['imageUrlOk'],
		    ]);
		}
    }

    private function registerAssets()
    {
        $view = $this->getView();

        $asset = ShareAsset::register($view);
    }
}