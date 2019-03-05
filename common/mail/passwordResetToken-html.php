<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p>Здравствуйте <?= Html::encode($user->name) ?>!</p>

    <p>Перейдите по ссылке, чтобы восстановить свой пароль:</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>

    <p>Если вы не запрашивали восстановление пароля, проигнорируйте это сообщение.</p>
</div>
