<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Восстановление пароля';
?>

<?php $form = ActiveForm::begin([
    'id' => 'reset-password-form',
    'options' => [
        'class' => 'registration_form',
    ],
]); ?>

    <h1 class="name_type_1"><?=$this->title;?></h1>

    <div class="registration_inputs">
        <?= $form->field($user, 'password')->passwordInput(['class' => 'input_type_1', 'placeholder' => 'Новый пароль*', 'autofocus' => true])->label(false) ?>
    </div>

    <?= Html::submitButton('<span>Изменить</span>', ['class' => 'button_1']) ?>

<?php ActiveForm::end(); ?>