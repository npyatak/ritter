<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use yii\widgets\Pjax;

use common\models\User;
use common\models\Location;
use common\models\Stage;
use common\models\UserAnswer;

$this->title = 'Результаты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>    
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                /*[
                    'attribute' => 'created_at',
                    'value' => function($data) {
                        return date('d.m.Y H:i', $data->created_at);
                    }
                ],*/
                [
                    'attribute' => 'user_id',
                    'format' => 'raw',
                    'value' => function($data) {
                        return Html::a($data->user->name ? $data->user->name.' '.$data->user->surname : $data->user_id, Url::toRoute(['user/view', 'id' => $data->user_id]));
                    }
                ],
                [
                    'attribute' => 'stage_id',
                    'format' => 'raw',
                    'value' => function($data) {
                        return Html::a($data->stage->name, Url::toRoute(['stage/view', 'id' => $data->stage_id]));
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'stage_id', ArrayHelper::map(Stage::find()->all(), 'id', 'name'), ['prompt'=>'']),
                ],
                [
                    'attribute' => 'location_id',
                    'format' => 'raw',
                    'value' => function($data) {
                        return Html::a($data->location->name, Url::toRoute(['location/view', 'id' => $data->location_id]));
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'location_id', ArrayHelper::map(Location::find()->all(), 'id', 'name'), ['prompt'=>'']),
                ],
                'score',
                [
                    'attribute' => 'is_finished',
                    'value' => function($data) {
                        return $data->is_finished ? 'Да' : 'Нет';
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'is_finished', [0 => 'Нет', 1 => 'Да'], ['prompt'=>'']),
                ],
                [
                    'attribute' => 'is_shared',
                    'value' => function($data) {
                        return $data->is_shared ? 'Да' : 'Нет';
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'is_shared', [0 => 'Нет', 1 => 'Да'], ['prompt'=>'']),
                ],
                [
                    'class' => 'kartik\grid\EditableColumn',
                    'attribute' => 'status',
                    'headerOptions'=>['class'=>'kv-sticky-column'],
                    'contentOptions'=>['class'=>'kv-sticky-column'],
                    'value' => function($data) {
                        return $data->statusArray[$data->status];
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'status', UserAnswer::getStatusArray(), ['prompt'=>'']),
                    'editableOptions' => [
                        'inputType' => kartik\editable\Editable::INPUT_DROPDOWN_LIST,
                        'data' => UserAnswer::getStatusArray(),
                        'displayValueConfig' => UserAnswer::getStatusArray(),
                    ],
                ],
            ],
        ]); ?>
    <?php Pjax::end(); ?>
</div>
