/**
 * Created by Jojo on 10.11.16.
 */

function nextStep(step) {

    /* ----------------- SIGN UP ADMIN ------------------- */
    if (step == 1) {
        $("#basic").css("display", "block");
        $(".footer1").css("display", "block");

        $("#user").css("display", "none");
        $(".footer2").css("display", "none");

        $("#company").css("display", "none");
        $(".footer3").css("display", "none");

        $("#store").css("display", "none");
        $(".footer4").css("display", "none");

        // Change Classes
        $('.modal-sub-sign-up p:nth-child(1)').removeClass('signin-head2').addClass('signin-head1');
        $('.modal-sub-sign-up p:nth-child(2)').removeClass('signin-head1').addClass('signin-head2');
        $('.modal-sub-sign-up p:nth-child(3)').removeClass('signin-head1').addClass('signin-head2');
        $('.modal-sub-sign-up p:nth-child(4)').removeClass('signin-head1').addClass('signin-head2');



    }

    if (step == 2) {
        $("#basic").css("display", "none");
        $(".footer1").css("display", "none");

        $("#user").css("display", "block");
        $(".footer2").css("display", "block");

        $("#company").css("display", "none");
        $(".footer3").css("display", "none");

        $("#store").css("display", "none");
        $(".footer4").css("display", "none");

        // Change Classes
        $('.modal-sub-sign-up p:nth-child(2)').removeClass('signin-head2').addClass('signin-head1');
        $('.modal-sub-sign-up p:nth-child(1)').removeClass('signin-head1').addClass('signin-head2');
        $('.modal-sub-sign-up p:nth-child(3)').removeClass('signin-head1').addClass('signin-head2');
        $('.modal-sub-sign-up p:nth-child(4)').removeClass('signin-head1').addClass('signin-head2');

    }

    if (step == 3) {
        $("#basic").css("display", "none");
        $(".footer1").css("display", "none");

        $("#user").css("display", "none");
        $(".footer2").css("display", "none");

        $("#company").css("display", "block");
        $(".footer3").css("display", "block");

        $("#store").css("display", "none");
        $(".footer4").css("display", "none");

        $("#myBar").css("width", "100%");

        // Change Classes
        $('.modal-sub-sign-up p:nth-child(3)').removeClass('signin-head2').addClass('signin-head1');
        $('.modal-sub-sign-up p:nth-child(1)').removeClass('signin-head1').addClass('signin-head2');
        $('.modal-sub-sign-up p:nth-child(2)').removeClass('signin-head1').addClass('signin-head2');
        $('.modal-sub-sign-up p:nth-child(4)').removeClass('signin-head1').addClass('signin-head2');
    }

    if (step == 4) {
        $("#basic").css("display", "none");
        $(".footer1").css("display", "none");

        $("#user").css("display", "none");
        $(".footer2").css("display", "none");

        $("#company").css("display", "none");
        $(".footer3").css("display", "none");

        $("#store").css("display", "block");
        $(".footer4").css("display", "block");

        $("#myBar").css("width", "100%");


        // Change Classes
        $('.modal-sub-sign-up p:nth-child(4)').removeClass('signin-head2').addClass('signin-head1');
        $('.modal-sub-sign-up p:nth-child(1)').removeClass('signin-head1').addClass('signin-head2');
        $('.modal-sub-sign-up p:nth-child(2)').removeClass('signin-head1').addClass('signin-head2');
        $('.modal-sub-sign-up p:nth-child(3)').removeClass('signin-head1').addClass('signin-head2');

    }


    /* ----------------- SIGN IN EMP + ADMIN ------------------- */
    if (step == 5) {
        $("#modal-body-emp").css("display", "block");
        $("#modal-body-admin").css("display", "none");

        // Change Classes
        $('.modal-sub-sign-in p:first-child').removeClass('signin-head2').addClass('signin-head1');
        $('.modal-sub-sign-in p:last-child').removeClass('signin-head1').addClass('signin-head2');

    }

    /*admin*/
    if (step == 6) {
        $("#modal-body-emp").css("display", "none");
        $("#modal-body-admin").css("display", "block");

        // Change Classes
        $('.modal-sub-sign-in p:first-child').removeClass('signin-head1').addClass('signin-head2');
        $('.modal-sub-sign-in p:last-child').removeClass('signin-head2').addClass('signin-head1');
    }

};


function signupPicture() {

    var email = document.getElementById("email").value;
    var pw1 = document.getElementById("password1").value;
    var pw2 = document.getElementById("password2").value;


    document.getElementById("email1").value = email;
    document.getElementById("passw1").value = pw1;
    document.getElementById("passw2").value = pw2;

    nextStep(2);
}