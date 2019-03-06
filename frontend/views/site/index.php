<?php
use yii\helpers\Url;
?>

		<div class="body_chocolate_inner">
			<div class="main_slider_wrap">
				<div class="main_slider">
					<div class="item slide_1">
						<div class="item_inner">
							<div class="slide_content">
								<div class="slide_top">
									<p class="anons">Путешествуй ярко с</p>
									<p class="name">RITTER SPORT</p>
								</div>
								<div class="slide_img img_1"><img src="/img/slide_img_1.jpg" alt="img"></div>
							</div>
							<!-- slide_content -->
							
							<div class="slide_text">
								<p>
									Вперед за новыми впечатлениями и яркими призами от Ritter Sport! Выбери любимый вкус, ответь на вопросы и узнай, готов ли ты к путешествиям. Каждую неделю мы разыгрываем дорожный рюкзак и другие призы. <a href="#">Как участвовать?</a>
								</p>
							</div>

							<a href="<?=Url::toRoute(['site/test']);?>" class="button_1"><span>Участвовать</span></a>
						</div>
						<!-- item_inner -->
					</div>
					<!-- item -->

					<div class="item slide_2">
						<div class="item_inner">

							<div class="slide_content">
								<div class="slide_top">
									<p class="anons">Путешествуй ярко с</p>
									<p class="name">RITTER SPORT</p>
								</div>

								<div class="slide_img img_2">
									<div class="wrap_items_prizes type_2">
										<div class="item_prize">
											<div class="img">
												<img src="/img/chocolate_2.png" alt="img">
											</div>
										</div>
										<!-- item_prize -->

										<div class="item_prize">
											<div class="img">
												<img src="/img/chocolate_1.png" alt="img">
											</div>
										</div>
										<!-- item_prize -->

										<div class="item_prize">
											<div class="img">
												<img src="/img/chocolate_3.png" alt="img">
											</div>
										</div>
										<!-- item_prize -->
									</div>
								</div>
							</div>
							<!-- slide_content -->

							<div class="slide_text">
								<p>
									<span>01.</span> Выбери вкус Ritter Sport.
								</p>
							</div>

							<a href="<?=Url::toRoute(['site/test']);?>" class="button_1"><span>Участвовать</span></a>
						</div>
						<!-- item_inner -->
					</div>
					<!-- item -->

					<div class="item slide_3">
						<div class="item_inner">

							<div class="slide_content">
								<div class="slide_top">
									<p class="anons">Путешествуй ярко с</p>
									<p class="name">RITTER SPORT</p>
								</div>
								<div class="slide_img img_3">
									
									<div class="wrap_items_prizes type_3">
										<div class="item_prize">
											<div class="img">
												<img src="/img/checklist.svg" alt="img">
											</div>
										</div>
										<!-- item_prize -->
										<span class="img_between"></span>
										<div class="item_prize">
											<div class="img">
												<img src="/img/circle.svg" alt="img">
											</div>
										</div>
										<!-- item_prize -->
									</div>

								</div>
							</div>
							<!-- slide_content -->
							<div class="slide_text">
								<p>
									<span>02.</span> Ответь на 3 вопроса викторины и поделись проектом.
								</p>
							</div>

							<a href="<?=Url::toRoute(['site/test']);?>" class="button_1"><span>Участвовать</span></a>
						</div>
						<!-- item_inner -->
					</div>
					<!-- item -->

					<div class="item slide_3">
						<div class="item_inner">

							<div class="slide_content">

								<div class="slide_top">
									<p class="anons">Путешествуй ярко с</p>
									<p class="name">RITTER SPORT</p>
								</div>

								<div class="slide_img img_4">

									<div class="wrap_items_prizes type_4">
										<div class="item_prize">
											<div class="img">
												<img src="/img/prize_1.png" alt="img">
											</div>
										</div>
										<!-- item_prize -->

										<div class="item_prize">
											<div class="img">
												<img src="/img/prize_2.png" alt="img">
											</div>
										</div>
										<!-- item_prize -->

										<div class="item_prize">
											<div class="img">
												<img src="/img/prize_3.png" alt="img">
											</div>
										</div>
										<!-- item_prize -->
									</div>
								</div>
							</div>
							<!-- slide_content -->
							
							<div class="slide_text">
								<p>
									<span>03.</span> Выигрывай призы.
								</p>
							</div>

							<a href="<?=Url::toRoute(['site/test']);?>" class="button_1"><span>Участвовать</span></a>
						</div>
						<!-- item_inner -->
					</div>
					<!-- item -->
				</div>
				<div class="slider_controll">
					<div class="slider_dots dots_1"></div>
					<div class="slider_nav nav_1"></div>
				</div>	
				
			</div>
			<!-- main_slider_wrap -->
		</div>
		<!-- body_chocolate_inner -->

    </div>
</div>
<!-- body_chocolate_wrap -->




<div class="infinite_section section_scroll" id="locations" data-section="2">
	<?php if($locations):?>
		<?php foreach ($locations as $location):?>
			<a href="<?=Url::toRoute(['site/test', 'id' => $location->id]);?>"><?=$location->name;?></a>
			<br>
		<?php endforeach;?>
	<?php endif;?>
</div>
<!-- infinite_section -->




<!-- секция 3 -->
<!-- ========================================= -->
<!-- ========================================= -->






		<div class="video_section section_scroll" id="video_section" data-section="3">
			<div class="contain">

				<p class="name_block"><span>Вдохновляйся!</span> Смотри другие выпуски Орла и Решки и выбирай любимые вкусы Ritter Sport</p>


			</div>
			<!-- contain -->

			<div class="video_items_wrap pb_big">

				<div class="wrap_item_video">
					<div class="not_answer_video" style="border-color: #006037">
						<div class="video_wrap" style="background-image: url(../img/test_img/antalia_poster.jpg)">
							<span class="play"><i class="fa fa-play" aria-hidden="true"></i></span>
							<!-- <iframe id="video_player" width="720" height="405" src="//rutube.ru/play/embed/10949751?quality=1&platform=someplatform" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowfullscreen></iframe> -->
						</div>
						<div class="video_info">
							<div class="video_content">
								<p class="name">Орел и Решка: Перезагрузка</p>
								<p class="desc">США, Лос-Анджелес<strong>·</strong>14 сезон</p>
								<div class="video_img">
									<img src="img/chocolate_1.png" alt="img">
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<!-- wrap_item_video -->

				<div class="wrap_item_video">
					<div class="not_answer_video" style="border-color: #006037">
						<div class="video_wrap" style="background-image: url(../img/test_img/antalia_poster.jpg)">
							<span class="play"><i class="fa fa-play" aria-hidden="true"></i></span>
							<!-- <iframe id="video_player" width="720" height="405" src="//rutube.ru/play/embed/10949751?quality=1&platform=someplatform" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowfullscreen></iframe> -->
						</div>
						<div class="video_info">
							<div class="video_content">
								<p class="name">Орел и Решка: Перезагрузка</p>
								<p class="desc">США, Лос-Анджелес<strong>·</strong>14 сезон</p>
								<div class="video_img">
									<img src="img/chocolate_1.png" alt="img">
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<!-- wrap_item_video -->

				<div class="wrap_item_video">
					<div class="not_answer_video" style="border-color: #006037">
						<div class="video_wrap" style="background-image: url(../img/test_img/antalia_poster.jpg)">
							<span class="play"><i class="fa fa-play" aria-hidden="true"></i></span>
							<!-- <iframe id="video_player" width="720" height="405" src="//rutube.ru/play/embed/10949751?quality=1&platform=someplatform" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowfullscreen></iframe> -->
						</div>
						<div class="video_info">
							<div class="video_content">
								<p class="name">Орел и Решка: Перезагрузка</p>
								<p class="desc">США, Лос-Анджелес<strong>·</strong>14 сезон</p>
								<div class="video_img">
									<img src="img/chocolate_1.png" alt="img">
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<!-- wrap_item_video -->

				<div class="wrap_item_video">
					<div class="not_answer_video" style="border-color: #006037">
						<div class="video_wrap" style="background-image: url(../img/test_img/antalia_poster.jpg)">
							<span class="play"><i class="fa fa-play" aria-hidden="true"></i></span>
							<!-- <iframe id="video_player" width="720" height="405" src="//rutube.ru/play/embed/10949751?quality=1&platform=someplatform" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowfullscreen></iframe> -->
						</div>
						<div class="video_info">
							<div class="video_content">
								<p class="name">Орел и Решка: Перезагрузка</p>
								<p class="desc">США, Лос-Анджелес<strong>·</strong>14 сезон</p>
								<div class="video_img">
									<img src="img/chocolate_1.png" alt="img">
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<!-- wrap_item_video -->

				<div class="wrap_item_video">
					<div class="not_answer_video" style="border-color: #006037">
						<div class="video_wrap" style="background-image: url(../img/test_img/antalia_poster.jpg)">
							<span class="play"><i class="fa fa-play" aria-hidden="true"></i></span>
							<!-- <iframe id="video_player" width="720" height="405" src="//rutube.ru/play/embed/10949751?quality=1&platform=someplatform" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowfullscreen></iframe> -->
						</div>
						<div class="video_info">
							<div class="video_content">
								<p class="name">Орел и Решка: Перезагрузка</p>
								<p class="desc">США, Лос-Анджелес<strong>·</strong>14 сезон</p>
								<div class="video_img">
									<img src="img/chocolate_1.png" alt="img">
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<!-- wrap_item_video -->

				<div class="wrap_item_video">
					<div class="not_answer_video" style="border-color: #006037">
						<div class="video_wrap" style="background-image: url(../img/test_img/antalia_poster.jpg)">
							<span class="play"><i class="fa fa-play" aria-hidden="true"></i></span>
							<!-- <iframe id="video_player" width="720" height="405" src="//rutube.ru/play/embed/10949751?quality=1&platform=someplatform" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowfullscreen></iframe> -->
						</div>
						<div class="video_info">
							<div class="video_content">
								<p class="name">Орел и Решка: Перезагрузка</p>
								<p class="desc">США, Лос-Анджелес<strong>·</strong>14 сезон</p>
								<div class="video_img">
									<img src="img/chocolate_1.png" alt="img">
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<!-- wrap_item_video -->

				<div class="wrap_item_video">
					<div class="not_answer_video" style="border-color: #006037">
						<div class="video_wrap" style="background-image: url(../img/test_img/antalia_poster.jpg)">
							<span class="play"><i class="fa fa-play" aria-hidden="true"></i></span>
							<!-- <iframe id="video_player" width="720" height="405" src="//rutube.ru/play/embed/10949751?quality=1&platform=someplatform" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowfullscreen></iframe> -->
						</div>
						<div class="video_info">
							<div class="video_content">
								<p class="name">Орел и Решка: Перезагрузка</p>
								<p class="desc">США, Лос-Анджелес<strong>·</strong>14 сезон</p>
								<div class="video_img">
									<img src="img/chocolate_1.png" alt="img">
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<!-- wrap_item_video -->

				<div class="wrap_item_video">
					<div class="not_answer_video" style="border-color: #006037">
						<div class="video_wrap" style="background-image: url(../img/test_img/antalia_poster.jpg)">
							<span class="play" data-video-id="10949751"><i class="fa fa-play" aria-hidden="true"></i></span>
							<!-- <iframe id="video_player" width="720" height="405" src="//rutube.ru/play/embed/10949751?quality=1&platform=someplatform" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowfullscreen></iframe> -->
						</div>
						<div class="video_info">
							<div class="video_content">
								<p class="name">Орел и Решка: Перезагрузка</p>
								<p class="desc">США, Лос-Анджелес<strong>·</strong>14 сезон</p>
								<div class="video_img">
									<img src="img/chocolate_1.png" alt="img">
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<!-- wrap_item_video -->



			</div>




