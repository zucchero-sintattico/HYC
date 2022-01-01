let quadri = [];

function checkerSize(selector, initialFrom, initialTo){
    if ($(window).width() < 768) {

        selector.each(function () {
            $(this).removeClass(initialFrom);
            $(this).addClass(initialTo);
        });

    } else {
        selector.each(function () {
            $(this).removeClass(initialTo);
            $(this).addClass(initialFrom);
        });
    }
}


function checkOnResize(selector, initialFrom, initialTo) {
    checkerSize(selector,initialFrom,initialTo);
    $(window).on('resize', function () {
        modifyIndexIfMobile();
        checkerSize(selector,initialFrom,initialTo);
    });
}

let hasAlreadySwapped = false;

function modifyIndexIfMobile(){

    let scrollbarIndicator = `<img src="img/logos/square.gif" class='rounded p-3' alt='scrollbar icon percentage indicator'>`;

    if ($(window).width() < 768) {
        if(!hasAlreadySwapped){

            $(".scrollbarIndicator").each(function(){

                let numProducts  = $(this).parent().find(".productWhole").length;

                if(numProducts > 1){
                    $(this).show();

                    for(let i=0;i<numProducts;i++){

                        $(this).append(scrollbarIndicator);
                    }
                    let singleSpace = 100/numProducts;
                    $(this).find("img").css("max-width", `${singleSpace}%`);
                    //$(this).find("img").css("max-height", `30%`);

                    $(this).prev().find(" > div").on("scroll",function (){
                        let scrollPercentage = 100*this.scrollLeft/this.scrollWidth/(1-this.clientWidth/this.scrollWidth);
                        let scrollVisibleWidth = $(this).width();
                        let scrolledWidth = this.scrollLeft;
                        let currentlyVisible = [];
                        $(this).find(".productWhole").each(function(){
                            let offsetPr = (this.offsetLeft+($(this).width()/2))-scrolledWidth;
                            if(offsetPr > 0 && offsetPr < scrollVisibleWidth){
                                currentlyVisible.push($(this).index());
                            }

                        });

                        $(this).parent().parent().find("img").each(function(){
                            if(currentlyVisible.includes($(this).index())){
                                $(this).css("transform", "scale(1.3,1.3)");
                                $(this).css("filter", "brightness(0.5)");
                            }else{
                                $(this).css("transform", "scale(1,1)");
                                $(this).css("filter", "brightness(1)");
                            }
                        })

                    })

                }else{
                    $(this).hide();
                }
            });
            hasAlreadySwapped = true
        }

    } else {
        hasAlreadySwapped = false;
        $(".scrollbarIndicator").hide();
        console.log("HO SVUOTATOOOOOO");
        $(".scrollbarIndicator").empty();
    }
}





