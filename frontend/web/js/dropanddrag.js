$( function() {
    let stopLeft = 0;
    var finishinterval;
    let items = $.trim($(".drwrap .dritems").html())
    $(".drwrap .dritems").html(items+items+items);
    $(".drwrap .dritems .dritem").click(function () {
        var id = $(this).index()-Math.floor($(this).index()/15)*15+1;
        window.location.href = '/test/'+id;
    })
    // $("")

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