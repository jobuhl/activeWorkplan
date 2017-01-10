$(".datepicker").datepicker();

function openEventDropdown(eventId) {
    var buttons = $("#" + eventId);
    if (buttons.is(':hidden')) {

        // zuerst alle offenen events schliessen
        $(".drop-btn div").hide();
        $(".drop-btn div").css('border-top', '1px solid white');
        buttons.show();
    } else {
        buttons.hide();
        $(".drop-btn div").css('border-top', 'none');
    }
}


function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev, date) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
}

function openChangeAlldayModal(divEventId) {

    //Daten aus dem Event auslesen
    var date = $("#div-allday" + divEventId + " > input:nth-child(1)").val();
    var category = $("#div-allday" + divEventId + " > p").text();

    // change modal oeffnen
    $("#button-change-allday-event").click();

    // uebertragen der daten in das change-modal
    $("#select-js-on-change-allday option:first-child").text(category);
    $("#input-js-on-change-allday").val(date);

    // um beim submit im Controller auf die id zugreifen zu können
    $("#event-id-allday").val(divEventId);
}

function openChangeTimeModal(divEventId) {

    //Daten aus dem Event auslesen
    var date = $("#div-time" + divEventId + " > input").val();
    var category = $("#div-time" + divEventId + " > p:nth-child(1)").text();
    var from = $("#div-time" + divEventId + " > p:nth-child(2)").text();
    var to = $("#div-time" + divEventId + " > p:nth-child(3)").text();

    // change modal oeffnen
    $("#button-change-time-event").click();

    // uebertragen der daten in das change-modal
    $("#select-js-on-change-time option:first-child").text(category);
    $("#input-js-on-change-time-date").val(date);
    $("#input-js-on-change-time-from").val(from);
    $("#input-js-on-change-time-to").val(to);

    // um beim submit im Controller auf die id zugreifen zu können
    $("#event-id-time").val(divEventId);
}