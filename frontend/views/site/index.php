
<div class="test_block body_chocolate_inner active_block" id="test_block">
    
    <div class="content_test wrap_inner_border">
        <!-- рамка -->
        <div class="inner_border">
            <span class="top"></span>
            <span class="bottom"></span>
        </div>

        <div class="choco_item">
            <p class="name" style="color:#006037">Extra Nut: Цельный миндаль</p>
            <p class="desc">шоколад молочный</p>
            <div class="choco_pack">
                <img src="/img/chocolate_1.png" alt="img">
            </div>
        </div>
        <div class="test_item">
            <p class="num">1 вопрос</p>
            <p class="name">В Сан-Франциско множество пирсов. Один из них, пирс 39, богат необычными пассажирами. Какими?</p>
            <div class="questions_wrap">
                <!--
                active - добавляется при активном элементе
                error - добавляется если ответ ошибочный  
                true -  подсвечивание правильного ответа когда выбран не правильный
                active_true - добавляется когда выбран правильный ответ 
                 -->
                <div class="quest error">
                    <p>
                        <span>
                            <i class="fa fa-check" aria-hidden="true"></i>
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </span>
                        Морские львы
                    </p>
                </div>
                <div class="quest">
                    <p>
                        <span>
                            <i class="fa fa-check" aria-hidden="true"></i>
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </span>
                        Бродячие кошки
                    </p>
                </div>
                <div class="quest true">
                    <p>
                        <span>
                            <i class="fa fa-check" aria-hidden="true"></i>
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </span>
                        Черепахи
                    </p>
                </div>
                <div class="quest active_true">
                    <p>
                        <span>
                            <i class="fa fa-check" aria-hidden="true"></i>
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </span>
                        Бродячие псы
                    </p>
                </div>
            </div>
            <p class="quest_alert">Неверно. Но вы прекрасный игрок!</p>
            <!-- questions_wrap -->

            <!-- 
            для открытия нужного блока , элемент на который мы кликаем должен иметь класс show_block
            и атрибут data-id в котором прописывается id блока который будет открыт
             -->
            <button class="button_1 show_block" data-id="#autorization_block"><span>Ответить</span></button>
        </div>
        <!-- test_item -->

        

    </div>
    <!-- item_test -->

    <div class="center">
        <a class="button_2" href="#">Вернуться к выбору вкуса</a>
    </div>

    
</div>
<!-- test_block -->




<!-- ========================================= -->
<!-- ========================================= -->


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

        <div class="social_block">
            <a class="social_1" href="#">
                <i class="fa fa-vk" aria-hidden="true"></i>
            </a>
            <a class="social_1" href="#">
                <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a class="social_1" href="#">
                <i class="fa fa-odnoklassniki" aria-hidden="true"></i>
            </a>
        </div>

        <p class="bold_text">Или войди с помощью почты</p>

        <div class="inputs_block">
            <div class="input_wrap_1 man">
                <input clas type="text" placeholder="Логин" name="login">
            </div>
            <div class="input_wrap_1 password">
                <input clas type="text" placeholder="Пароль" name="password">
            </div>
        </div>

        
        <div class="center">
            <button class="button_1"><span>Войти с помощью почты</span></button><br>
            <a class="bold_refer" href="#">Регистрация</a>
        </div>


    </div>
    <!-- wrap_inner_border -->
    <div class="center">
        <a class="button_2" href="#">Вернуться к выбору вкуса</a>
    </div>


</div>
<!-- autorization_block -->



<!-- ========================================= -->
<!-- ========================================= -->

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
            <a class="social_1" href="#">
                <i class="fa fa-vk" aria-hidden="true"></i>
            </a>
            <a class="social_1" href="#">
                <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a class="social_1" href="#">
                <i class="fa fa-odnoklassniki" aria-hidden="true"></i>
            </a>
        </div>


    </div>
    <!-- wrap_inner_border -->
    <div class="center">
        <a class="button_2" href="#">Вернуться к выбору вкуса</a>
    </div>
</div>
<!-- occupied_block -->

<!-- ========================================= -->
<!-- ========================================= -->

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
            <a class="social_1" href="#">
                <i class="fa fa-vk" aria-hidden="true"></i>
            </a>
            <a class="social_1" href="#">
                <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a class="social_1" href="#">
                <i class="fa fa-odnoklassniki" aria-hidden="true"></i>
            </a>
        </div>


    </div>
    <!-- wrap_inner_border -->
    <div class="center">
        <a class="button_2" href="#">Смотреть другие серии “Орла и Решки”</a>
    </div>
</div>