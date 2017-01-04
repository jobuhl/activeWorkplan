/**
 * Created by Jojo on 14.11.16.
 */

function modalChange(){
    alert("The Data will be changed as you wish!");
}

function changePassword() {
    alert("Password was changed!");
}

function forgotPassword(){
    alert("We have send you a new password");
}

function signup() {
    alert("Sign Up complete")
    window.location.href="../../php/employer/overview.php";
}

function nextStep(step){

    /*zweiter schritt vom Sign up*/
    if (step == admin) {
        $("#modal-body-admin").css("display", "block");
        $("#modal-body-emp").css("display", "none");
    }

    /*zweiter schritt vom Sign up*/
    if (step == emp) {
        $("#modal-body-emp").css("display", "block");
        $("#modal-body-admin").css("display", "none");
    }
}
