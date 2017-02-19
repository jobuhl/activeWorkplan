// Event Datum auswählen (JavaScript-Funktion)
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



// Employee changes Allday Event
function openModalChangeAllday(eventDivIdPrefix, eventId) {

    //Daten aus dem Event auslesen
    var date = $("#" + eventDivIdPrefix + eventId + " .event-date-hidden").text();
    var category = $("#" + eventDivIdPrefix + eventId + " .event-category").text();

    // change modal oeffnen
    $("#open-modal-change-allday-event").click();

    // uebertragen der daten in das change-modal
    $("#modal-change-allday-event .category-overwrite").text(category);
    $("#modal-change-allday-event .date-overwrite").val(date);

    // um beim submit im Controller auf die id zugreifen zu können
    $("#modal-change-allday-event .id-overwrite").val(eventId);
}


// Employee changes Time Event
function openModalChangeTime(eventDivIdPrefix, eventId) {

    //Daten aus dem Event auslesen
    var employee = $("#" + eventDivIdPrefix + eventId + " .event-employee-hidden").text();
    var date = $("#" + eventDivIdPrefix + eventId + " .event-date-hidden").text();
    var category = $("#" + eventDivIdPrefix + eventId + " .event-category").text();
    var from = $("#" + eventDivIdPrefix + eventId + " .event-from").text();
    var to = $("#" + eventDivIdPrefix + eventId + " .event-to").text();

    // change modal oeffnen
    $("#open-modal-change-time-event").click();

    // uebertragen der daten in das change-modal
    $("#modal-change-time-event .category-overwrite").text(category);
    $("#modal-change-time-event .date-overwrite").val(date);
    $("#modal-change-time-event .from-overwrite").val(from);
    $("#modal-change-time-event .to-overwrite").val(to);

    // um beim submit im Controller auf die id zugreifen zu können
    $("#modal-change-time-event .id-overwrite").val(eventId);
    $("#modal-change-time-event .employee-overwrite").val(employee);
}


// Round-Button Employee-Planning Add Store
function openModalAddEvent(date) {

    // change modal oeffnen
    $("#open-modal-add-event").click();

    // uebertragen der daten in das change-modal
    $("#modal-add-event .date-overwrite").val(date);
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