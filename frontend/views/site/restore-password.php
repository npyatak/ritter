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
            'id' => 'restore-password-form',
            //'enableClientValidation' => false,
            //'enableAjaxValidation' => true,
        ]); ?>

            
            <div class="center">
                <?= $form->field($model, 'email', ['options' => ['class' => 'input_wrap_1 man']])->textInput(['autofocus' => true, 'placeholder' => 'Твой Email *'])->label(false) ?>        
                <?= Html::submitButton('<span>Выслать инструкции</span>', ['class' => 'button_1', 'name' => 'register-button']) ?>
                <br>
                <a class="bold_refer mt_15" href="<?=Url::toRoute(['site/login']);?>">Авторизация</a>
                <br>
                <a class="bold_refer mt_15" href="<?=Url::toRoute(['site/index']);?>">Регистрация</a>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

