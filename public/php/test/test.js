function nextStep(step){

    /*zweiter schritt vom Sign up*/
    if (step == 1){
        $("#basic").css("display","block");
        $("#user").css("display","none");
        $("#company").css("display","none");
        $("#myBar").css("width","35%");

    }


    if (step == 2){
        $("#basic").css("display","none");
        $("#user").css("display","block");
        $("#company").css("display","none");
        $("#myBar").css("width","70%");
    }

    /*dritter schritt vom Sign up*/
    if (step == 3){
        $("#basic").css("display","none");
        $("#user").css("display","none");
        $("#company").css("display","block");
        $("#myBar").css("width","100%");
    }

}

function clear() {

}
