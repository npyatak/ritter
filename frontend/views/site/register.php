<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';
?>

<div class="block_type_1 body_chocolate_inner">
	<!-- рамка -->
	<div class=" wrap_inner_border padding_type_1">
		<div class="inner_border">
			<span class="top"></span>
			<span class="bottom"></span>
		</div>

		<p class="name_block">Путешествуй ярко с <span>Ritter Sport</span></p>
		<p class="light_text"><?=$this->title;?></p>

		<?php $form = ActiveForm::begin([
		    'id' => 'form-register', 
		    'action' => Url::toRoute('site/register'),
		    'enableClientValidation' => false,
		    'enableAjaxValidation' => true,
		]); ?>
			<div class="inputs_block">
            	<?= $form->field($user, 'login', ['options' => ['class' => 'input_wrap_1 man']])->textInput(['autofocus' => true, 'placeholder' => 'Твой логин *'])->label(false) ?>
            	
            	<?= $form->field($user, 'email', ['options' => ['class' => 'input_wrap_1 mail']])->textInput(['placeholder' => 'E - mail *'])->label(false) ?>
			</div>
			<div class="inputs_block two">
            	<?= $form->field($user, 'password', ['options' => ['class' => 'input_wrap_1 man']])->passwordInput(['placeholder' => 'Пароль *'])->label(false) ?>
            	
            	<?= $form->field($user, 'birthdateFormatted', ['options' => ['class' => 'input_wrap_1 date']])->textInput(['placeholder' => 'Дд.Мм.Гг'])->label(false) ?>
			</div>

			<div class="checkbox_block">
			    <?php $template = [
			        'template' => '<div class="checkbox_1">{input}{label}{error}{hint}</div><p class="checkbox_1_text">Я соглашаюсь с <a href="'.Url::toRoute(['site/rules']).'">полными правилами</a> конкурса</p>',
			        'hidden' => true
			    ];?>
			    <?= $form->field($user, 'rulesCheckbox', ['options' => ['class' => 'checkbox_1_wrap']])->checkbox($template)->label('', ['class'=>'checkbox1']);?>
			    
			    <?php $template['template'] = '<div class="checkbox_1">{input}{label}{error}{hint}</div><p class="checkbox_1_text">Согласен получать информационные рассылки, в том числе рекламные и иные материалы ООО «Телекомпания ПЯТНИЦА» и третьих лиц</p>';?>
			    <?= $form->field($user, 'spam_subscribe', ['options' => ['class' => 'checkbox_1_wrap']])->checkbox($template)->label('', ['class'=>'checkbox1']);?>
			</div>
			<!-- checkbox_block -->

			<div class="center">
	            <?= Html::submitButton('<span>Отправить</span>', ['class' => 'button_1', 'name' => 'register-button']) ?>
			</div>
			<a href="<?=Url::toRoute(['site/login']);?>" class="bold_refer">Авторизация</a>
        
        <?php ActiveForm::end(); ?>

		
		<!-- <div class="bottom_block_1">
			<div class="capcha_item">
				<p>2 + 2 = <i>*</i></p>
				<input type="text">
			</div>
			<a class="button_1" href="#"><span>Отправить</span></a>
		</div> -->

		<p class="bottom_alert">Все поля, помеченные звёздочкой <i>*</i>, являются обязательными</p>


	</div>
	<!-- wrap_inner_border -->
	

</div>
<!-- autorization_block -->