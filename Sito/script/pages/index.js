
$(document).on("ready", function (event) {
    event.preventDefault();
    $.getJSON("/API/api-homepage.php", function (data) {
        fillHomePage(data);
        let categoriesContainer = $(".categories > div > div:nth-child(2)");
        checkOnResize(categoriesContainer,"container", "container-fluid ");
        checkOnResize(categoriesContainer.find("> div"),"row", "row flex-row flex-nowrap overflow-auto");
    });

});