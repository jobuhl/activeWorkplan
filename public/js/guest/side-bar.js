/* Wenn Seite neu geladen */
window.onload = function () {
    /* Trennlinie nur berechnen */
    sideBarBorder();
};

/* Wenn Fenster vergroessert oder verkleinert wird */
$('body')[0].onresize = function () {
    sideBarBorder();
};

function sideBarBorder() {

    /* Nur wenn Fensterbreite auf "nicht-mobil" dargestellt */
    if ($(window).width() >= 768) {
        /* Links: Side-Bar Hoehe */
        var sideBar = $(".side-bar").height();

        /* Rechts: Aside Hoehe */
        var rightSide = $(".my-right-side").height();

        /*alert("sideBar: " + sideBar + "\nrightSide: " + rightSide);*/

        if (sideBar > rightSide) {
            /* Wenn Side-bar hoeher: An rechte Seite der Side-bar Trennlinie zum aside setzen */
            $(".side-bar").css("border-right", "1px solid var(--grey-border)");
        } else {
            /* Wenn rechtes aside hoeher: An linke Seite des aside Trennlinie zur side-bar setzen */
            $(".my-right-side").css("border-left", "1px solid var(--grey-border)");
        }
    } else {
        /* Wenn Mobil: keine border */
        $(".my-right-side").css("border", "none");
        $(".side-bar").css("border", "none");
    }
}


/* Wenn ein Listen-Element der Sidebar angeklickt wird */
$('.each-element').click(function () {

    /* Falls die Unterliste (Mitarbeiternamen) versteckt sind */
    if ($(this).children("ul").is(':hidden')) {

        /* zeigt die Unterliste an */
        $(this).children("ul").show();
    } else {

        /* verstecke die Unterliste */
        $(this).children("ul").hide();
    }
});

/* ------------------------------- AJAX ----------------------------------- */

// Delete Event
function searchStoreEmp(storeUrl, week, requestUrl, search) {
    var targetDiv = $("#lower-list");
    // mit AJAX in der datenbank loeschen
    targetDiv.load(requestUrl + '?search=' + search + '&week=' + week + '&storeUrl=' + storeUrl);
}
