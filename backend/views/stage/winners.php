<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;

use common\models\Stage;
use common\models\UserGameWinner;

$this->title = 'Победители ('.$stage->name.')';

$this->params['breadcrumbs'][] = ['label' => 'Этапы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title];
?>

<h1><?= Html::encode($this->title) ?></h1>

<div>
	<?php $form = ActiveForm::begin([
	    'enableClientValidation' => false,
	    'enableAjaxValidation' => true,
	]); ?>

		<div id="blocks">
		    <?php foreach ($winners as $i => $winner) {
		    	echo $this->render('_winner', ['i' => $i, 'winner' => $winner, 'stage' => $stage]);
		    }?>
		</div>

	    <div class="form-group">
    		<?= Html::a('Добавить', '#', ['id' => 'add-block', 'class' => 'btn btn-primary']) ?>
	        <?= Html::submitButton('Обновить', ['class' => 'btn btn-success']) ?>
	    </div>
	
	<?php ActiveForm::end(); ?>
</div>

<?php $script = "
    $(document).on('click', '#add-block', function() {
        var i = $('.block').length;

        $.ajax({
            type: 'GET',
            data: 'i='+i,
            success: function (data) {
            	$('#blocks').append(data);
            }
        });

        return false;
    });

    $(document).on('click', '.block .remove', function() {
    	$(this).closest('.block').remove();
    });
";

$this->registerJs($script, yii\web\View::POS_END);?>

<hr>
<h3>Подсчет по формуле</h3>

<table class="table table-bordered">
	<thead>
		<th>
			<td>Место</td>
			<td>ID</td>
			<td>Имя</td>
		</th>
	</thead>
	<?php for ($place=1; $place <= 3; $place++):?>
		<tr>
			<td><?=$place;?></td>
			<td><?=Html::a('Посчитать', '', ['class' => 'get-winner', 'data-place' => $place]);?></td>
			<td class="id"></td>
			<td class="name"></td>
		</tr>
	<?php endfor;?>
</table>


<?php $script = "
	var winners = [];

    $(document).on('click', '.get-winner', function(e) {
    	var link = $(this);
    	var place = link.data('place');
        $.ajax({
            data: 'place='+place+'&winners='+winners,
            success: function (data) {
	            winners[place] = data.Ki;

            	if(data.userId) {
	            	link.closest('tr').find('.name').html(data.userName);
	            	link.closest('tr').find('.id').html(data.userId);
	            } else {
	            	alert('Полученного по формуле участника не существует');
	            }
            }
        });

        return false;
    });
";

$this->registerJs($script, yii\web\View::POS_END);?>