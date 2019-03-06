<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <div class="wrapper">
        <header class="main_header">
            <div class="contain">
                <div class="header_wrap_items">
                    <div class="header_logo_1">
                        <!-- <img src="/img/logo.png" alt="logo"> -->
                        <img src="/img/logo_text.png" alt="logo">
                    </div>
                    <nav class="header_nav">
                        <ul>
                            <li class="menu_li active"><a class="active" href="<?=Url::toRoute(['site/index']);?>">Участвуй</a></li>
                            <li class="menu_li"><a href="<?=Url::toRoute(['site/rule']);?>" target="_blank">Полные правила</a></li>
                            <li class="menu_li"><a href="<?=Url::toRoute(['site/winners']);?>">Призы и победители</a></li>
                        </ul>
                    </nav>
                    <div class="header_logo_2">
                        <img src="/img/logo_2.png" alt="logo">
                    </div>

                    <div class="burger_button">
                        <div class="one"></div>
                        <div class="two"></div>
                        <div class="three"></div>
                    </div>

                </div>
            </div>
        </header>

        <div class="burger_menu">
            <div class="wrap_inner_border">
                <!-- рамка -->
                <div class="inner_border">
                    <span class="top"></span>
                    <span class="bottom"></span>
                </div>

                <img class="close_burger" src="/img/close_middle.svg" alt="close">
                <ul class="burger_ul">
                    <li class="burger_li"><a href="<?=Url::toRoute(['site/index']);?>">Участвуй</a></li>
                    <li class="burger_li"><a href="<?=Url::toRoute(['site/rule']);?>" target="_blank">Полные правила</a></li>
                    <li class="burger_li"><a href="<?=Url::toRoute(['site/winners']);?>">Призы и победители</a></li>
                </ul>
            </div>
            
        </div>


        <?php if(Yii::$app->controller->action->id == 'index'):?>
        <div class="body_chocolate_wrap section_scroll" id="slider_section" data-section="1">
        <?php else:?>            
        <div class="body_chocolate_wrap">
        <?php endif;?>
            <!-- плавающий фон  -->
            <div class="background_choco type_1">
                <img class="left img_1" src="/img/chocolate_bg_1_1.jpg" alt="img">
                <img class="left img_2" src="/img/chocolate_bg_1_1.png" alt="img">
                <img class="right img_1" src="/img/chocolate_bg_1_2.jpg" alt="img">
                <img class="right img_2" src="/img/chocolate_bg_1_2.png" alt="img">
            </div>
            <div class="body_chocolate">    
                <?= $content ?>
            </div>
        </div>

        <footer class="footer_main">
            <div class="contain">
                <div class="footer_items">

                    <div class="item one">
                        <p>Поделиться проектом</p>
                        <div class="social_block">
                            <?=\frontend\widgets\share\ShareWidget::widget();?>
                        </div>
                    </div>
                    <!-- item -->

                    <div class="item two">
                        <p>Оставайтесь с нами: <span>Наши группы</span></p>
                    
                        <div class="social_block">
                            <a class="social_1" href="#">
                                <i class="fa fa-vk" aria-hidden="true"></i>
                            </a>
                            <a class="social_1" href="#">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <!-- item -->

                    <div class="item three">
                        <a class="return_call" href="<?=Url::toRoute(['site/contact']);?>">Обратная связь</a>
                    </div>

                </div>
                <!-- footer_items -->
            </div>
        </footer>
    </div>

    <div class="popup_bg">
        <div class="not_answer popup_block style_1" data-flag="not_answer">
            <img class="close_popup" src="/img/close_middle.svg" alt="close">
            <div class="wrap_inner_border">
                <div class="inner_border">
                    <span class="top"></span>
                    <span class="bottom"></span>
                </div>

                <div class="not_answer_content">
                    <p class="name">Не можешь определится с ответом?</p>
                    <p class="anons">Смотри подсказку здесь!</p>
                </div>
                <!-- not_answer_content -->
                <div class="not_answer_video">
                    <div class="video_wrap">
                        <iframe id="video_player" width="720" height="405" src="//rutube.ru/play/embed/11982280?quality=1&platform=someplatform" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowfullscreen></iframe>
                    </div>
                    <div class="video_info">
                        <div class="video_content">
                            <p class="name">Орел и Решка: Перезагрузка</p>
                            <p class="desc"><span>США, Лос-Анджелес</span> 14 сезон</p>
                            <div class="video_img">
                                <img src="/img/chocolate_1.png" alt="img">
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- not_answer_video -->
                
            </div>
            <!-- wrap_inner_border -->

        </div>
        <!-- popup_block -->
    </div>
    <!-- popup_bg -->

    <?= Alert::widget() ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>