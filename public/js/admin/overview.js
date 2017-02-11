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