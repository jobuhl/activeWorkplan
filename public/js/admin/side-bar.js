/* Wenn Seite neu geladen */
window.onload = sideBarBorder(), highlightEmployee();

// /* Diese Variante ist langsamer */
// window.onload = function () {
//     sideBarBorder();
//     highlightEmployee();
// };

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
        $(this).find("a.element-arrow").text("⋀");
    } else {

        /* verstecke die Unterliste */
        $(this).children("ul").hide();
        $(this).find("a.element-arrow").text("⋁");
    }
});


/* JavaScript Filter */
function searchStoreEmp(search) {

    var list = $(".each-element");
    if (search != "") {

        /* Wenn Store nicht dabei -> ausblenden */
        $(list).find(".element-text:not(:Contains(" + search + "))").parent().hide();

        /* Wenn Store gefunden -> anzeigen */
        $(list).find(".element-text:Contains(" + search + ")").parent().show();

        /* Wenn Employee nicht dabei -> ausblenden */
        $(list).find(".element-sub-text:not(:Contains(" + search + "))").parent().hide();

        /* Wenn Employee gefunden -> anzeigen + Store anzeigen */
        var element = $(list).find(".element-sub-text:Contains(" + search + ")");
        element.parent().show();
        element.parent().parent().siblings().show();

    } else {

        /* Alle anzeigen */
        $(list).find(".element-sub-text, .element-text").parent().show();
    }
}

// :contains von jQuery ueberschreiben, damit CASE-INSENSITIV
jQuery.expr[':'].contains = function(a, i, m) {
    return jQuery(a).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
};

function highlightEmployee() {

    // Planning-Single Header Ueberschruft
    var employee = $(".highlight-sidebar").text();

    if (employee != "") {

        // Element finden
        var element =  $(".each-element").find(".element-sub-text:Contains(" + employee + ")").parent();

        // komplette Store-Unterliste anzeigen
        element.parent().show();
        element.parent().siblings().find(".element-arrow").text("⋀");

        // Employee-Unterlisten-Element Hintegrundfarbe und Fett
        element.css('background-color', 'var(--grey-50)').css('font-weight', '500');
      }
}


/* Show Sub-List wenn in search-feld geklickt */
function showSubList(search) {
    if (search == "") {
        $(".sub-element").show();
        $(".element-arrow").text("⋀");
    }
}


/* Hide Sub-List wenn nicht in search-feld geklickt */
$(document).mouseup(function (e) {

    if (!$(".side-bar-search, .element-arrow").is(e.target)) {

        $(".sub-element").hide();
        $(".element-arrow").text("⋁");
    }
});
