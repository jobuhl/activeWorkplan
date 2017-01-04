/**
 * Created by Jojo on 10.11.16.
 */

function nextStep(step) {

    /*zweiter schritt vom Sign up*/
    if (step == 1) {
        $("#basic").css("display", "block");
        $(".footer1").css("display", "block");

        $("#user").css("display", "none");
        $(".footer2").css("display", "none");

        $("#company").css("display", "none");
        $(".footer3").css("display", "none");

        $("#myBar").css("width", "35%");

    }


    if (step == 2) {
        $("#basic").css("display", "none");
        $(".footer1").css("display", "none");

        $("#user").css("display", "block");
        $(".footer2").css("display", "block");

        $("#company").css("display", "none");
        $(".footer3").css("display", "none");

        $("#myBar").css("width", "70%");
    }

    /*dritter schritt vom Sign up*/
    if (step == 3) {
        $("#basic").css("display", "none");
        $(".footer1").css("display", "none");

        $("#user").css("display", "none");
        $(".footer2").css("display", "none");

        $("#company").css("display", "block");
        $(".footer3").css("display", "block");

        $("#myBar").css("width", "100%");
    }


    /*emp*/
    if (step == 4) {
        $("#modal-body-emp").css("display", "block");
        $("#modal-body-admin").css("display", "none");

        $(".signin-head2").css("font-weight", "normal").css("border-bottom", "5px solid var(--main-pop-up-progress-bar)").css("color", "var(--main-pop-up-progress-bar)");
        $(".signin-head1").css("font-weight", "bold").css("border-bottom", "5px solid var(--main-pop-up-progress-bar-behind)").css("color", "black");

    }

    /*admin*/
    if (step == 5) {
        $("#modal-body-emp").css("display", "none");
        $("#modal-body-admin").css("display", "block");

        $(".signin-head1").css("font-weight", "normal").css("border-bottom", "5px solid var(--main-pop-up-progress-bar)").css("color", "var(--main-pop-up-progress-bar)");
        $(".signin-head2").css("font-weight", "bold").css("border-bottom", "5px solid var(--main-pop-up-progress-bar-behind)").css("color", "black");
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