function signInCheck() {
    var emailError = "";
    var passwordError = "";
    var emailValid;
    var passwordValid;
    const reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/; //regular expression to check valid emails
    if (reg.test(document.getElementById('email').value)) {
        emailValid = true;
        emailError = "";
    } else {
        emailValid = false;
        emailError = "Invalid email";
    }
    if (document.getElementById('password').value < 7) {
        passwordError = "Invalid password";
        passwordValid = false;
    } else {
        passwordValid = true;
        passwordError = "";
    }
    document.getElementById("emailErrorHtmlSignIn").innerHTML=emailError;
    document.getElementById("passwordErrorHtmlSignIn").innerHTML=passwordError;
    if (passwordValid && emailValid && nameValid) {
        return true;
    } else {
        return false;
    }
}

function validateForm() {
    var nameError = "";
    var emailError = "";
    var passwordError = "";
    var nameValid;
    var emailValid;
    var passwordValid;
    const reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/; //regular expression to check valid emails
    if (document.getElementById('name').value === "") {
        nameValid = false;
        nameError = "Invalid name";
    } else {
        nameValid = true;
        nameError = "";
    }
    if (reg.test(document.getElementById('email').value)) {
        emailValid = true;
        emailError = "";
    } else {
        emailValid = false;
        emailError = "Invalid email";
    }
    if (document.getElementById('password').value < 7) {
        passwordError = "Invalid password";
        passwordValid = false;
    } else {
        passwordValid = true;
        passwordError = "";
    }
    document.getElementById("nameErrorHtml").innerHTML=nameError; //writes to html code
    document.getElementById("emailErrorHtml").innerHTML=emailError;
    document.getElementById("passwordErrorHtml").innerHTML=passwordError;
    if (passwordValid && emailValid && nameValid) {
        return true;
    } else {
        return false;
    }
}
