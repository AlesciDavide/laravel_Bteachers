const addressConfirm = document.querySelector('input#address');
const telephoneNumberConfirm = document.querySelector('input#telephone_number');
const serviceConfirm = document.querySelector('textarea#service');
const visibleConfirm = document.querySelector('select#visible');
const photoConfirm = document.querySelector('input#photo');
const cvConfirm = document.querySelector('input#cv');
const allertValidationAddress = document.querySelector('div.error_validation_address');
const allertValidationTelephoneNumber = document.querySelector('div.error_validation_telephone_number');
const allertValidationService = document.querySelector('div.error_validation_service');
const allertValidationVisible = document.querySelector('div.error_validation_visible');
const allertValidationSpecializations = document.querySelector('div.error_validation_specializations');
const allertValidationPhoto = document.querySelector('div.error_validation_photo');
const allertValidationCv = document.querySelector('div.error_validation_cv');


document.getElementById('creation_form').addEventListener('submit', function( event ){

    event.preventDefault();
    allertValidationAddress.innerText = "";
    allertValidationTelephoneNumber.innerText = "";
    allertValidationService.innerText = "";
    allertValidationVisible.innerText = "";
    allertValidationSpecializations.innerText ="";
    allertValidationPhoto.innerText ="";
    allertValidationCv.innerText ="";

    if (addressConfirm.value.length < 5) {
        const newErrorAddress = document.createElement("div");
        newErrorAddress.classList = "alert alert-danger";
        newErrorAddress.innerText = "The address must be at least 5 characters"
        allertValidationAddress.appendChild(newErrorAddress);
    }else if (telephoneNumberConfirm.value.length < 6){
        const newErrorTelephoneNumber = document.createElement("div");
        newErrorTelephoneNumber.classList = "alert alert-danger";
        newErrorTelephoneNumber.innerText = "The telephone number must be at least 5 characters"
        allertValidationTelephoneNumber.appendChild(newErrorTelephoneNumber);
    }else if(serviceConfirm.value.length < 10){
        const newErrorservice = document.createElement("div");
        newErrorservice.classList = "alert alert-danger";
        newErrorservice.innerText = "Your services must be at least 10 characters"
        allertValidationService.appendChild(newErrorservice);
    }else if (visibleConfirm.value !== "1" && visibleConfirm.value !== "0") {
        visibleConfirm.value = "1";  // Imposta il valore a 1 (Visible)
        const newErrorVisible = document.createElement("div");
        newErrorVisible.classList = "alert alert-danger";
        newErrorVisible.innerText = "Invalid visibility option. Set to Visible by default.";
        allertValidationVisible.appendChild(newErrorVisible);
    }else if (!document.querySelector('input[name="specializations[]"]:checked')) {
        const newErrorSpecialization = document.createElement("div");
        newErrorSpecialization.classList = "alert alert-danger";
        newErrorSpecialization.innerText = "At least one specialization must be selected";
        allertValidationSpecializations.appendChild(newErrorSpecialization);
    }else if (!photoConfirm.value || !photoConfirm.files[0].type.startsWith('image/')) {
        const newErrorPhoto = document.createElement("div");
        newErrorPhoto.classList = "alert alert-danger";
        newErrorPhoto.innerText = "Please upload a valid image file for the profile picture.";
        allertValidationPhoto.appendChild(newErrorPhoto);
    }else if (!cvConfirm.value || !cvConfirm.files[0].type === "application/pdf") {
        const newErrorCV = document.createElement("div");
        newErrorCV.classList = "alert alert-danger";
        newErrorCV.innerText = "Please upload a valid PDF file for your CV.";
        allertValidationCv.appendChild(newErrorCV);
    }else{
        this.submit();

    }
});
