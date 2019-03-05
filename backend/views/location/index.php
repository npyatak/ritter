<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

use common\models\Stage;
use common\models\UserGameWinner;

$this->title = 'Локации';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="week-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить локацию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                'id',
                'title',
                'subtitle',
                [
                    'attribute' => 'text',
                    'contentOptions' => [
                        'style' => 'width:600px; white-space: normal;'
                    ],
                ],
                [
                    'attribute' => 'image',
                    'format' => 'raw',
                    'value' => function($data) {
                        return Html::img($data->image, ['width' => '100px']);
                    }
                ],
                [
                    'attribute' => 'image2',
                    'format' => 'raw',
                    'value' => function($data) {
                        return Html::img($data->image2, ['width' => '100px']);
                    }
                ],

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update} {delete}',
                ],
            ],
        ]); ?>
    <?php Pjax::end(); ?>
</div>
