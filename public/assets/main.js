
"use strict";

/*
 *
 *  LOGIN FORM VALIDATION
 *    
*/

const loginForm = document.querySelector("#login-form");
const loginUid = document.querySelector("#uid");
const loginPassword = document.querySelector("#password");
const loginMessage = document.querySelector("#login-message");

loginForm.addEventListener("submit", (e) => {

    let error;

    if (isEmpty(loginUid.value) || isEmpty(loginPassword.value)) {
        error = "Preencha todos os campos.";
    }
    
    if (error) {
        e.preventDefault();
        loginMessage.textContent = error;
        loginMessage.classList.remove("hidden");
    } 
});


/*
 *
 *  SIGNUP FORM VALIDATION
 *    
*/

const signupForm = document.querySelector("#signup-form");
const signupUid = document.querySelector("#uidReg");
const signupPassword = document.querySelector("#passwordReg");
const signupPasswordRepeat = document.querySelector("#passwordRepeatReg");
const signupEmail = document.querySelector("#emailReg");
const signupMessage = document.querySelector("#signup-message");

signupForm.addEventListener("submit", (e) => {

    let error;

    if (!signupEmail.value.match(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/)) {
        error = "Insira um e-mail válido.";
    }

    if (!signupUid.value.match(/^[a-zA-Z0-9 _-]*$/)) {
        error = "Usuário deve conter apenas letras, números, espaços, hífen e subtraço.";
    }

    if (signupPassword.value !== signupPasswordRepeat.value) {
        error = "Senhas inseridas não combinam.";
    }

    if (isEmpty(signupUid.value) || isEmpty(signupPassword.value) || isEmpty(signupPasswordRepeat.value) || isEmpty(signupEmail.value)) {
        error = "Preencha todos os campos.";
    }
    
    if (error) {
        e.preventDefault();
        signupMessage.textContent = error;
        signupMessage.classList.remove("hidden");
    } 
});


const signupSuccess = document.querySelector("#signup-success");

if (signupSuccess) {
    setTimeout(() => {
        signupSuccess.remove();
    }, 5000);
}


function isEmpty(value) {
    return !value.trim().length; 
}


