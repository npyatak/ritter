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

        <?php if(Yii::$app->controller->action->id == 'index'):?>
         <header class="main_header boss">
        <?php else:?>            
        <header class="main_header">
        <?php endif;?>

       
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
            <div class="background_choco type_3">
                <img class="left img_1" src="/img/chocolate_bg_5_1.jpg" alt="img">
                <img class="left img_2" src="/img/chocolate_bg_5_1.png" alt="img">
                <img class="right img_1" src="/img/chocolate_bg_5_2.jpg" alt="img">
                <img class="right img_2" src="/img/chocolate_bg_5_2.png" alt="img">
            </div>
            <div class="body_chocolate">    
                <?= $content ?>


        <?php if(Yii::$app->controller->action->id == 'index'):?>
           
        <?php else:?>            
            </div>
        </div>
        <!-- body_chocolate_wrap -->
        <?php endif;?>


            

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
    <?= Alert::widget() ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>