$(document).ready(function(){
    $("nav li a").lastChild().click(function(){
        if($(this).hasClass("selected")){
            // btn cliccato
            // nascondo elemento
            hideElement($(this));
        }
        else{
            // bt non cliccato
            // nascondo elemento precedentemente cliccato
            hideElement($("button.selected"));
            // Aggiungo la classe al bottone clickato
            $(this).addClass("selected");
            // Aggiungo l'animazione al div
            $(this).next().slideDown();
        }
    });
});