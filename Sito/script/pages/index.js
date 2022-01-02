
$(document).on("ready", function (event) {
    event.preventDefault();
    $.getJSON("/API/api-homepage.php", function (data) {
        fillHomePage(data);
        let categoriesContainer = $(".categories > div > div:nth-child(2)");
        let categoriesScroller = $(".categories > div");

        $(categoriesScroller).append(`
            <div class='d-flex justify-content-center text-center scrollbarIndicator'>
            </div>`);

        checkOnResize(categoriesScroller,"col", "col-10");
        checkOnResize(categoriesContainer,"container", "container-fluid ");
        checkOnResize(categoriesContainer.find("> div"),"row", "row flex-row flex-nowrap");

        let scrollTimeout = null;
        let prevScrollTop = 0;
        $(window).on("scroll", function(){
            clearTimeout(scrollTimeout);
            let actualScrollTop = $(this).scrollTop();
            console.log("actual->"+actualScrollTop)
            console.log("prev->"+prevScrollTop)
            scrollTimeout = setTimeout(function (){
                    $(".productWhole").each(function(){
                        let randomValue = Math.random() * 30;
                        if(prevScrollTop < actualScrollTop){
                            randomValue = -randomValue;
                        }
                        $(this)[0].animate([{transform: `translateY(${randomValue}px)`,easing:"ease-out"},{transform: `translateY(0)`,easing:"ease-out"}],{duration: 400})
                    });

            prevScrollTop = actualScrollTop;
            }, 50);
        })

        window.setTimeout(() => {
            modifyIndexIfMobile();
        }, 600);
    });
});