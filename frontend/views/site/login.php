<?php
use yii\helpers\Url;

$this->title = 'Авторизация';
?>

<div class="autorization_block body_chocolate_inner" style="display: inline-block;" id="autorization_block">
    <!-- рамка -->
    <div class="wrap_inner_border padding_type_1">
        <div class="inner_border">
            <span class="top"></span>
            <span class="bottom"></span>
        </div>

        <p class="name_block">Пожалуйста, <span>авторизуйся</span></p>

        <div class="checkbox_block">
            <div class="checkbox_1_wrap">   
                <div class="checkbox_1">
                     <input id="package_check1" type="checkbox" name="package_check" hidden checked>
                    <label for="package_check1"></label>
                </div>
                <!-- checkbox_1 -->
                <p class="checkbox_1_text">Я соглашаюсь с <a href="<?=Url::toRoute(['site/rules']);?>">полными правилами</a> конкурса</p>
            </div>
            <!-- checkbox_1_wrap -->
            <div class="checkbox_1_wrap">   
                <div class="checkbox_1">
                     <input id="package_check2" type="checkbox" name="package_check" hidden checked>
                    <label for="package_check2"></label>
                </div>
                <!-- checkbox_1 -->
                <p class="checkbox_1_text">Согласен получать информационные рассылки, в том числе рекламные и иные материалы ООО «Телекомпания ПЯТНИЦА» и третьих лиц</p>
            </div>
            <!-- checkbox_1_wrap -->
        </div>
        <!-- checkbox_block -->

        <?=$this->render('_login', ['loginForm' => $loginForm]);?>
    </div>
</div>
