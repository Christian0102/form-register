

function comparePassword() {
    if ($("#inputPassword").val() != $("#confirmPassword").val()) {
        console.log('password is not same')
        $("#confirmPasswordDanger").show();
        return false;
    }
    return true;
}

function validationPassword() {
    let password = $("#inputPassword").val();

    if (!password.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{8,30}$/)) {
        $("#inputPasswordDanger").show();
        return false;
    }
    return true;
}

function removeAllDangers(){
    $("#confirmPasswordDanger").hide();
    $("#inputPasswordDanger").hide();
}



$("#inputPassword").focusout(function (){
    removeAllDangers();
    validationPassword();
})
$("#confirmPassword").focusout(function (){
    removeAllDangers();
    comparePassword();
});