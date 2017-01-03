/**
 * Created by Jojo on 20.10.16.
 */
$(document).ready(function () {

    $('#external-events').find('.fc-event').each(function () {

        // store data so the calendar knows to render an event upon drop
        $(this).data('event', {
            title: $.trim($(this).text()), // use the element's text as the event title
            stick: true // maintain when user navigates (see docs on the renderEvent method)
        });

        // make the event draggable using jQuery UI
        $(this).draggable({
            zIndex: 999,
            revert: true,      // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
        });

    });


    $('#calendar').fullCalendar({
        theme: true,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        defaultDate: today,
        <!-- defaultView: -->
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar
        eventLimit: true, // allow "more" link when too many events
        events: [
            {
                id:998,
                title: 'Meeting',
                start: '2016-09-12T10:30:00',
                end: '2016-09-12T12:30:00'
            },
            {
                title: 'Click for Google',
                url: 'http://google.com/',
                start: '2016-09-28'
            }
        ]
    });

    var now = new Date();
    var today = now.getDate();

});