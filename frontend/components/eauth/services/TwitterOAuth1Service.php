<?php
/**
 * TwitterOAuthService class file.
 *
 * Register application: https://dev.twitter.com/apps/new
 *
 * @author Maxim Zemskov <nodge@yandex.ru>
 * @link http://github.com/Nodge/yii2-eauth/
 * @license http://www.opensource.org/licenses/bsd-license.php
 */

namespace frontend\components\eauth\services;

use OAuth\OAuth1\Token\TokenInterface;
use frontend\components\eauth\oauth1\Service;


/**
 * Twitter provider class.
 *
 * @package application.extensions.eauth.services
 */
class TwitterOAuth1Service extends Service
{

	protected $name = 'twitter';
	protected $title = 'Twitter';
	protected $type = 'OAuth1';
	protected $jsArguments = ['popup' => ['width' => 900, 'height' => 550]];

	protected $providerOptions = [
		'request' => 'https://api.twitter.com/oauth/request_token',
		'authorize' => 'https://api.twitter.com/oauth/authenticate', //https://api.twitter.com/oauth/authorize
		'access' => 'https://api.twitter.com/oauth/access_token',
	];
	protected $baseApiUrl = 'https://api.twitter.com/1.1/';
	protected $tokenDefaultLifetime = TokenInterface::EOL_NEVER_EXPIRES;

	/**
	 * @return bool
	 */
	protected function fetchAttributes()
	{
		$info = $this->makeSignedRequest('account/verify_credentials.json');

		$this->attributes['id'] = $info['id'];
		$this->attributes['name'] = $info['name'];
		$this->attributes['url'] = 'http://twitter.com/account/redirect_by_id?id=' . $info['id_str'];

		/*$this->attributes['username'] = $info['screen_name'];
		$this->attributes['language'] = $info['lang'];
		$this->attributes['timezone'] = timezone_name_from_abbr('', $info['utc_offset'], date('I'));
		$this->attributes['photo'] = $info['profile_image_url'];*/

		return true;
	}

	/**
	 * Authenticate the user.
	 *
	 * @return boolean whether user was successfuly authenticated.
	 */
	public function authenticate()
	{
		if (isset($_GET['denied'])) {
			$this->cancel();
		}

		return parent::authenticate();
	}
}