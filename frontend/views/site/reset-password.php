<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Восстановление пароля';
?>

<div class="autorization_block body_chocolate_inner" style="display: inline-block;" id="autorization_block">
    <!-- рамка -->
    <div class="wrap_inner_border padding_type_1">

        <?php $form = ActiveForm::begin([
    		'id' => 'reset-password-form',
        ]); ?>

            
            <div class="center">
            	<?= $form->field($user, 'password', ['options' => ['class' => 'input_wrap_1 man']])->passwordInput(['placeholder' => 'Пароль *'])->label(false) ?>
                <?= Html::submitButton('<span>Изменить</span>', ['class' => 'button_1', 'name' => 'register-button']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

