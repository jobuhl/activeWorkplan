/* Beim Laden der Seite Footer ausrichten */
window.onload = fixFooter(), highlightTab();

// /* Diese Variante ist langsamer */
// window.onload = function () {
//     fixFooter();
//     highlightTab();
// };

function highlightTab() {

    /* Pfadname der aktuellen Datei auslesen */
    var url = window.location.pathname;

    /* Regular Expression Literale mit Slashes, Gruppierung und Alles durch Gruppe 2 ersetzen */
    var tabId = url.replace(/.+(guest|admin|employee)\/([a-zA-Z_-]+).*/, "$2");

    /* Sonderfall, da die Mitarbeiter Seite im gleichen Tab wie Planning ist */
    if (tabId == "planning-employee") {
        tabId = "planning-store";
    }

    /* da die header Listen-IDs gleich benannt sind wie die dateien, kann ich diese exakt ansprechen */
    $('ul li #' + tabId).addClass('myActive');

    /* Den schoenen TabNamen an die PLaceholder Stelle im Header bei Mobil-Ansicht setzen */
    var placeholder = $("li #" + tabId).text();
    $(".nav-placeholder a").text(placeholder);
}

function toggleMakeResponsive() {
    /* ohne ID klappts nicht */
    var rightList = $("#id-right")[0];
    var leftList = $("#id-left")[0];

    /* Wenn Element NUR "right-list Klasse enthaelt, also nicht "responsive" */
    if (rightList.className === "right-list") {

        /* Responsive Class hinzufuegen */
        rightList.className += " responsive";

        /* nicht anzeigen des Placeholders */
        leftList.className += " responsive";

        /* Body quasi runter schieben */
        changeSectionUnderHeader("down");

    } else {
        /* beim zweiten Klick auf den Toggle Dropdown schliessen */
        rightList.className = "right-list";

        /* beim zweiten Klick auf den Toggle Placeholder wieder anzeigen */
        leftList.className = "left-list";

        /* Den Body quasi wieder hoch schieben */
        changeSectionUnderHeader("up");
    }
}

function getHeaderHeight() {
    var amountListElements = 0;

    if ($("#id-right")[0].className === "right-list responsive") {

        /* berechnet anzahl an li der ul.right-list */
        $('header ul.right-list li').each(function () {
            amountListElements += 1;
        });
    }
    return amountListElements
}


function changeSectionUnderHeader(decision) {

    /* Hoehe der Section unterm Header vergroessern / verkleinern */
    if (decision == "down") {
        $('.space-under-header')[0].style.height = (getHeaderHeight() + 1) * 60 + "px";
    } else {
        $('.space-under-header')[0].style.height = "60px";
    }

    /* Erneut abstimmen, ob Body kleiner/groesser Display */
    fixFooter();
}

function fixFooter() {
    /* Hoehe von Body und Window(Display) */
    /* 120 wegen header-hoehe plus footer-hoehe */
    var bodyHeight = $(".fake-body").height() + getHeaderHeight() + 120;

    var windowHeight = $(window).height();
    // alert("fake-body: " + bodyHeight + "\nwindow     : " + windowHeight + "\nVielleicht Problem mit Bootstrap Klassen (col-xx-xx)");

    /* Wenn Window groesser Body */
    if (windowHeight > bodyHeight) {
        /* Footer absolut an den unteren Displayrand setzen */
        $("footer").css("position", "absolute").css("bottom", 0).css("width", "100%");
    } else {
        /* Footer unterhalb des Body-Inhalts anzeigen */
        $("footer").css("position", "relative");
    }
}

/* Immer wenn Window-Groesse veraendert wird Footer ausrichten */
$("body")[0].onresize = function () {

    /* Wenn bspw. Dropdown menu unten und Fenster wird klein gezogen, soll auch der Content wieder nach oben */
    if ($(window).width() >= 767) {
        changeSectionUnderHeader("up");
    }

    /* Wenn Dropdown eigentlich unten war, fenster breiter wurde und wieder kleiner wird, soll kontent wiedre nach unten */
    if ($(window).width() < 767 && $("#id-right")[0].className === "right-list responsive") {
        changeSectionUnderHeader("down");
    }

    fixFooter();
};

/** In Overview wird nichts bearbeitet, deshalb der Verweis auf Planning */
/* on click down auf jedes Event im Admin Overview */
$(".overview .drop-btn, .workplan .drop-btn").mousedown(function () {

    /* Hintergund hervorgehoben */
    $("header #planning-store, header #planning").addClass("header-flash");
    $(".nav-toggle").addClass("header-flash");
});

/* on click up auf jedes Event im Admin Overview */
$(".overview .drop-btn, .workplan .drop-btn").mouseup(function () {

    /* Hintergund wieder wie zuvor: grau */
    $("header #planning-store, header #planning").removeClass("header-flash");
    $(".nav-toggle").removeClass("header-flash");

});


/* Click on a Select Element */
$(".select-div").click(function () {

    // Read value of this element */
    var parentValue = $(this).find(".select-text:first-child").text();

    /* search for all Options */
    $(this).parent().find(".select-p").each(function () {

        /* remove the Highlight Class on every Option */
        $(this).removeClass("select-highlight");

        if ($(this).text() == parentValue) {
            /* Add the Highloight Class on the Option where the input is the same as the selected one */
            $(this).addClass("select-highlight");
        }
    });

    /* Change Arrow */
    toggleArrow($(this).find("#select-arrow"));

    /* Show or Hide the Options menu */
    $(this).siblings().toggle();
});

/* Click on a Select-Option Element */
$(".select-p").click(function () {

    /* read the value of the clicked Option */
    var selectedValue = $(this).text();

    /* Set the text of the selected parent div new */
    $(this).parent().siblings().find(".select-text").text(selectedValue);
    $(this).parent().siblings().find(".select-text").val(selectedValue);

    var arrowDiv = $(this).parent().siblings().find("#select-arrow");
    toggleArrow(arrowDiv);

    /* Hide the Options menu */
    $(this).parent().hide();
});


function toggleArrow(thisObject) {
    if (thisObject.hasClass("arrow-down")) {

        // Open Dropdown Content
        thisObject.parent().parent().find(".select-div").css("z-index", "20");
        thisObject.parent().parent().find(".select-hidden").css("z-index", "19");
        thisObject.parent().parent().find(".select-p").css("z-index", "18");

        // Turn arrow downside
        thisObject.removeClass("arrow-down");
        thisObject.addClass("arrow-up");
    } else {
        if (thisObject.hasClass("arrow-up")) {

            // Close Dropdown Content
            thisObject.parent().parent().find(".select-div").css("z-index", "10");
            thisObject.parent().parent().find(".select-hidden").css("z-index", "9");
            thisObject.parent().parent().find(".select-p").css("z-index", "8");


            // Turn arrow upside
            thisObject.removeClass("arrow-up");
            thisObject.addClass("arrow-down");
        }
    }
}
