<?php
/**
 * An example of extending the provider class.
 *
 * @author Maxim Zemskov <nodge@yandex.ru>
 * @link http://github.com/Nodge/yii2-eauth/
 * @license http://www.opensource.org/licenses/bsd-license.php
 */

namespace frontend\components\eauth\services\extended;

class VKontakteOAuth2Service extends \frontend\components\eauth\services\VKontakteOAuth2Service
{
	const API_VERSION = '5.57';
	// protected $scope = 'friends';

	protected function fetchAttributes()
	{
		$tokenData = $this->getAccessTokenData();
		$info = $this->makeSignedRequest('users.get.json', [
			'query' => [
				'uids' => $tokenData['params']['user_id'],
				//'fields' => '', // uid, first_name and last_name is always available
				'fields' => 'nickname, sex, bdate, city, country, timezone, photo, photo_medium, photo_big, photo_rec',
				'v' => self::API_VERSION,
			],
		]);

		$info = $info['response'][0];

		$this->attributes = $info;
		$this->attributes['id'] = $info['id'];
		$this->attributes['name'] = $info['first_name'] . ' ' . $info['last_name'];
		$this->attributes['url'] = 'http://vk.com/id' . $info['id'];

		if (!empty($info['nickname'])) {
			$this->attributes['username'] = $info['nickname'];
		} else {
			$this->attributes['username'] = 'id' . $info['id'];
		}

		$this->attributes['gender'] = $info['sex'] == 1 ? 'F' : 'M';

		if (!empty($info['timezone'])) {
			$this->attributes['timezone'] = timezone_name_from_abbr('', $info['timezone'] * 3600, date('I'));
		}

		return true;
	}
}
