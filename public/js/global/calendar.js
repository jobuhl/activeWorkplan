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

        /** Employee change Time
         *  Admin add final Time
         *  Admin change finale Time */
        case 'modal-change-time-event-admin-add-final':
        case 'modal-change-time-event-admin-change-final':
        case 'modal-change-time-event-employee':

            //Daten aus dem Event auslesen
            var employee = $("#" + eventDivIdPrefix + eventId + " .event-employee-hidden").text();
            var from = $("#" + eventDivIdPrefix + eventId + " .event-from").text();
            var to = $("#" + eventDivIdPrefix + eventId + " .event-to").text();

            // Uebertragen der daten in das change-modal
            event.find(".from-overwrite").val(from);
            event.find(".to-overwrite").val(to);

            // um beim submit im Controller auf die id zugreifen zu können
            event.find(".employee-overwrite").val(employee);

        /** Employee change Allday */
        case 'modal-change-allday-event':

            //Daten aus dem Event auslesen
            var date = $("#" + eventDivIdPrefix + eventId + " .event-date-hidden").text();
            var category = $("#" + eventDivIdPrefix + eventId + " .event-category").text();

            // Uebertragen der daten in das change-modal
            event.find(".category-overwrite").text(category);

            // um beim submit im Controller auf die id zugreifen zu können
            event.find(".id-overwrite").val(eventId);

        /** Employee add Allday
         *  Employee Add Time */
        case 'modal-add-event':

            // date der Tabellenspalte aus dem Add-Button
            if (modalId == 'modal-add-event') {
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

/* ------------------------------- AJAX ----------------------------------- */

// Delete Event
function deleteEventAJAX(divPrefix, eventId, routesURL) {
    var thisEvent = $("#" + divPrefix + eventId);

    // zuerst einfach ausblenden
    thisEvent.hide();

    // danach mit AJAX in der datenbank loeschen
    thisEvent.load(routesURL + '?eventId=' + eventId);
}


/* ------------------------------- Add Event Show Time ----------------------------------- */

function openTimeInput() {

    // Div ueber Time rausfinden
    var time = $(".hide-time-input");
    var button = $(".overwrite-time-button");
    var input = $(".overwrite-empty");
    var category = $(".hide-option");

    // Wenn Time ausgeblendet (also nicht geoeffnet)
    if (time.is(':hidden')) {

        // Options div einblenden
        time.show();

        // Show / Hide Button change text
        button.text("Hide Time");
    } else {

        // Options div ausblenden
        time.hide();

        // Show / Hide Button change text
        button.text("Show Time");

        // Empty input values -> damit controller erkennt, ob alldayx oder time
        input.val("");
    }
}
