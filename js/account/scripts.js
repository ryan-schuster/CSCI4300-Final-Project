function signInCheck() {
    var emailError = "";
    var passwordError = "";
    var emailValid;
    var passwordValid;
    const reg2 = /^[a-zA-Z0-9]{7,}$/
    const reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/; //regular expression to check valid emails
    if (reg.test(document.getElementById('email').value)) {
        emailValid = true;
        emailError = "";
    } else {
        emailValid = false;
        emailError = "Invalid email";
    }
    if (reg2.test(document.getElementById('password').value)) {
        passwordValid = true;
        passwordError = "";
    } else {
        passwordError = "Invalid password";
        passwordValid = false;
    }
    document.getElementById("emailErrorHtmlSignIn").innerHTML=emailError;
    document.getElementById("passwordErrorHtmlSignIn").innerHTML=passwordError;
    if (passwordValid && emailValid) {
        return true;
    } else {
        return false;
    }
}

function habitAdderCheck() {
    var name = "";
    var nameValid;
    var nameError = "";
    if (document.getElementById('goalName').value === "") {
        nameValid = false;
        nameError = "Invalid name";
    } else {
        nameValid = true;
        nameError = "";
    }
    document.getElementById("goalNameErrorHtml").innerHTML=nameError;
    return nameValid;
}

function validateForm() {
    var nameError = "";
    var emailError = "";
    var passwordError = "";
    var nameValid;
    var emailValid;
    var passwordValid;
    const reg2 = /^[a-zA-Z0-9]{7,}$/
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
    if (reg2.test(document.getElementById('password').value)) {
        passwordValid = true;
        passwordError = "";
    } else {
        passwordError = "Invalid password";
        passwordValid = false;
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
