



/* password validation */
const nameConfirm = document.querySelector('input#name');
const surnameConfirm = document.querySelector('input#surname');
const passwordConfirm = document.querySelector('input#password');
const passwordConfirmTwo = document.querySelector('input#password-confirm');
const emailConfirm = document.querySelector('input#email');
const allertValidationPassword = document.querySelector('div.error_validation_password');
const allertValidationName = document.querySelector('div.error_validation_name');
const allertValidationSurname = document.querySelector('div.error_validation_surname');
const allertValidationEmail = document.querySelector('div.error_validation_email');



document.getElementById('register_form').addEventListener('submit', function( event ){

    event.preventDefault();
    allertValidationName.innerHTML = "";
    allertValidationSurname.innerHTML = "";
    allertValidationPassword.innerHTML = "";
    allertValidationEmail.innerHTML = "";

    let email = emailConfirm.value;

    if(nameConfirm.value.length < 3){
        const newErrorName = document.createElement("div");
        newErrorName.classList = "alert alert-danger";
        newErrorName.innerText = "The name must be at least 3 characters";
        allertValidationName.appendChild(newErrorName);
    }else if(surnameConfirm.value.length < 3){
        const newErrorSurname = document.createElement("div");
        newErrorSurname.classList = "alert alert-danger";
        newErrorSurname.innerText = "The surname must be at least 3 characters";
        allertValidationSurname.appendChild(newErrorSurname);
    }else if(!email.includes('@')){
        const newErroremail = document.createElement("div");
        newErroremail.classList = "alert alert-danger";
        newErroremail.innerText = "The email is not correct";
        allertValidationEmail.appendChild(newErroremail);
    }else if((passwordConfirm.value !== passwordConfirmTwo.value)){
        const newError = document.createElement('div');
        newError.classList = "alert alert-danger";
        newError.innerText = "The password does not match";
        allertValidationPassword.appendChild(newError);
        passwordConfirm.value ="";
        passwordConfirmTwo.value = '';
    }else if (passwordConfirm.value.length < 7){
        const newError = document.createElement('div');
        newError.classList = "alert alert-danger"
        newError.innerText = "The password is short then 8 characters"
        allertValidationPassword.appendChild(newError);
        passwordConfirm.value ="";
        passwordConfirmTwo.value = '';
    }else{

        this.submit();
    }
})
