<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\components\CustomCKEditor;
use kartik\datetime\DateTimePicker;
use common\components\ElfinderInput;
use common\models\UserTest;
?>

<div class="week-form">

    <?php $form = ActiveForm::begin(); ?>
 
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'title')->textInput() ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'subtitle')->textInput() ?>
        </div>
    </div>

    <?= $form->field($model, 'text')->textInput(['maxlength' => true]) ?>

    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'image')->widget(ElfinderInput::className());?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'image2')->widget(ElfinderInput::className());?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'image_share')->widget(ElfinderInput::className());?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'video')->textInput() ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'video2')->textInput() ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
