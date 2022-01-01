
$(document).on("ready", function (event) {
    event.preventDefault();
    $.getJSON("/API/api-homepage.php", function (data) {
        fillHomePage(data);
        let categoriesContainer = $(".categories > div > div:nth-child(2)");
        let categoriesScroller = $(".categories > div");
        $(categoriesScroller).append(`
            <div class='d-flex justify-content-center text-center scrollbarIndicator'>
            </div>`);
        modifyIndexIfMobile();



        checkOnResize(categoriesScroller,"col", "col-10");
        checkOnResize(categoriesContainer,"container", "container-fluid ");
        checkOnResize(categoriesContainer.find("> div"),"row", "row flex-row flex-nowrap");

    });

});