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


document.getElementById('creation_form').addEventListener('submit', function(event) {
    event.preventDefault();

    // Reset error messages
    allertValidationAddress.innerText = "";
    allertValidationTelephoneNumber.innerText = "";
    allertValidationService.innerText = "";
    allertValidationVisible.innerText = "";
    allertValidationSpecializations.innerText = "";
    allertValidationPhoto.innerText = "";
    allertValidationCv.innerText = "";

    let hasError = false; // Track if any validation error occurs

    // Address validation
    if (addressConfirm.value.length < 5) {
        const newErrorAddress = document.createElement("div");
        newErrorAddress.classList = "alert alert-danger";
        newErrorAddress.innerText = "The address must be at least 5 characters";
        allertValidationAddress.appendChild(newErrorAddress);
        hasError = true;
    }

    // Telephone number validation
    if (telephoneNumberConfirm.value.length < 6) {
        const newErrorTelephoneNumber = document.createElement("div");
        newErrorTelephoneNumber.classList = "alert alert-danger";
        newErrorTelephoneNumber.innerText = "The telephone number must be at least 6 characters";
        allertValidationTelephoneNumber.appendChild(newErrorTelephoneNumber);
        hasError = true;
    }

    // Service validation
    if (serviceConfirm.value.length < 10) {
        const newErrorService = document.createElement("div");
        newErrorService.classList = "alert alert-danger";
        newErrorService.innerText = "Your services must be at least 10 characters";
        allertValidationService.appendChild(newErrorService);
        hasError = true;
    }

    // Visibility validation
    if (visibleConfirm.value !== "1" && visibleConfirm.value !== "0") {
        visibleConfirm.value = "1"; // Set the value to 1 (Visible)
        const newErrorVisible = document.createElement("div");
        newErrorVisible.classList = "alert alert-danger";
        newErrorVisible.innerText = "Invalid visibility option. Set to Visible by default.";
        allertValidationVisible.appendChild(newErrorVisible);
        hasError = true;
    }

    // Specializations validation
    if (!document.querySelector('input[name="specializations[]"]:checked')) {
        const newErrorSpecialization = document.createElement("div");
        newErrorSpecialization.classList = "alert alert-danger";
        newErrorSpecialization.innerText = "At least one specialization must be selected";
        allertValidationSpecializations.appendChild(newErrorSpecialization);
        hasError = true;
    }

    // Profile picture validation
    if (!photoConfirm.value || !photoConfirm.files[0].type.startsWith('image/')) {
        const newErrorPhoto = document.createElement("div");
        newErrorPhoto.classList = "alert alert-danger";
        newErrorPhoto.innerText = "Please upload a valid image file for the profile picture.";
        allertValidationPhoto.appendChild(newErrorPhoto);
        hasError = true;
    }

    // CV validation
    if (!cvConfirm.value || cvConfirm.files[0].type !== "application/pdf") {
        const newErrorCV = document.createElement("div");
        newErrorCV.classList = "alert alert-danger";
        newErrorCV.innerText = "Please upload a valid PDF file for your CV.";
        allertValidationCv.appendChild(newErrorCV);
        hasError = true;
    }

    // Submit the form if there are no errors
    if (!hasError) {
        this.submit();
    }
});

