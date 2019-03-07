$( function() {
    let stopLeft = 0;
    var finishinterval;
    var stopclick = "no";
    let items = $.trim($(".drwrap .dritems").html())
    $(".drwrap .dritems").html(items+items+items);


    var array = [];
    array[1] = { 
        'text': 'Если ты фанат Турции, то должен знать, что в самом сердце страны находятся удивительные марсианские пейзажи Каппадокии. А ценителям истинных напитков рекомендуем настоящий кофе по-турецки. Проверь, готов ли ты к путешествиям? Ответь на 3 вопроса и выиграй призы от Ritter Sport и телеканала «Пятница!»',
        'img': '/img/ritter/rs-1-hov.png'
    };
    array[2] = { 
        'text': 'Чтобы побывать в Испании, необязательно ехать в Европу, так как данная страна имеет территории на Канарских островах и в двух городах африканского континента. А любителям десертов-пудингов стоит попробовать испанский горячий шоколад. Проверь, готов ли ты к путешествиям? Ответь на 3 вопроса и выиграй призы от Ritter Sport и телеканала «Пятница!»',
        'img': '/img/ritter/rs-2-hov.png'
    };
    array[3] = { 
        'text': 'Если ты фанат Сингапура, то наверняка знаешь, что символом страны является лев, который представляет силу, превосходство и мужество. И, не случайно, ведь каждый житель Сингапура является долларовым миллионером. Проверь, готов ли ты к путешествиям? Ответь на 3 вопроса и выиграй призы от Ritter Sport и телеканала «Пятница!»',
        'img': '/img/ritter/rs-3-hov.png'
    };
    array[4] = { 
        'text': 'Если ты фанат США, то наверняка знаешь, что там был представлен первый в мире фильм в 1894 г. А любителям спорта предлагаем заняться американским футболом. Проверь, готов ли ты к путешествиям? Ответь на 3 вопроса и выиграй призы от Ritter Sport и телеканала «Пятница!»',
        'img': '/img/ritter/rs-4-hov.png'
    };
    array[5] = { 
        'text': 'Прекрасный выбор! Если ты любитель Австралии, то наверняка знаешь, что в этой стране в 3,3 раза больше овец, чем людей. Однако, в качестве символов австралийского герба были выбраны кенгуру и эму. Проверь, готов ли ты к путешествиям? Ответь на 3 вопроса и выиграй призы от Ritter Sport и телеканала «Пятница!»',
        'img': '/img/ritter/rs-5-hov.png'
    };
    array[6] = { 
        'text': 'Если ты фанат Мексики, то наверняка знаешь, что национальный вид спорта там – бой быков. А любителям острых ощущений рекомендуем попробовать блюда мексиканской кухни. Проверь, готов ли ты к путешествиям? Ответь на 3 вопроса и выиграй призы от Ritter Sport и телеканала «Пятница!»',
        'img': '/img/ritter/rs-6-hov.png'
    };
    array[7] = { 
        'text': 'Если ты интересуешься Францией, то знаешь, что все настоящее шампанское произведено во французской области Шампань. А ценителям истории стоит отправиться на экскурсии в замки, которых во Франции 4969 штук. Проверь, готов ли ты к путешествиям? Ответь на 3 вопроса и выиграй призы от Ritter Sport и телеканала «Пятница!»',
        'img': '/img/ritter/rs-7-hov.png'
    };
    array[8] = { 
        'text': 'Если ты интересуешься историей Германии, то наверняка знаешь, что эта страна дала миру величайших физиков-теоретиков в новейшей истории: Альберта Эйнштейна, Макса Планка, Вернера Гейзенберга. А любителям воздушных десертов рекомендуем попробовать суфле «Шоколадные поцелуи». Проверь, готов ли ты к путешествиям? Ответь на 3 вопроса и выиграй призы от Ritter Sport и телеканала «Пятница!»',
        'img': '/img/ritter/rs-8-hov.png'
    };
    array[9] = { 
        'text': 'Если ты фанат Индии, то наверняка знаешь, что в этой стране можно найти удивительные мосты, сделанные из деревьев, которые создавались природой более 500 лет. А любителям сладкого рекомендуем попробовать индийские десерты, которые в изобилии есть в каждом регионе. Проверь, готов ли ты к путешествиям? Ответь на 3 вопроса и выиграй призы от Ritter Sport и телеканала «Пятница!»',
        'img': '/img/ritter/rs-9-hov.png'
    };
    array[10] = { 
        'text': 'Если ты фанат Танзании, то наверняка знаешь, что на ее территории находится гора Килиманджаро. А любителям дикой природы рекомендуем отправиться к кратеру Нгоронгоро, на склонах которого пасутся редкие черные носороги. Проверь, готов ли ты к путешествиям? Ответь на 3 вопроса и выиграй призы от Ritter Sport и телеканала «Пятница!»',
        'img': '/img/ritter/rs-10-hov.png'
    };
    array[11] = { 
        'text': 'Если ты фанат Индонезии, то наверняка знаешь, что главная достопримечательность страны – буддистский храм Боробудур на острове Ява. А вторая достопримечательность – храмовый комплекс Прамбанан у склона вулкана Мерапи. Проверь, готов ли ты к путешествиям? Ответь на 3 вопроса и выиграй призы от Ritter Sport и телеканала «Пятница!»',
        'img': '/img/ritter/rs-11-hov.png'
    };
    array[12] = { 
        'text': 'Прекрасный выбор! Если ты фанат Шри-Ланки, то знаешь, что символом данной страны является слон. А любителям драгоценных камней особенно стоит посетить остров, являющийся крупным экспортером в этой области. Проверь, готов ли ты к путешествиям? Ответь на 3 вопроса и выиграй призы от Ritter Sport и телеканала «Пятница!»',
        'img': '/img/ritter/rs-12-hov.png'
    };
    array[13] = { 
        'text': 'Всем известном и Великой китайской стене – главной достопримечательности страны. А гурманам стоит отправиться в Китай, чтобы отведать сладкий суп из черепахи. Проверь, готов ли ты к путешествиям? Ответь на 3 вопроса и выиграй призы от Ritter Sport и телеканала «Пятница!»',
        'img': '/img/ritter/rs-13-hov.png'
    };
    array[14] = { 
        'text': 'В Бразилии расположено сразу два из современных 7 чудес света –статуя Христа и река Амазонка. А любителям зрелищ рекомендуем отправиться в эту страну, чтобы насладиться карнавальным шоу. Проверь, готов ли ты к путешествиям? Ответь на 3 вопроса и стань участником конкурса от Ritter Sport и телеканала «Пятница!»',
        'img': '/img/ritter/rs-14-hov.png'
    };
    array[15] = { 
        'text': 'Если ты фанат Италии, то наверняка знаешь, что в этой стране самое большое количество всемирно известных модельеров. Особенно рекомендуем посетить Италию любителям спортивных автомобилей, так как страна является их родиной. Проверь, готов ли ты к путешествиям? Ответь на 3 вопроса и выиграй призы от Ritter Sport и телеканала «Пятница!»',
        'img': '/img/ritter/rs-15-hov.png'
    };

    $(".drwrap .dritems .dritem").click(function () {
        var id = $(this).index()-Math.floor($(this).index()/15)*15+1;
        // window.location.href = '/test/'+id;
        console.log(stopclick)
        if(stopclick == "no") {
            choco_popup_show(id);
        }
    })
    function choco_popup_show(id) {
        
        $(".choco_popup_inner .choco_popup_content .text").html(array[id].text);
        $(".choco_popup_inner .choco_circle img").attr("src", array[id].img);
        $(".choco_popup_inner .bold_refer").attr("href", '/test/'+id);

        $(".choco_popup_inner").css("display","inline-block");
        $(".choco_popup").css('display','block').delay(100).queue(function () {  // delay() позволяет сделать паузу 
            $(".choco_popup").css('opacity', '1');
            $("body").css('overflow-y','hidden'); 
            $(".choco_popup").dequeue(); //должно применяться к тому же элементу что и .queue
        });
        $.scrollify.disable();
    };

    $(".dritems .dritem")
        .attr("data-stapLeft", 0)
        .attr("data-stapTop", 0)
        .attr("data-horizontCountOffsets", 1)
        .attr("data-verticalCountOffsets", 1);
    $(".dritems .dritem").attr("data-translate3dX", -260);
    $(".dritems .dritem").attr("data-translate3dY", -360);
    $(".dritems .dritem")
        .css({"transform": "translate3d("+$(".dritems .dritem").attr("data-translate3dX")+"px, "+$(".dritems .dritem").attr("data-translate3dY")+"px, 0px) "});

    function calc_position(status, event){
        /**
         * Узнаем крайние елементы
         *
         */
        if(stopLeft != 1) {
            stopLeft = 1
            setTimeout(function () {
                /**
                 * Если разница больше одной ячейки тогда нужно  передвигать
                 */
                    // var intervalHorizontal = setInterval(function () {
                let minX={
                        pos: $(".dritems .dritem").eq(0).offset().left,
                        ind: 0
                    };
                let maxX ={
                    pos: $(".dritems .dritem").eq(0).offset().left,
                    ind: 0
                };
                let minT={
                    pos: $(".dritems .dritem").eq(0).offset().top,
                    ind: 0
                };
                let maxT ={
                    pos: $(".dritems .dritem").eq(0).offset().top,
                    ind: 0
                };
                $(".dritems .dritem").each(function (index) {

                    if (minX.pos > ($(this).offset().left)) {
                        minX.pos = $(this).offset().left;
                        minX.ind = index;
                    }
                    if (maxX.pos < ($(this).offset().left)) {
                        maxX.pos = $(this).offset().left;
                        maxX.ind = index;
                    }
                    if (minT.pos > ($(this).offset().top)) {
                        minT.pos = $(this).offset().top;
                        minT.ind = index;
                    }
                    if (maxT.pos < ($(this).offset().top)) {
                        maxT.pos = $(this).offset().top;
                        maxT.ind = index;
                    }
                })
                let max_array = [];
                let min_array = [];
                $(".dritems .dritem").each(function (index) {
                    if (minT.pos == ($(this).offset().top)) {
                        max_array.push(index);
                    }
                    if (maxT.pos == ($(this).offset().top)) {
                        min_array.push(index);
                    }
                })

                /**
                 * Сравниваем кто дальше находится левый ряд или правый от границы контейнера(так же с верхним и нижним
                 */
                var wrapLeftBorder = $(".drwrap").offset().left
                var wrapRightBorder = $(".drwrap").offset().left + $(".drwrap").width()
                var wrapTopBorder = $(".drwrap").offset().top
                var wrapBottomBorder = $(".drwrap").offset().top + $(".drwrap").height()

                var elementLeftBorder = $(".drwrap .dritem").eq(minX.ind).offset().left
                var elementRightBorder = $(".drwrap .dritem").eq(maxX.ind).offset().left + $(".drwrap .dritem").eq(maxX.ind).width()
                var elementTopBorder = $(".drwrap .dritem").eq(minT.ind).offset().top
                var elementBottomBorder = $(".drwrap .dritem").eq(maxT.ind).offset().top + $(".drwrap .dritem").eq(maxT.ind).height()

                if (Math.abs((wrapLeftBorder - elementLeftBorder) - (elementRightBorder - wrapRightBorder)) > $(".drwrap .dritem").eq(maxX.ind).width() ) {
                    if ((wrapLeftBorder - elementLeftBorder) > (elementRightBorder - wrapRightBorder)) {
                        //console.log("Левый ряд в право")
                        let horizontCountOffsets = $(".dritems .dritem:nth-child(9n + " + (minX.ind + 1) + ")").attr("data-horizontCountOffsets");
                        $(".dritems .dritem:nth-child(9n + " + (minX.ind + 1) + ")").each(function (index) {
                            $(this)
                                .css("transition", "transform .0s linear")
                                .attr("data-stapLeft", $(".drwrap .dritem").eq(minX.ind).width()
                                    * 9 * horizontCountOffsets)
                                .attr("data-horizontCountOffsets", parseInt(horizontCountOffsets) + 1)
                            var _this = $(this);
                            setTimeout(function () {
                                _this.css("transition", "transform .2s linear")
                            }, 10)
                        })
                    } else {
                        /**
                         * наблюдал артефакты может быть нужно будет подолбаться
                         */
                            //console.log("Правый ряд в лево")
                        let horizontCountOffsets = $(".dritems .dritem:nth-child(9n + " + (maxX.ind + 1) + ")").attr("data-horizontCountOffsets");
                        $(".dritems .dritem:nth-child(9n + " + (maxX.ind + 1) + ")").each(function (index) {
                            $(this)
                                .css("transition", "transform .0s linear")
                                .attr("data-stapLeft", $(".drwrap .dritem").eq(maxX.ind).width()
                                    * 9 * (horizontCountOffsets - 1 ) )
                                .attr("data-horizontCountOffsets", parseInt(horizontCountOffsets) - 1)
                            var _this = $(this);
                            setTimeout(function () {
                                _this.css("transition", "transform .2s linear")
                            }, 10)
                        })

                    }
                }
                if( Math.abs((wrapTopBorder - elementTopBorder) - (elementBottomBorder - wrapBottomBorder )) > $(".drwrap .dritem").eq(maxX.ind).height() ){
                    if((wrapTopBorder - elementTopBorder) < (elementBottomBorder - wrapBottomBorder )){
                        // console.log("Нижний ряд в верх ")

                        let horizontCountOffsets = $(".dritems .dritem").slice(Math.min(...min_array),Math.max(...min_array)+1).attr("data-verticalCountOffsets");
                        $(".dritems .dritem").slice(Math.min(...min_array),Math.max(...min_array)+1).each(function (index) {
                            // $(".dritems .dritem").css("opacity", "1")
                            $(this)
                                .css("transition", "transform .0s linear")
                                .attr("data-stapTop", $(".drwrap .dritem").eq(maxX.ind).height()
                                    * 5 * (horizontCountOffsets==0?1:horizontCountOffsets) * -1 )
                                .attr("data-verticalCountOffsets", parseInt(horizontCountOffsets) + 1)
                            var _this = $(this);
                            setTimeout(function () {
                                _this.css("transition", "transform .2s linear")
                            }, 10)
                        })

                    } else {
                        // console.log("Верхний ряд в низ")
                        let horizontCountOffsets = $(".dritems .dritem").slice(Math.min(...max_array),Math.max(...max_array)+1).attr("data-verticalCountOffsets");
                        $(".dritems .dritem").slice(Math.min(...max_array),Math.max(...max_array)+1).each(function (index) {
                            // $(".dritems .dritem").css("opacity", "1")
                            //$(this).attr("data-verticalCountOffsets", parseInt(horizontCountOffsets) - 1)
                            $(this)
                                .css("transition", "transform .0s linear")
                                .attr("data-stapTop", $(".drwrap .dritem").eq(maxX.ind).height()
                                    * 5 * (horizontCountOffsets - 1) * - 1  )
                                .attr("data-verticalCountOffsets", parseInt(horizontCountOffsets) - 1)
                            var _this = $(this);
                            setTimeout(function () {
                                _this.css("transition", "transform .2s linear")
                            }, 10)

                        })
                    }
                    //console.log("Перестройка елементов по вертикали")
                }

                if(status == "collback"){
                    console.log("fix");
                    if( (Math.abs((wrapTopBorder - elementTopBorder) - (elementBottomBorder - wrapBottomBorder )) > $(".drwrap .dritem").eq(maxX.ind).height()) || Math.abs((wrapLeftBorder - elementLeftBorder) - (elementRightBorder - wrapRightBorder)) > $(".drwrap .dritem").eq(maxX.ind).width()){
                        $(".dritems .dritem").each(function (index){
                            $(this).css({"transform": "translate3d("
                                    + (event.clientX - $(this).attr("data-offsetLeftStart") + parseInt($(this).attr("data-stapLeft")) ) +"px, "
                                    + (event.clientY - $(this).attr("data-offsetTopStart") + parseInt($(this).attr("data-stapTop"))) + "px, 0px) "});

                        })
                    } else {
                        $(".dritems .dritem").each(function (index){
                            $(this).attr("data-translate3dX", (event.clientX - $(this).attr("data-offsetLeftStart") ))
                            $(this).attr("data-translate3dY", (event.clientY - $(this).attr("data-offsetTopStart") ))
                        })
                        $(".dritems .dritem").css("transition", "transform .2s linear")
                        clearInterval(finishinterval);
                    }
                }

                stopLeft = 0
            }, 10);
        }

    }

    $(".dritems").swipe( {
        //Generic swipe handler for all directions

        swipeStatus : function(event, phase, direction, distance, duration) {
            if(phase === 'start'){
                $(".dritems .dritem").each(function (index){
                    $(this).attr("data-offsetLeftStart", ( event.clientX - $(this).attr("data-translate3dX") ))
                    $(this).attr("data-offsetTopStart", ( event.clientY - $(this).attr("data-translate3dY") ))
                })
                // $(".dritems .dritem").attr("data-offsetLeftStart", ( event.clientX - $(this).attr("data-translate3dX") ))
                // $(".dritems .dritem").attr("data-offsetTopStart", ())
                // offsetLeftStart = event.clientX - $(".dritems .dritem").attr("data-translate3dX");
                // offsetTopStart = event.clientY - $(".dritems .dritem").attr("data-translate3dY");
                holdTimer = setTimeout(function(){
                    //code to run.
                },500); //<-- this is your hold threshold.  So the event will fire after 500ms.
            }

            if(phase === 'move' && distance > 10) {
                stopclick = "yes";
                $(".dritems .dritem").each(function (index){
                    $(this).css({"transform": "translate3d("
                            + (event.clientX - $(this).attr("data-offsetLeftStart") + parseInt($(this).attr("data-stapLeft")) ) +"px, "
                            + (event.clientY - $(this).attr("data-offsetTopStart") + parseInt($(this).attr("data-stapTop"))) + "px, 0px) "});

                })
            }
            if(phase === 'move' ) {

                calc_position("move", event)


                // console.log($(".dritems .dritem").eq(0).offset().left - $(".dritems").offset().left);
            }
            if(phase === 'move' && direction === 'left' && distance > 10){
                clearTimeout(holdTimer); //<-- clear the hold timeout
                //run code for swipe left event
            }else if(phase === 'move' && direction == 'right' && distance > 10){
                clearTimeout(holdTimer); //<-- clear the hold timeout
                //run code for swipe right event
            }else if(phase === 'cancel' || phase === 'end' && duration > 50 && duration < 350 && direction === null){
                clearTimeout(holdTimer); //<-- clear the hold timeout
                //run code for tap event.

            }else if(phase === 'end' && duration < 499){
                clearTimeout(holdTimer);
                //this clears the timeOut if the user doesn't meet the threshold of 500.
            }
        },


        swipe:function(event, direction, distance, duration, fingerCount, fingerData) {
            // console.log(event)
            setTimeout(function(){
                stopclick = "no";
            }, 100)
    
            $(".dritems .dritem").css("transition", "transform .0s linear");
            finishinterval = setInterval(function () {
                calc_position("collback", event)
            }, 10)

            // $(".dritems .dritem").each(function (index){
            //     $(this).attr("data-translate3dX", ( $(this).attr("data-translate3dX") ))
            //     $(this).attr("data-translate3dY", ( $(this).attr("data-translate3dY") ))
            // })
            // $(this).text("You swiped " + direction );
            // console.log(event);
            // console.log(fingerData);
            // $(".dritems").css("transform-origin", "");
            // console.log(event.clientY);
        }
    });


} );