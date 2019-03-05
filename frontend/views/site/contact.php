<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Обратная связь';
?>

<div class="block_type_1 body_chocolate_inner">
    <div class=" wrap_inner_border padding_type_1">
        <div class="inner_border">
            <span class="top"></span>
            <span class="bottom"></span>
        </div>

        <p class="name_block">Путешествуй ярко с <span>Ritter Sport</span></p>
        <p class="light_text">Остались вопросы? Свяжитесь с нами:</p>

        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

            <div class="inputs_block">
                <?= $form->field($model, 'name', ['options' => ['class' => 'input_wrap_1 man']])->textInput(['autofocus' => true, 'placeholder' => 'Имя *'])->label(false) ?>
                
                <?= $form->field($model, 'email', ['options' => ['class' => 'input_wrap_1 mail']])->textInput(['placeholder' => 'E - mail *'])->label(false) ?>
            </div>
                
            <?= $form->field($model, 'phone', ['options' => ['class' => 'input_wrap_1 phone']])->textInput(['placeholder' => 'Номер телефона *'])->label(false) ?>

            <?= $form->field($model, 'body', ['options' => ['class' => 'textarea_wrap_1']])->textarea(['rows' => 6, 'placeholder' => 'Сообщение'])->label(false) ?>

            <div class="bottom_block_1">
                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="capcha_item">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>
                <?= Html::submitButton('<span>Отправить</span>', ['class' => 'button_1', 'name' => 'contact-button']) ?>
            </div>

            <p class="bottom_alert">Все поля, помеченные звёздочкой <i>*</i>, являются обязательными</p>
        <?php ActiveForm::end(); ?>
    </div>
</div>