
<!-- рамка -->
<div class="inner_border">
    <span class="top"></span>
    <span class="bottom"></span>
</div>

<div class="choco_item">
    <p class="name" style="color:#006037"><?=$question->location->title;?></p>
    <p class="desc"><?=$question->location->subtitle;?></p>
    <div class="choco_pack">
        <img src="<?=$question->location->image;?>" alt="img">
    </div>
</div>
<div class="test_item">
    <p class="num"><?=$userAnswer ? count($userAnswer->answersArray) + 1 : 1;?> вопрос</p>
    <p class="name"><?=$question->text;?></p>
    <div class="questions_wrap">
        <!--
        active - добавляется при активном элементе
        error - добавляется если ответ ошибочный  
        true -  подсвечивание правильного ответа когда выбран не правильный
        active_true - добавляется когда выбран правильный ответ 
         -->
        <?php foreach ($question->answers as $a):?>
            <div class="quest" data-id="<?=$a->id;?>">
                <p>
                    <span>
                        <i class="fa fa-check" aria-hidden="true"></i>
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </span>
                    <?=$a->text;?>
                </p>
            </div>
        <?php endforeach;?>
    </div>
    <p class="quest_alert"></p>
    <!-- questions_wrap -->

    <button class="button_1" id="answerButton"><span>Ответить</span></button>
    <button class="button_1" id="nextButton" style="display: none;"><span>Следующий</span></button>
</div>
<!-- test_item -->