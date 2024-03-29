<?php
use yii\helpers\Url;
?>

<div class="prizes_and_winners body_chocolate_inner">
	<div class="prizes">
		<p class="name_block">Путешествуй ярко с <span>Ritter Sport</span></p>
		<!-- рамка -->
		<div class="prize_content wrap_inner_border">
			<div class="inner_border">
				<span class="top"></span>
				<span class="bottom"></span>
			</div>
			
			<p class="prize_name">Призы:</p>

			<div class="wrap_items_prizes type_1">
				<div class="item_prize">
					<div class="img">
						<img src="/img/prize_1.png" alt="img">
					</div>
					<p class="position">1 место</p>
					<p class="name">Рюкзак</p>
					<p class="text">
						Надежный друг в любом путешествии: он спрячет от дождя документы, сохранит деньги в целости, подарит  множество приятных сюрпризов и дополнительных карманов для хранения
					</p>
				</div>
				<!-- item_prize -->

				<div class="item_prize">
					<div class="img">
						<img src="/img/prize_2.png" alt="img">
					</div>
					<p class="position">2 место</p>
					<p class="name">Футболка и мини-набор «Яркая коллекция» Ritter Sport</p>
					<p class="text">
						Приз строго показан фанатам ярких путешествий иа также всем уставшим от серой зимы. Носите с удовольствием!
					</p>
				</div>
				<!-- item_prize -->

				<div class="item_prize">
					<div class="img">
						<img src="/img/prize_3.png" alt="img">
					</div>
					<p class="position">3 место</p>
					<p class="name">Мини-набор «Яркая коллекция» Ritter Sport</p>
					<p class="text">
						Ritter Sport дарит калейдоскоп ярких впечатлений: множество вкусов в компактной упаковке.
					</p>
				</div>
				<!-- item_prize -->
			</div>
			<!-- wrap_items_prizes -->

			<div class="center">
				<a class="button_1" href="<?=Url::toRoute(['site/index', '#' => 'locations']);?>" data-ga-click="click_participate"><span>Участвовать</span></a>
				<p class="prize_alert">Реальные призы могут отличаться от их изображения</p>
			</div>
		</div>
		<!-- wrap_inner_border -->
	</div>
	<!-- prizes -->

	<?php foreach ($finishedStages as $finishedStage):?>
		<?php if($finishedStage->winners):?>
			<div class="winners">
				<div class="wrap_inner_border">
					<div class="inner_border">
						<span class="top"></span>
						<span class="bottom"></span>
					</div>
					<p class="name_block">Победители <span>этапа <?=$finishedStage->number;?></span>:</p>

					<div class="winners_wrap_items">
						<?php foreach ($finishedStage->winners as $winner):?>
							<div class="winner_item">
								<div class="wreath">
									<p class="num"><?=$winner->place;?></p>
									<p class="position">место</p>
								</div>
								<p class="name"><?=$winner->user->fullName;?></p>
							</div>
						<?php endforeach;?>
					</div>
					<!-- winners_wrap_items -->
				</div>
				<!-- wrap_inner_border -->
			</div>
			<!-- winners -->
		<?php endif;?>
	<?php endforeach;?>
</div>
<!-- prizes_and_winners -->