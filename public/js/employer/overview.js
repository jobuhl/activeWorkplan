function overviewKachel() {
    /* right-aside auf volle breite setzen */
    $(".overview.my-right-side").removeClass("col-sm-9 list");
    $(".overview.my-right-side").addClass("col-sm-12 kachel");

    /* workplans auf halbe Seite-breite bringen */
    $(".overview.my-right-side aside").removeClass("col-xs-12");
    $(".overview.my-right-side aside").addClass("col-xs-12 col-md-6");

    /* Side-Bar ausblenden */
    $(".overview.side-bar").css("display", "none");

    /* Trennlinie zwischen side-bar und right-aside ausblenden */
    $(".overview.my-right-side").css("border", "none");
    $(".overview.side-bar").css("border", "none");

}

function overviewList() {
    /* right-aside wieder zurueck auf 9/12 breite */
    $(".overview.my-right-side").removeClass("col-sm-12 kachel");
    $(".overview.my-right-side").addClass("col-sm-9 list");

    /* workplans wieder auf volle Seite-breite bringen */
    $(".overview.my-right-side aside").removeClass("col-xs-12 col-md-6");
    $(".overview.my-right-side aside").addClass("col-xs-12");

    /* Side-bar wieder einblenden */
    $(".overview.side-bar").css("display", "block");

    /* Trennlinie zwischen side-bar und right-aside wieder einblenden */
    sideBarBorder();
}

/* Wenn ein Listen-Element der Sidebar angeklickt wird */
$('.overview.side-bar .headline ').click(function() {

    /* Klick nur ermöglichen, wenn mobile Ansicht */
    if ($("body").width() <= 767) {

        /* Falls die Unterliste (Mitarbeiternamen) versteckt sind */
        if ($(this).parent().children("ul").is(':hidden')) {

            /* zeig die Unterliste an */
            $(this).parent().children("ul").show();
        } else {

            /* verstecke die Unterliste */
            $(this).parent().children("ul").hide();
        }
    }
});

/* Wenn in mobiler ansicht stores nicht angezeigt UND window vergroessern -> Store Liste automatisch anzeigen */
$('body')[0].onresize = function () {
    if ($("body").width() >= 768) {

        /* Side-bar unterliste (Store Auflistung) wieder anzeigen */
        $(".overview.side-bar > ul").show();

        /* Linie zwischen side-bar und right-side neu ausrichten */
        sideBarBorder();
    } else {

        /* Side-bar unterliste (Store Auflistung) zu machen */
        $(".overview.side-bar > ul").hide();

        /* Linie zwischen side-bar und right-side neu ausrichten */
        sideBarBorder();
    }
};