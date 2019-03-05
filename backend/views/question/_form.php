<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use unclead\multipleinput\TabularInput;
use common\components\ElfinderInput;
?>

<div class="form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?=$form->errorSummary($model);?>

    <?= $form->field($model, 'text')->textInput(['maxlength' => true]) ?>

    <div class="row">
        <div class="col-sm-6">
    		<?= $form->field($model, 'comment_wrong')->textInput(['maxlength' => true]) ?>
    	</div>
        <div class="col-sm-6">
    		<?= $form->field($model, 'comment_right')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'status')->dropDownList($model->getStatusArray()) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'stage_id')->dropDownList(ArrayHelper::map(\common\models\Stage::find()->all(), 'id', 'name')) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'location_id')->dropDownList(ArrayHelper::map(\common\models\Location::find()->all(), 'id', 'name'), ['prompt'=>'']) ?>
        </div>
    </div>

	<hr>

    <div class="tabular-input">
	    <h4>Ответы</h4>
		<?= TabularInput::widget([
			'min' => 2,
			'rendererClass' => '\common\components\CustomTableRenderer',
			'removeButtonOptions' => [
				'label' => 'X',
			],
	        'addButtonOptions' => [
	            'label' => 'Добавить',
	            'class' => 'btn btn-primary'
	        ],
	        'addButtonPosition' => TabularInput::POS_FOOTER,
		    'models' => $answerModels,
		    'columns' => [
		        [
		            'name'  => 'id',
		            'type'  => 'hiddenInput',
		        ],
		        [
		        	'title' => 'Заголовок',
		        	'name' => 'text',
	                'enableError' => true,
		            'options' => [
		            	'class' => 'w170px'
		        	],
		        ],
		        [
		        	'title' => 'Верный',
		        	'name' => 'is_right',
		            'type'  => 'checkbox',
		            'options' => [
		            	'class' => 'w40px'
		        	],
		        ],
		    ],
		]) ?>
	</div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
