let quadri = [];

function checkerSize(selector, initialFrom, initialTo) {
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
    checkerSize(selector, initialFrom, initialTo);
    $(window).on('resize', function () {
        modifyIndexIfMobile();
        checkerSize(selector, initialFrom, initialTo);
    });
}

let hasAlreadySwapped = false;
let hasSwappedToMob = false;
let hasSwappedBackToDesk = false;

function modifyProfileIfMobile() {

    if ($(window).width() < 768) {

        if (!hasSwappedToMob) {
            $(".orderHistory").hide();
            $(".rowForOrderHistoryBtn").hide();
            $("#orderHistoryBtn").show();

            if ($(".editableInfo").is(":visible")) {
                $(".notEditableInfo").hide();
                $(".editableInfo").show();
            } else {
                $(".notEditableInfo").show();
                $(".editableInfo").hide();
            }

            hasSwappedToMob = true;
            hasSwappedBackToDesk = false;
        }
        return true;
    } else {
        if (!hasSwappedBackToDesk) {
            $("#orderHistoryBtn").hide();
            $(".orderHistory").show();

            if ($(".editableInfo").is(":visible")) {
                $(".notEditableInfo").hide();
                $(".editableInfo").show();
            } else {
                $(".notEditableInfo").show();
                $(".editableInfo").hide();
            }

            $("#orderHistoryBtn").text("Show Order History");
            hasSwappedToMob = false;
            hasSwappedBackToDesk = true;
        }

        return false;
    }
}

$(document).on("ready", function () {
    let page = window.location.pathname;

    if (page === "/index.php" || page === "/") {
        $(".indexHref > p").css("color", "#2F4A74").css("font-size", "23px");
        $(".indexHref img").css("filter", "invert(28%) sepia(17%) saturate(1598%) hue-rotate(178deg) brightness(89%) contrast(92%)");
    } else if (page === "/cart.php") {
        $(".cartHref > p").css("color", "#2F4A74").css("font-size", "23px");
        $(".cartHref img").css("filter", "invert(28%) sepia(17%) saturate(1598%) hue-rotate(178deg) brightness(89%) contrast(92%)");
    } else if (page === "/profile.php") {
        $(".profileHref > p").css("color", "#2F4A74").css("font-size", "23px");
        $(".profileHref img").css("filter", "invert(28%) sepia(17%) saturate(1598%) hue-rotate(178deg) brightness(89%) contrast(92%)");
    } else if (page === "/search.php") {
        $(".searchHref > p").css("color", "#2F4A74").css("font-size", "23px");
        $(".searchHref img").css("filter", "invert(28%) sepia(17%) saturate(1598%) hue-rotate(178deg) brightness(89%) contrast(92%)");
    }

    window.setTimeout(() => {
        //validation code
        $("span").removeAttr("cm-text");
        $(".CodeMirror textarea").attr("title", "code main frame area").removeAttr("autocorrect").removeAttr("wrap");
        $(".CodeMirror span").removeAttr("cm-text");
        $(".CodeMirror div").removeAttr("cm-not-content").removeAttr("autocorrect");
        $(".cm-tab").removeAttr("cm-text");
    },1200)

})

function modifyIndexIfMobile() {

    if ($(window).width() < 768) {
        let scrollbarIndicator = `<img src="img/logos/square.gif" class='rounded p-2 m-1' alt='scrollbar icon percentage indicator'>`;

        if (!hasAlreadySwapped) {

            $(".scrollbarIndicator").each(function () {

                let numProducts = $(this).parent().find(".productWhole").length;

                if (numProducts > 1) {
                    $(this).show();
                    for (let i = 0; i < numProducts; i++) {
                        $(this).append(scrollbarIndicator);
                    }

                    //let singleSpace = 100 / numProducts;
                    if($(window).width() < numProducts * (40 + 20)){
                        let singleSpace = 100 / numProducts;
                        $(this).find("img").css("max-width", `${singleSpace}%`);
                    }
                    else{
                        $(this).find("img").css("max-width", `40px`);
                    }


                    $(this).prev().find(" > div").on("scroll", function () {
                        //let scrollPercentage = 100 * this.scrollLeft / this.scrollWidth / (1 - this.clientWidth / this.scrollWidth);
                        let scrollVisibleWidth = $(this).width();
                        let scrolledWidth = this.scrollLeft;
                        let currentlyVisible = [];

                        $(this).find(".productWhole").each(function () {
                            let offsetPr = (this.offsetLeft + ($(this).width() / 2)) - scrolledWidth;
                            if (offsetPr > 0 && offsetPr < scrollVisibleWidth) {
                                currentlyVisible.push($(this).index());
                            }
                        });

                        $(this).parent().parent().find("img").each(function () {
                            if (currentlyVisible.includes($(this).index())) {
                                $(this).css("transform", "scale(1.4,1.4)");
                                $(this).attr("src", "img/logos/greySquare.jpg")
                            } else {
                                $(this).css("transform", "scale(1,1)");
                                $(this).attr("src", "img/logos/square.gif")
                            }

                        })

                    });

                    $(this).find("img").on("click", function () {
                        console.log("aaaa");
                        let index = $(this).index();
                        let scrollableArea = $(this).parent().prev().find("> div");
                        scrollableArea.stop();
                        let elemToScrollToPos = scrollableArea.find(".productWhole").eq(index)[0].offsetLeft;
                        scrollableArea.scrollLeft(elemToScrollToPos);
                    });

                    $(".categories > section > div img").each(function () {
                        if ($(this).index() === 0) {
                            $(this).css("transform", "scale(1.37,1.37)");
                            $(this).attr("src", "img/logos/greySquare.jpg")
                        }
                    });

                } else {
                    $(this).hide();
                }
            });
            hasAlreadySwapped = true
        }

    } else {
        hasAlreadySwapped = false;
        const scrollbarIndicator = $(".scrollbarIndicator");
        scrollbarIndicator.hide();
        scrollbarIndicator.empty();
    }
}






