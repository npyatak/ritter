<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Восстановление пароля';
$this->params['spanText'] = 'Введите ваш E-mail. Мы вышлем на него ссылку на восстановление пароля.';
?>

<?=$this->render('_figure_block');?>

<?php $form = ActiveForm::begin([
    'id' => 'restore-password-form',
    'options' => [
        'class' => 'registration_form',
    ],
]); ?>

    <h1 class="name_type_1"><?=$this->title;?></h1>

    <div class="registration_inputs">
        <?= $form->field($model, 'email')->textInput(['class' => 'input_type_1', 'placeholder' => 'Email*', 'autofocus' => true])->label(false) ?>
    </div>

    <?= Html::submitButton('<span>Выслать инструкции</span>', ['class' => 'button_1', 'name' => 'register-button']) ?>

    <a class="refer_type_1 marginT20" href="<?=Url::toRoute(['site/login']);?>">Авторизация</a>
	<br>
	<a class="refer_type_1 marginT20" href="<?=Url::toRoute(['site/index']);?>">Регистрация</a>

<?php ActiveForm::end(); ?>

