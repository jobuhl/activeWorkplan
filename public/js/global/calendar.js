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
            // event.find(".category-overwrite").text(category);
            $(".selectpicker").val(category);


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
        allowSendButton(false);
        // $(".selectpicker option").hide();
    }

    if (buttonText == "Hide Time") {
        hideTime();
        allowSendButton(true);
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

function validateTimeInput(inputClass) {

    var readyToSend = true;

    var from = $(".from-overwrite").val();
    var to = $(".to-overwrite").val();
    var inputValue = inputClass == "from-overwrite" ? from : to;

    // Schnellschreibweise, wenn erste Zahl 3,...,9
    if (inputValue.length == 1 && (new RegExp("[3-9]")).test(inputValue)) {

        inputValue = "0" + inputValue + ":";

        if (inputClass == "from-overwrite") {
            from = inputValue;
        } else {
            to = inputValue;
        }
    }

    if (!isCorrect(inputValue) || isFromHigherTo(from, to)) {

        if (inputValue.length == 3 && inputValue.substring(0, 1) == "0") {
            inputValue = "";
        } else {
            inputValue = deleteLastCharacter(inputValue);
        }
    }

    if ((from.length + to.length) % 10 == 0) {
        if (from >= to) {
            inputValue = deleteLastCharacter(inputValue);
            readyToSend = false;
        }
    } else {
        readyToSend = false;
    }

    $("." + inputClass).val(inputValue);

    allowSendButton(readyToSend);

}

function allowSendButton(bool) {
    $(".modal-footer button").prop("disabled", !bool);
}

function isCorrect(text) {
    // Fuer jede InputLaenge eine RegExp
    var regex = [
        new RegExp("[0-2]"),
        new RegExp("([01][0-9]|2[0-3])"),
        new RegExp("([01][0-9]|2[0-3]):"),
        new RegExp("([01][0-9]|2[0-3]):[0-5]"),
        new RegExp("([01][0-9]|2[0-3]):[0-5][05]")
    ];

    // Maximale text Laenge ist 5! Deshalb Stelle 4
    return regex[Math.min(text.length - 1, 4)].test(text);
}

function deleteLastCharacter(text) {
    return text.substring(0, text.length - 1);
}

function isFromHigherTo(from, to) {

    // Min Length of both Inputs
    var shorterInput = Math.min(from.length, to.length);

    // Substring of both Inputs
    var shortFrom = from.substring(0, shorterInput);
    var shortTo = to.substring(0, shorterInput);

    return shortFrom > shortTo;
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