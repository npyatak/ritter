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
    <?php // if($_SERVER['HTTP_HOST'] != 'ritter.local'):?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-135974038-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-135974038-1');
        </script>        
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-135974038-1', 'auto');
            ga('send', 'pageview');
        </script>
        <script>
            window['_fs_debug'] = false;
            window['_fs_host'] = 'fullstory.com';
            window['_fs_org'] = 'JKWFR';
            window['_fs_namespace'] = 'FS';
            (function(m,n,e,t,l,o,g,y){
            if (e in m) {if(m.console && m.console.log) { m.console.log('FullStory namespace conflict. Please set window["_fs_namespace"].');} return;}
            g=m[e]=function(a,b,s){g.q?g.q.push([a,b,s]):g._api(a,b,s);};g.q=[];
            o=n.createElement(t);o.async=1;o.src='https://'+_fs_host+'/s/fs.js';
            y=n.getElementsByTagName(t)[0];y.parentNode.insertBefore(o,y);
            g.identify=function(i,v,s){g(l,{uid:i},s);if(v)g(l,v,s)};g.setUserVars=function(v,s){g(l,v,s)};g.event=function(i,v,s){g('event',{n:i,p:v},s)};
            g.shutdown=function(){g("rec",!1)};g.restart=function(){g("rec",!0)};
            g.consent=function(a){g("consent",!arguments.length||a)};
            g.identifyAccount=function(i,v){o='account';v=v||{};v.acctId=i;g(o,v)};
            g.clearUserCookie=function(){};
            })(window,document,window['_fs_namespace'],'script','user');
        </script>

    <?php //endif;?>
</head>
<body>
<?php $this->beginBody() ?>
    <img src="//ads.adfox.ru/240113/getCode?p1=bztph&p2=frfe&pfc=cejdf&pfb=giyke&pr=%random%&ptrc=b" alt=""/>
    <img src="//ad.adriver.ru/cgi-bin/rle.cgi?sid=1&bt=21&ad=675881&pid=2863911&bid=6029760&bn=6029760&rnd=%random%" alt=""/>
    <img src="//ar.tns-counter.ru/V13a****ar_ru/ru/CP1251/tmsec=38279_675881-2863911" alt=""/>

    <div class="wrapper">

        <?php if(Yii::$app->controller->action->id == 'index'):?>
        <header class="main_header boss">
        <?php else:?>            
        <header class="main_header">
        <?php endif;?>

       
            <div class="contain">
                <div class="header_wrap_items">
                    <a href="https://friday.ru/" target="_blank" class="header_logo_1">
                        <!-- <img src="/img/logo.png" alt="logo"> -->
                        <img src="/img/logo_text.png" alt="logo">
                    </a>
                    <nav class="header_nav">
                        <ul>
                            <li class="menu_li"><a <?=Yii::$app->controller->action->id == 'index' ? 'class="active"' : '';?> href="<?=Url::toRoute(['site/index']);?>">Участвуй</a></li>
                            <li class="menu_li"><a href="<?=Url::toRoute(['site/rules']);?>" target="_blank">Полные правила</a></li>
                            <li class="menu_li"><a <?=Yii::$app->controller->action->id == 'winners' ? 'class="active"' : '';?> href="<?=Url::toRoute(['site/winners']);?>">Призы и победители</a></li>
                        </ul>
                    </nav>
                    <a href="//ads.adfox.ru/240113/goLink?p1=bztph&p2=frfe&p5=giyke&pr=%random%" data-ga-click="click_ritter_logo" target="_blank" class="header_logo_2">
                        <img src="/img/logo_2.png" alt="logo">
                    </a>

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
                    <li class="burger_li"><a <?=Yii::$app->controller->action->id == 'index' ? 'class="active"' : '';?> href="<?=Url::toRoute(['site/index']);?>">Участвуй</a></li>
                    <li class="burger_li"><a href="<?=Url::toRoute(['site/rules']);?>" target="_blank">Полные правила</a></li>
                    <li class="burger_li"><a <?=Yii::$app->controller->action->id == 'winners' ? 'class="active"' : '';?> href="<?=Url::toRoute(['site/winners']);?>">Призы и победители</a></li>
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

                <?= Alert::widget() ?>

        <?php if(Yii::$app->controller->action->id == 'index'):?>
           
        <?php else:?>            
            </div>
        </div>
        <!-- body_chocolate_wrap -->
        <?php endif;?>


            

        <footer class="footer_main">
            <div class="contain">
                <div class="footer_items">

                    <?php if(Yii::$app->controller->action->id != 'test') {
                        echo \frontend\widgets\share\ShareWidget::widget(['showButtons' => false]);
                    }?>
                   <!--  <div class="item one">
                        <p>Поделиться проектом</p>
                        <div class="social_block">
                        </div>
                    </div> -->
                    <!-- item -->

                    <div class="item two">
                        <p>Оставайтесь с нами: <span>Наши группы</span></p>
                    
                        <div class="social_block">
                            <a class="social_1" href="https://vk.com/rittersportru" target="_blank" data-ga-click="click_social_vk">
                                <i class="fa fa-vk" aria-hidden="true"></i>
                            </a>
                            <a class="social_1" href="https://www.facebook.com/RitterSport/?brand_redir=136684793051581" target="_blank" data-ga-click="click_social_fb">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <!-- item -->

                    <div class="item three">
                        <a class="return_call" href="<?=Url::toRoute(['site/contact']);?>">Обратная связь</a><br>
                        <a class="return_call" href="<?=Url::toRoute(['site/winners']);?>">Призы и победители</a>
                    </div>

                </div>
                <!-- footer_items -->
            </div>
        </footer>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>