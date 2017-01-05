function nextStep(step) {

    /*emp*/
    if (step == 10) {
        $("#modal-body-event-allday").css("display", "none");
        $("#modal-body-event-time").css("display", "block");

        // Chamge Classes
        $('.modal-sub p:first-child').removeClass('signin-head2').addClass('signin-head1');
        $('.modal-sub p:last-child').removeClass('signin-head1').addClass('signin-head2');
    }

    /*admin*/
    if (step == 11) {
        $("#modal-body-event-allday").css("display", "block");
        $("#modal-body-event-time").css("display", "none");

        // Change Classes
        $('.modal-sub p:first-child').removeClass('signin-head1').addClass('signin-head2');
        $('.modal-sub p:last-child').removeClass('signin-head2').addClass('signin-head1');
    }
};