<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<?php if($question !== null):?>
    <div class="test_block body_chocolate_inner active_block" id="test_block">
        <div class="content_test wrap_inner_border">
            <?=$this->render('_question', ['question' => $question, 'userAnswer' => $userAnswer]);?>
        </div>

        <div class="center">
            <a class="button_2" href="#">Вернуться к выбору вкуса</a>
        </div>
    </div>
    <!-- test_block -->
<?php else:?>
    <div class="alert_block body_chocolate_inner" id="occupied_block">
        <!-- рамка -->
        <div class="wrap_inner_border padding_type_1">
            <div class="inner_border">
                <span class="top"></span>
                <span class="bottom"></span>
            </div>

            <p class="name_block"><span>К сожалению,</span> этот аккаунт уже участвует в этапе. Зови друзей участвовать в проекте</p>

            <p class="bold_text">Поделиться проектом:</p>
            <div class="social_block">
                <?=\frontend\widgets\share\ShareWidget::widget();?>
            </div>
        </div>
        <!-- wrap_inner_border -->
        <div class="center">
            <a class="button_2" href="#">Вернуться к выбору вкуса</a>
        </div>
    </div>
    <!-- occupied_block -->
<?php endif;?>

<?php if(Yii::$app->user->isGuest):?>
    <div class="autorization_block body_chocolate_inner" id="autorization_block">
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
        <!-- wrap_inner_border -->
        <div class="center">
            <a class="button_2" href="#">Вернуться к выбору вкуса</a>
        </div>
    </div>
    <!-- autorization_block -->
<?php endif;?>


<div class="alert_block body_chocolate_inner" id="congratulation_block_1">
    <!-- рамка -->
    <div class="wrap_inner_border padding_type_1">
        <div class="inner_border">
            <span class="top"></span>
            <span class="bottom"></span>
        </div>

        <p class="name_block"><span>Поздравляем!</span> Ты участвуешь в конкурсе!</p>

        <p class="light_text">Оставайся с нами на связи и узнай больше о других конкурсах Ritter Sport:</p>

        <div class="social_block">
            <a class="social_1" href="#">
                <i class="fa fa-vk" aria-hidden="true"></i>
            </a>
            <a class="social_1" href="#">
                <img src="/img/insta_icon.svg" alt="img">
            </a>
        </div>


    </div>
    <!-- wrap_inner_border -->
    <div class="center">
        <a class="button_2" href="#">Смотреть другие серии “Орла и Решки”</a>
    </div>
</div>
<!-- occupied_block -->


<!-- ========================================= -->
<!-- ========================================= -->


<div class="alert_block two body_chocolate_inner" id="congratulation_block_2">
    <!-- рамка -->
    <div class="wrap_inner_border padding_type_1">
        <div class="inner_border">
            <span class="top"></span>
            <span class="bottom"></span>
        </div>


        <div class="alert_img">
            <img src="/img/bag_choco.svg" alt="img">
        </div>
        <p class="name_block"><span>Поздравляем!</span> Ты прошел все вопросы викторины!</p>

        <p class="light_text">У нас отличная новость: здесь скучно тебе точно не будет! Смело планируй маршрут и открывай море новых впечатлений вместе с Ritter Sport. Поделись проектом с друзьями и участвуй в розыгрыше призов. Удачи!</p>

        <div class="social_block">
            <?=\frontend\widgets\share\ShareWidget::widget();?>
        </div>


    </div>
    <!-- wrap_inner_border -->
    <div class="center">
        <a class="button_2" href="#">Смотреть другие серии “Орла и Решки”</a>
    </div>
</div>

<?php if(Yii::$app->user->isGuest) {
    $script = "
        $('#answerButton').click(function() {
            change_block('autorization_block');
        });
    ";
} elseif($question === null) {
    $script = "
        change_block('occupied_block');
    ";
} else {
    $script = "
        $(document).on('click', '.quest', function() {
            $('.quest').removeClass('active');
            $(this).addClass('active');
        });

        $(document).on('click', '#answerButton', function() {
            var answer = $('.quest.active');
            $.ajax({
                data: {id: answer.data('id')},
                url: 'site/answer',
                success: function(data) {
                    $('.quest_alert').html(data.comment).show();
                    $('#nextButton').show();
                    $('#answerButton').hide();
                    if(data.right == answer.data('id')) {
                        answer.addClass('active_true');
                    } else {
                        answer.addClass('error');
                        $('.quest[data-id=\"'+data.right+'\"]').addClass('true');
                    }
                }
            });
        });

        $(document).on('click', '#nextButton', function() {
            $.ajax({
                url: 'site/next-question',
                success: function(data) {
                    if(data.length) {
                        $('.content_test').html(data);
                    } else {
                        change_block('congratulation_block_2');
                    }
                }
            });
        });
    ";
}


$this->registerJs($script, yii\web\View::POS_END);?>