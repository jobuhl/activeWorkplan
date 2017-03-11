// Event Datum auswählen (jQuery-Funktion)
$(".datepicker").datepicker();

// on click auf ein Event werden die options button darunter angezeigt
function openEventOptions(eventId) {

    // Div ueber Klasse rausfinden
    var options = $("." + eventId);

    // Wenn Options ausgeblendet (also nicht geoeffnet)
    if (options.is(':hidden')) {
        // zuerst alle offenen events schliessen
        $(".drop-btn div").hide();
        $(".drop-btn div").css('border-top', '1px solid white');

        // Options div einblenden
        options.show();
    } else {

        // Options div ausblenden
        options.hide();
        $(".drop-btn div").css('border-top', 'none');
    }

    // Footer neu setzen, falls laengerer Kalender
    fixFooter();
}


// Employee or Admin changes Time Event
function openModalEvent(eventDivIdPrefix, eventId, modalId, tableDate) {

    var event = $("#" + modalId);

    // Absichtlich nur vor dem default ein break; gesetzt, damit alle cases durchlaufen werden koennen
    switch (modalId) {

        case 'modal-event-admin-add-final':
        case 'modal-event-admin-change-final':

            //Daten aus dem Event auslesen
            var employee = $("#" + eventDivIdPrefix + eventId + " .event-employee-hidden").text();

            // um beim submit im Controller auf die id zugreifen zu können
            event.find(".employee-overwrite").val(employee);

        case 'modal-event-employee-change':

            //Daten aus dem Event auslesen
            var date = $("#" + eventDivIdPrefix + eventId + " .event-date-hidden").text();
            var category = $("#" + eventDivIdPrefix + eventId + " .event-category").text();

            // Eventuell befuellt
            var from = $("#" + eventDivIdPrefix + eventId + " .event-from").text();
            var to = $("#" + eventDivIdPrefix + eventId + " .event-to").text();

            if (from != '' && to != '') {
                openTime();

                // Uebertragen der daten in das change-modal
                event.find(".from-overwrite").val(from);
                event.find(".to-overwrite").val(to);
            } else {
                hideTime();
            }

            // Uebertragen der daten in das change-modal
            event.find(".category-overwrite").text(category);

            // um beim submit im Controller auf die id zugreifen zu können
            event.find(".id-overwrite").val(eventId);

        case 'modal-event-employee-add':

            // date der Tabellenspalte aus dem Add-Button
            if (modalId == 'modal-event-employee-add') {
                var date = tableDate;
            }

            // Uebertragen der daten in das change-modal
            event.find(".date-overwrite").val(date);
            break;

        default:
        // alert('openModalEvent Error');
    }

    // change modal oeffnen
    $("#open-" + modalId).click();
}

/* ------------------------------- AJAX ----------------------------------- */

// Delete Event
function deleteEventAJAX(divPrefix, eventId, routesURL) {
    var thisEvent = $("#" + divPrefix + eventId);

    // zuerst einfach ausblenden
    thisEvent.hide();

    // danach mit AJAX in der datenbank loeschen
    thisEvent.load(routesURL + '?eventId=' + eventId);
}


/* -------------------------------  Modal Event Show Hide Time ----------------------------------- */

function toggleTime() {

    // Button Inhalt Text
    var buttonText = $(".time-button-overwrite").html();

    if (buttonText == "Show Time") {
        openTime();
    }

    if (buttonText == "Hide Time"){
        hideTime();
    }
}

function openTime() {

    // Options div einblenden
    $(".hide-time-input").show();

    // Show / Hide Button change text
    $(".time-button-overwrite").text("Hide Time");
}

function hideTime() {

    // Options div ausblenden
    $(".hide-time-input").hide();

    // Show / Hide Button change text
    $(".time-button-overwrite").text("Show Time");

    // Empty input values -> damit controller erkennt, ob alldayx oder time
    $(".empty-overwrite").val("");
}




// Drag and Drop
// function allowDrop(ev) {
//     ev.preventDefault();
// }
//
// function drag(ev) {
//     ev.dataTransfer.setData("text", ev.target.id);
// }
//
// function drop(ev, date) {
//     ev.preventDefault();
//     var data = ev.dataTransfer.getData("text");
//     ev.target.appendChild(document.getElementById(data));
// }