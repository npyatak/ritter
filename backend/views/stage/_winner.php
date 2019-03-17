<?php
use yii\helpers\Html;

use common\models\User;
use common\models\UserAnswer;

$userAnswers = UserAnswer::find()->where(['stage_id' => $stage->id, 'user_answer.status' => UserAnswer::STATUS_ACTIVE])->joinWith('user')->all();

$userArray = [];
foreach ($userAnswers as $userAnswer) {
	$userArray[$userAnswer->user->id] = $userAnswer->user->id.' - '.$userAnswer->user->fullName;
}
?>

<div class="row block">
	<?=Html::activeHiddenInput($winner, "[$i]id");?>
	<div class="col-sm-6">
		<div class="form-group <?=$winner->hasErrors("place") ? 'has-error' : '';?>">
			<?= Html::activeLabel($winner, "[$i]place", ['class' => 'control-label']) ?>
			<?= Html::activeTextInput($winner, "[$i]place", ['class' => 'form-control']) ?>
			<?= Html::error($winner, "[$i]place", ['class' => 'help-block']);?>
		</div>
	</div>
	<div class="col-sm-5">
		<div class="form-group <?=$winner->hasErrors("user_id") ? 'has-error' : '';?>">
			<?= Html::activeLabel($winner, "[$i]user_id", ['class' => 'control-label']) ?>
			<?= Html::activeDropdownList($winner, "[$i]user_id", $userArray, ['class' => 'form-control']) ?>
			<?= Html::error($winner, "[$i]user_id", ['class' => 'help-block']);?>
		</div>
	</div>
	<div class="col-sm-1"><a href="#" class="remove" style="color: red;">Удалить</a></div>
</div>