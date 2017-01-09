
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