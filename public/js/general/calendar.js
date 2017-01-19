// Event Datum auswählen (JavaScript-Funktion)
$(".datepicker").datepicker();

// on click auf ein Event werden die options button darunter angezeigt
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

// Allday-Event change Emp
function openChangeAlldayModal(divEventId) {

    //Daten aus dem Event auslesen
    var date = $("#div-allday" + divEventId + " > input:nth-child(1)").val();
    var category = $("#div-allday" + divEventId + " > p").text();

    // change modal oeffnen
    $("#button-change-allday-event" + divEventId).click();

    // uebertragen der daten in das change-modal
    $("#select-js-on-change-allday option:first-child").text(category);
    $("#input-js-on-change-allday").val(date);

    // um beim submit im Controller auf die id zugreifen zu können
    $("#event-id-allday").val(divEventId);
}

// Time-Event change Emp
function openChangeTimeModal(divEventId) {

    //Daten aus dem Event auslesen
    var date = $("#div-time" + divEventId + " > input").val();
    var category = $("#div-time" + divEventId + " > p:nth-child(1)").text();
    var from = $("#div-time" + divEventId + " > p:nth-child(2)").text();
    var to = $("#div-time" + divEventId + " > p:nth-child(3)").text();

    // change modal oeffnen
    $("#button-change-time-event"+divEventId).click();

    // uebertragen der daten in das change-modal
    $("#select-js-on-change-time option:first-child").text(category);
    $("#input-js-on-change-time-date").val(date);
    $("#input-js-on-change-time-from").val(from);
    $("#input-js-on-change-time-to").val(to);

    // um beim submit im Controller auf die id zugreifen zu können
    $("#event-id-time").val(divEventId);
}



// Worktime-Fix add from Time-Event Work Admin
function openAddTimeModalAdmin(divEventId) {

    //Daten aus dem Event auslesen
    var date = $("#div-time-admin" + divEventId + " > input").val();
    var category = $("#div-time-admin" + divEventId + " > p:nth-child(1)").text();
    var from = $("#div-time-admin" + divEventId + " > p:nth-child(2)").text();
    var to = $("#div-time-admin" + divEventId + " > p:nth-child(3)").text();
    var employeeId = $("#div-time-admin" + divEventId + " .this-emp-id").val();

    // change modal oeffnen
    $("#button-add-worktime-fix-event-admin" + divEventId).click();

    // uebertragen der daten in das change-modal
    $("#select-js-on-add-worktime-fix-admin option:first-child").text(category);
    $("#input-js-on-add-worktime-fix-date-admin").val(date);
    $("#input-js-on-add-worktime-fix-from-admin").val(from);
    $("#input-js-on-add-worktime-fix-to-admin").val(to);

    // um beim submit im Controller auf die Employee id zugreifen zu können
    $("#input-js-on-add-worktime-fix-employee-id-admin").val(employeeId);
}

// Worktime-Fix change Admin
function openChangeWorktimeFixModal(divEventId) {

    //Daten aus dem Event auslesen
    var date = $("#div-worktime-fix-admin" + divEventId + " > input").val();
    var category = $("#div-worktime-fix-admin" + divEventId + " > p:nth-child(1)").text();
    var from = $("#div-worktime-fix-admin" + divEventId + " > p:nth-child(2)").text();
    var to = $("#div-worktime-fix-admin" + divEventId + " > p:nth-child(3)").text();
    var employeeId = $("#div-worktime-fix-admin" + divEventId + " .this-emp-id").val();
    var eventId = $("#div-worktime-fix-admin" + divEventId + " .this-event-id").val();


    // change modal oeffnen
    $("#button-change-worktime-fix-event-admin" + divEventId).click();

    // uebertragen der daten in das change-modal
    $("#select-js-on-change-worktime-fix-admin option:first-child").text(category);
    $("#input-js-on-change-worktime-fix-date-admin").val(date);
    $("#input-js-on-change-worktime-fix-from-admin").val(from);
    $("#input-js-on-change-worktime-fix-to-admin").val(to);

    // um beim submit im Controller auf die Employee id zugreifen zu können
    $("#input-js-on-change-worktime-fix-employee-id-admin").val(employeeId);
    $("#input-js-on-change-worktime-fix-event-id-admin").val(eventId);
}

// Round-Button Employee-Planning Add Store
function openAddEventModal(date) {

    // change modal oeffnen
    $("#emp-button-add-event1").click();

    // uebertragen der daten in das change-modal
    $(".get-date-from-button-emp").val(date);
}