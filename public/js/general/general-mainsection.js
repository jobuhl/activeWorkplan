window.onload = function() {
    getMarginMainSection();
}

/* damit text in mainsection wegen "absolut" nicht komplette unten steht, sondern auf hoehe des bildes */
function getMarginMainSection() {
    var margin = $(".mainsection article").css("padding-bottom");
    $(".mainsection h2").css("bottom", margin);
}