<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<div class="social_block">
    <?=\frontend\widgets\social\SocialWidget::widget(['action' => 'site/login']);?>
</div>

<p class="bold_text">Или войди с помощью почты</p>

<?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'action' => Url::toRoute(['site/login']),
    'enableClientValidation' => false,
    'enableAjaxValidation' => true,
]); ?>

    <div class="inputs_block">
        <?= $form->field($loginForm, 'email', ['options' => ['class' => 'input_wrap_1 man']])->textInput(['autofocus' => true, 'placeholder' => 'Твой Email *'])->label(false) ?>
        
        <?= $form->field($loginForm, 'password', ['options' => ['class' => 'input_wrap_1 man']])->passwordInput(['placeholder' => 'Пароль *'])->label(false) ?>
    </div>

    <div class="center">
        <?= Html::submitButton('<span>Войти с помощью почты</span>', ['class' => 'button_1', 'name' => 'login-button']) ?>
        <br>
        <a class="bold_refer mt_15" href="<?=Url::toRoute(['site/register']);?>">Регистрация</a>
        <br>
        <a class="bold_refer mt_15" href="<?=Url::toRoute(['site/request-password-reset']);?>">Забыли пароль?</a>
    </div>
<?php ActiveForm::end(); ?>