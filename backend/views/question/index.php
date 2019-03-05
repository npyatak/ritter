<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;

use common\models\Question;

$this->title = 'Вопросы';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить вопрос', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'text',  
                [
                    'attribute' => 'stage_id',
                    'format' => 'raw',
                    'value' => function($data) {
                        return $data->stage_id ? $data->stage->name : '';
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'stage_id', ArrayHelper::map(\common\models\Stage::find()->all(), 'id', 'name'), ['prompt'=>''])
                ],  
                [
                    'attribute' => 'location_id',
                    'format' => 'raw',
                    'value' => function($data) {
                        return $data->location_id ? $data->location->title : '';
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'location_id', ArrayHelper::map(\common\models\Location::find()->all(), 'id', 'title'), ['prompt'=>''])
                ], 
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value' => function($data) {
                        return $data->getStatusArray()[$data->status];
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'status', Question::getStatusArray(), ['prompt'=>''])
                ], 
                [
                    'attribute' => 'image',
                    'header' => 'Изображение',
                    'format' => 'raw',
                    'value' => function($data) {
                        return $data->image ? Html::img($data->imageUrl, ['width' => '200']) : '';
                    },
                ],

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    <?php Pjax::end(); ?>
</div>
