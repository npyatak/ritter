
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
        <div class="video_wrap" style="background-image: url(<?=$data['video_image'];?>)">
            <!-- в data-video-iframe="" передаем iframe видео с рутуба -->
            <span class="play popup_play" data-video-iframe='<iframe width="720" height="405" src="<?=$data['video'];?>" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowfullscreen allow="autoplay"></iframe>'><i class="fa fa-play" aria-hidden="true"></i></span>
        </div>
        <div class="video_info">
            <div class="video_content">
                <p class="name"><?=$data['video_title'];?></p>
                <p class="desc"><?=$data['place'];?></p>
                <div class="video_img">
                    <img src="<?=$data['image'];?>" alt="img">
                </div>
            </div>
        </div>
    </div>
    <!-- not_answer_video -->
</div>
<!-- wrap_inner_border -->