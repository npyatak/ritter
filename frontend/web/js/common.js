// Прижимаем футер к низу страницы
function footer_bottom() {
	if($("footer").is(".footer_main")){ 
		var footer_h = $(".footer_main").outerHeight();
		
		// если на главной, иначе
		if($("div").is(".video_section")){
			$(".video_section").css("padding-bottom", footer_h)
			$(".wrapper").css("padding-bottom", 0);	
		}else{
			$(".wrapper").css("padding-bottom", footer_h);
		}
		
	}
}
// Прижимаем футер к низу страницы
function header_top() {
	var header_h = $(".main_header").outerHeight();
	// var footer_h = $(".footer_main").outerHeight();
	$(".body_chocolate").css("min-height", $(window).height() - header_h);
}
// Выполняем при загрузке и при ресайзе
$(document).ready(function(){
	function onResize(){
		// footer_bottom(); // функция кот. выполняется
		header_top(); 
		footer_bottom();

	}onResize();
	$(window).resize(onResize);
});

$(document).ready(function (){
    $('.wrapper').css('opacity', '1');
});

// слайдер на главной
$(function(){
	if($("div").is(".main_slider")){
		var slider = $('.main_slider');
		// setTimeout(function(){
		function slider_init(){
			
			slider.slick({
				prevArrow: '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
				nextArrow: '<i class="fa fa-chevron-right" aria-hidden="true"></i>',
				dots: true,
				adaptiveHeight: true,
				infinite: true,
				speed: 500,
				fade: true,
				cssEase: 'linear',
				appendDots: $(".dots_1"),
				appendArrows: $(".nav_1"),
				autoplay: true,
				autoplaySpeed: 3000,
				slidesToShow: 1,
	  			slidesToScroll: 1,
	  			// pauseOnDotsHover: false,
	  			pauseOnHover: false,
	  			pauseOnFocus: false,

			});
			
		}
		slider_init();


		$(window).resize(function(){
			chanche_control();

			// обновляем слайдер
			slider.slick('destroy');
			slider_init();
		});

		// меняем позицию контроллов
		function chanche_control(){
			var cur = $("[data-slick-index='0']");
			var content_height = cur.children(".item_inner").children(".slide_content").outerHeight();
			// console.log(content_height);
			control_position(content_height);
		}chanche_control();
		  

		slider.on('afterChange', function(event, slick, currentSlide, nextSlide) {
		    // console.log($(slide.$slides.get(index)).attr('class'))
		    cur = $("[data-slick-index='" +currentSlide+ "']");
		    content_height = cur.children(".item_inner").children(".slide_content").outerHeight();
		    // console.log(cur);
		    control_position(content_height);
		});   


		function control_position(content_height){
			$(".slider_controll").css("top", content_height-25)
		}

	}//if

});//$(function(){





// параллакс фона
$(".wrapper").mousemove(function(e) {
	var win_w = $(window).width();
	if(win_w > 768){
		parallaxIt(e, ".background_choco .img_1", -100);
		parallaxIt(e, ".background_choco .img_2", -50);
	}
	// parallaxIt(e, ".slide2", -180);
	// parallaxIt(e, ".slide3", -230);
	// parallaxIt(e, ".slide4", -130);
	// parallaxIt(e, ".slide5", -330);
});

function parallaxIt(e, target, movement) {
	var $this = $(".wrapper");
	var relX = e.pageX - $this.offset().left;
	var relY = e.pageY - $this.offset().top;

	TweenMax.to(target, 1, {
		x: (relX - $this.width() / 2) / $this.width() * movement,
		y: (relY - $this.height() / 2) / $this.height() * movement
	});
}





// функция для открытия всплывающей формы
function show_popup(form_number){
	$("[data-flag="+form_number+"]").css("display","inline-block");
	$(".popup_bg").css('display','block').delay(100).queue(function () {  // delay() позволяет сделать паузу 
		$(".popup_bg").css('opacity', '1');
		$("body").css('overflow-y','hidden'); 
		$(".popup_bg").dequeue(); //должно применяться к тому же элементу что и .queue
	});
	// alert(form_number);
}
// функция для закрытия всплывающей формы
function close_popup(){
	$(".popup_bg").css('opacity','0').delay(200).queue(function () {  // delay() позволяет сделать паузу между изменениями свойств
		$(".popup_bg").css('display', 'none');
		$("body").css('overflow-y','auto'); 
		$(".popup_bg .popup_block").css("display","none");
		$(".popup_bg").dequeue(); //должно применяться к тому же элементу что и .queue
	});
	$('.popup_block #video_player').remove(); 
};

// При клике открываем попап
$(".open_form").on("click",function() {
	var form_number = $(this).data("form");
	show_popup(form_number);
});

// Закрываем попап
$(".popup_bg, .close_popup").on("click", function(){
	close_popup();
}).children().click(function(e){        // вешаем на потомков
	e.stopPropagation();   // предотвращаем распространение на потомков
});




// добавляем видео с рутуб в iframe и управляем им
$(".video_wrap .play").on("click", function(){
	$('#video_player').remove(); 
	var el = $(this);
	var iframe_code = el.data("video-iframe");
	

	if(el.hasClass("popup_play")){
		el.after('<iframe width="720" height="405" src="'+ iframe_code +'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowfullscreen allow="autoplay"></iframe>');
	}else{
		el.after(iframe_code);
	}

	el.next("iframe").attr("id","video_player");
	var player = document.getElementById('video_player');
	// console.log(player);

	window.addEventListener('message', function (event) {
	    var message = JSON.parse(event.data);
	    // console.log(message.type); // some type
	    switch (message.type) {
	        case 'player:ready':
				player.contentWindow.postMessage(JSON.stringify({
				    type: 'player:setSkinColor',
				    data: {
				    	color: 'f7323f'
				    }
				}), '*');
				player.contentWindow.postMessage(JSON.stringify({
				    type: 'player:play',
				    data: {}
				}), '*');
	            break;
	    };
	});

});



// механизм переключения блоков
$(".show_block").on("click",function(){
	var id = $(this).data("id");
	change_block(id);

});

// функция отвечающая за переключение блоков на главной 
function change_block(id){
	//if(!$("#"+ id).hasClass('active_block')){
		$('.active_block').css('opacity','0').delay(150).queue(function () {
			$(this).removeClass("active_block");
			$(this).css('display', 'none').dequeue();

			$("#"+ id +"").css('display','inline-block').delay(150).queue(function () {
				$(this).css('opacity', '1').dequeue();
				$(this).addClass("active_block");
			});
		});
	//}
}





// бургер
$(".burger_button").on("click", function() {
  // $(this).toggleClass("on");
  $(".burger_menu").slideDown(function(){
  	$("body").addClass("no_scroll");
  });
});

$(".close_burger").on("click", function() {
  // $(this).toggleClass("on");
  $(".burger_menu").slideUp(function(){
  	$("body").removeClass("no_scroll");
  });
});



// слайдер блоков на главной
$(function() {
	if($("div").is(".section_scroll")){
		$.scrollify({
		  section : ".section_scroll",
		  scrollSpeed: 800,
		  overflowScroll: true,
		  scrollbars: true,
		  // scrollbars: false,
		  // easing: "easeOutExpo",
		});
	}
});

// Закрываем попап
$(".choco_popup, .close_popup").on("click", function(){
	$(".choco_popup").css('opacity','0').delay(200).queue(function () {  // delay() позволяет сделать паузу м
		$(".choco_popup").css('display', 'none');
		$("body").css('overflow-y','auto'); 
		$(".choco_popup .choco_popup_inner").css("display","none");
		$(".choco_popup").dequeue(); //должно применяться к тому же элементу что и .queue
	});
	$.scrollify.enable();
}).children().click(function(e){        // вешаем на потомков
	e.stopPropagation();   // предотвращаем распространение на потомков
});


// класс для плавного скролла ссылок
$(".scroll_refer").on("click",function() {
	var href = $(this).attr("href");
	$("html, body").animate({ scrollTop: $(href).offset().top}, "slow");
	return false;
});
