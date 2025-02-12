
document.addEventListener("DOMContentLoaded", function() {
    
    let firstNameInput = document.getElementById("firstname");
    let middleNameInput = document.getElementById("middlename");
    let lastNameInput = document.getElementById("lastname");
    let emailInput = document.getElementById("email");
    let mobileNoInput = document.getElementById("mobile_no");
    let altMobileNoInput = document.getElementById("alternate_mobile_no");
    let genderInput = document.getElementById("gender");
    let casteInput = document.getElementById("caste");
    let dobInput = document.getElementById("dob");
    let aadhaarInput = document.getElementById("aadhaar_no");
    let nationalityInput = document.getElementById("nationality");

    let countryInput = document.getElementById("country");
    let currentHouseInput = document.getElementById("current_house_no");
    let currentStreetInput = document.getElementById("current_street"); 
    let currentStateInput = document.getElementById("current_state");
    let currentDistrictInput = document.getElementById("current_city");
    let currentPincodeInput = document.getElementById("current_pincode");

    let permanentHouseInput = document.getElementById("permanent_house_no");
    let permanentStreetInput = document.getElementById("permanent_street");
    let permanentStateInput = document.getElementById("permanent_state");
    let permanentDistrictInput = document.getElementById("permanent_city");
    let permanentPincodeInput = document.getElementById("permanent_pincode");

    let qualificationTypeInput = document.getElementById("qualification_type");
    let instituteNameInput = document.getElementById("institute_name");
    let boardUniversityInput = document.getElementById("board_university");
    let passingYearInput = document.getElementById("passing_year");
    let percentageInput = document.getElementById("percentage");

    
    function validateTextInput(inputElement, errorElementId, fieldName) {
        let value = inputElement.value.trim();
        let errorSpan = document.getElementById(errorElementId);
        let regex = /^[A-Za-z\s]+$/;

        if (value === "") {
            errorSpan.innerText = `${fieldName} is required.`;
            inputElement.classList.add("is-invalid");
            inputElement.classList.remove("is-valid");
        } else if (!regex.test(value)) {
            errorSpan.innerText = `Only alphabets are allowed in ${fieldName}.`;
            inputElement.classList.add("is-invalid");
            inputElement.classList.remove("is-valid");
        } else {
            errorSpan.innerText = "";
            inputElement.classList.remove("is-invalid");
            inputElement.classList.add("is-valid");
        }
    }

    function validateEmail() {
        let email = emailInput.value.trim();
        let errorSpan = document.getElementById("email-error");
        let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        if (email === "") {
            errorSpan.innerText = "Email is required.";
            emailInput.classList.add("is-invalid");
            emailInput.classList.remove("is-valid");
        } else if (!emailPattern.test(email)) {
            errorSpan.innerText = "Enter a valid email address.";
            emailInput.classList.add("is-invalid");
            emailInput.classList.remove("is-valid");
        } else {
            errorSpan.innerText = "";
            emailInput.classList.remove("is-invalid");
            emailInput.classList.add("is-valid");
        }
    }

    function validateMobileNo(inputElement, errorElementId) {
        inputElement.value = inputElement.value.replace(/\D/g, "");
        let mobileNo = inputElement.value.trim();
        let errorSpan = document.getElementById(errorElementId);
    
        if (mobileNo === "") {
            errorSpan.innerText = "Mobile number is required.";
            inputElement.classList.add("is-invalid");
            inputElement.classList.remove("is-valid");
        } else if (!/^\d{10}$/.test(mobileNo)) {
            errorSpan.innerText = "Enter a valid 10-digit mobile number.";
            inputElement.classList.add("is-invalid");
            inputElement.classList.remove("is-valid");
        } else {
            errorSpan.innerText = "";
            inputElement.classList.remove("is-invalid");
            inputElement.classList.add("is-valid");
        }
    }

    function validateDropdown(inputElement, errorElementId, fieldName) {
        let value = inputElement.value.trim();
        let errorSpan = document.getElementById(errorElementId);

        if (value === "") {
            errorSpan.innerText = `${fieldName} is required.`;
            inputElement.classList.add("is-invalid");
            inputElement.classList.remove("is-valid");
        } else {
            errorSpan.innerText = "";
            inputElement.classList.remove("is-invalid");
            inputElement.classList.add("is-valid");
        }
    }

    function validateNumericInput(inputElement, errorElementId, fieldName, length) {
        let value = inputElement.value.trim();
        let errorSpan = document.getElementById(errorElementId);
        let regex = new RegExp(`^\\d{${length}}$`);

        if (value === "") {
            errorSpan.innerText = `${fieldName} is required.`;
            inputElement.classList.add("is-invalid");
            inputElement.classList.remove("is-valid");
        } else if (!regex.test(value)) {
            errorSpan.innerText = `${fieldName} must be ${length} digits.`;
            inputElement.classList.add("is-invalid");
            inputElement.classList.remove("is-valid");
        } else {
            errorSpan.innerText = "";
            inputElement.classList.remove("is-invalid");
            inputElement.classList.add("is-valid");
        }
    }
    

    function validateDOB() {
        let dob = dobInput.value.trim();
        let errorSpan = document.getElementById("dob-error");

        if (dob === "") {
            errorSpan.innerText = "Date of Birth is required.";
            dobInput.classList.add("is-invalid");
            dobInput.classList.remove("is-valid");
        } else {
            let today = new Date();
            let dobDate = new Date(dob);
            if (dobDate >= today) {
                errorSpan.innerText = "Date of Birth must be in the past.";
                dobInput.classList.add("is-invalid");
                dobInput.classList.remove("is-valid");
            } else {
                errorSpan.innerText = "";
                dobInput.classList.remove("is-invalid");
                dobInput.classList.add("is-valid");
            }
        }
    }
    
    aadhaarInput.addEventListener("input", function () {
        let aadhaar = aadhaarInput.value.replace(/\D/g, "");

        if (aadhaar.length > 4) {
            aadhaar = aadhaar.substring(0, 12).replace(/(\d{4})(?=\d)/g, "$1 ");
        }

        aadhaarInput.value = aadhaar; 

        validateAadhaar(aadhaar);
    });

    function validateAadhaar(aadhaar) {
        aadhaar = aadhaar.replace(/\s+/g, '');
        console.log('AAAADDDD = ', aadhaar);
        if (!/^\d{12}$/.test(aadhaar)) return false;

        let multiplicationTable = [
            [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
            [1, 2, 3, 4, 0, 6, 7, 8, 9, 5],
            [2, 3, 4, 0, 1, 7, 8, 9, 5, 6],
            [3, 4, 0, 1, 2, 8, 9, 5, 6, 7],
            [4, 0, 1, 2, 3, 9, 5, 6, 7, 8],
            [5, 9, 8, 7, 6, 0, 4, 3, 2, 1],
            [6, 5, 9, 8, 7, 1, 0, 4, 3, 2],
            [7, 6, 5, 9, 8, 2, 1, 0, 4, 3],
            [8, 7, 6, 5, 9, 3, 2, 1, 0, 4],
            [9, 8, 7, 6, 5, 4, 3, 2, 1, 0]
        ];

        let permutationTable = [
            [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
            [1, 5, 7, 6, 2, 8, 3, 0, 9, 4],
            [5, 8, 0, 3, 7, 9, 6, 1, 4, 2],
            [8, 9, 1, 6, 0, 4, 3, 5, 2, 7],
            [9, 4, 5, 3, 1, 2, 6, 8, 7, 0],
            [4, 2, 8, 6, 5, 7, 3, 9, 0, 1],
            [2, 7, 9, 3, 8, 0, 6, 4, 1, 5],
            [7, 0, 4, 6, 9, 1, 3, 2, 5, 8]
        ];

        let checksum = 0;
        aadhaar = aadhaar.split("").reverse().join("");

        for (let i = 0; i < aadhaar.length; i++) {
            checksum = multiplicationTable[checksum][permutationTable[i % 8][parseInt(aadhaar[i])]];
        }

        return checksum === 0;
    }

    $(document).ready(function() {
        $("#aadhaar_no").on("keyup", function() {
            let aadhaar = $(this).val().replace(/\s+/g, '').trim();
            if (!validateAadhaar(aadhaar)) {
                $("#aadhaar_no-error").text("Invalid Aadhaar Number");
                $(this).addClass("is-invalid").removeClass("is-valid");
            } else {
                $("#aadhaar_no-error").text("");
                $(this).addClass("is-valid").removeClass("is-invalid");
            }
        });
    });

    function validatePincode(inputElement, errorElementId, fieldName, maxLength) {
        let value = inputElement.value.trim();
        let errorSpan = document.getElementById(errorElementId);
    
        inputElement.value = inputElement.value.replace(/\D/g, "");
    
        if (value === "") {
            errorSpan.innerText = `${fieldName} is required.`;
            inputElement.classList.add("is-invalid");
            inputElement.classList.remove("is-valid");
        } else if (value.length > maxLength) {
            errorSpan.innerText = `${fieldName} cannot exceed ${maxLength} digits.`;
            inputElement.classList.add("is-invalid");
            inputElement.classList.remove("is-valid");
        } else {
            errorSpan.innerText = "";
            inputElement.classList.remove("is-invalid");
            inputElement.classList.add("is-valid");
        }
    }
    
    

    firstNameInput.addEventListener("input", () => validateTextInput(firstNameInput, "firstname-error", "First Name") );
    middleNameInput.addEventListener("input", () => validateTextInput(middleNameInput, "middlename-error", "Middle Name") );
    lastNameInput.addEventListener("input",  () => validateTextInput(lastNameInput, "lastname-error", "Last Name") );
    emailInput.addEventListener("input", validateEmail);
    mobileNoInput.addEventListener("input", () => validateMobileNo(mobileNoInput, "mobile_no-error"));
    altMobileNoInput.addEventListener("input", () => validateMobileNo(altMobileNoInput, "alternate_mobile_no-error"));
    genderInput.addEventListener("change", () => validateDropdown(genderInput, "gender-error", "Gender") );
    casteInput.addEventListener("change", () => validateDropdown(casteInput, "caste-error", "Caste") );
    dobInput.addEventListener("change", validateDOB);
    nationalityInput.addEventListener("change", () => validateDropdown(nationalityInput, "nationality-error", "Nationality") );

    countryInput.addEventListener("change", () => validateDropdown(countryInput, "country-error", "Country") );
    currentStreetInput.addEventListener("input", () => validateTextInput(currentStreetInput, "currentstreet-error", "Current street") );
    currentStateInput.addEventListener("change", () => validateDropdown(currentStateInput, "currentstate-error", "Current state") );
    currentDistrictInput.addEventListener("change", () => validateDropdown(currentDistrictInput, "currentdistrict-error", "Current district") );
    currentPincodeInput.addEventListener("change", () => validatePincode(currentPincodeInput, "currentpincode-error", "Current pincode", 10) );
    
    permanentStreetInput.addEventListener("input", () => validateTextInput(permanentStreetInput, "permanentstreet-error", "Permanent street") );
    permanentStateInput.addEventListener("change", () => validateDropdown(permanentStateInput, "permanentstate-error", "Permanent state") );
    permanentDistrictInput.addEventListener("change", () => validateDropdown(permanentDistrictInput, "permanentdistrict-error", "Permanent district") );
    permanentPincodeInput.addEventListener("change", () => validatePincode(permanentPincodeInput, "permanentpincode-error", "Permanent pincode", 10) );

    qualificationTypeInput.addEventListener("change", () => validateDropdown(qualificationTypeInput, "qualificationtype-error", "Qualification type") );
    instituteNameInput.addEventListener("input", () => validateTextInput(instituteNameInput, "institutename-error", "Institute name") );
    boardUniversityInput.addEventListener("input", () => validateTextInput(boardUniversityInput, "board-error", "Board/University") );
    passingYearInput.addEventListener("change", () => validateDropdown(passingYearInput, "passingyear-error", "Passing year") );
    percentageInput.addEventListener("input", () => validateNumericInput(percentageInput, "percentage-error", "Percentage") );
    
});