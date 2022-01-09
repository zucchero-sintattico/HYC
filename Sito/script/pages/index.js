$(document).on("ready", function (event) {
    $("main").append("<div class='row justify-content-center'><img src='../img/loading/loading.png' alt='loading...'></div>");
    const loadingGif = $("main > div:first-child");

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

        window.setTimeout(() => {
            modifyIndexIfMobile();
            loadingGif.remove();
            const mainContent = $("main > div:nth-child(1)");
            mainContent.show();
        }, 600);

        
    });
});