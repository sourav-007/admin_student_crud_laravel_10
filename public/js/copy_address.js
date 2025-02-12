
function copyAddress() {
    var isChecked = document.getElementById("same_as_current").checked;

    if (isChecked) {
        document.getElementById("permanent_house_no").value = document.getElementById("current_house_no").value;
        document.getElementById("permanent_street").value = document.getElementById("current_street").value;
        document.getElementById("permanent_state").value = document.getElementById("current_state").value;
        $("#permanent_state").trigger("change");
        setTimeout(() => {
            document.getElementById("permanent_city").value = document.getElementById("current_city").value;
        }, 50);
        document.getElementById("permanent_pincode").value = document.getElementById("current_pincode").value;


        document.getElementById("permanent_house_no").readOnly = true;
        document.getElementById("permanent_street").readOnly = true;
        document.getElementById("permanent_state").readOnly = true;
        document.getElementById("permanent_city").readOnly = true;
        document.getElementById("permanent_pincode").readOnly = true;

       

    } else {
        document.getElementById("permanent_house_no").readOnly = false;
        document.getElementById("permanent_street").readOnly = false;
        document.getElementById("permanent_state").readOnly = false;
        document.getElementById("permanent_city").readOnly = false;
        document.getElementById("permanent_pincode").readOnly = false;

        document.getElementById("permanent_house_no").value = '';
        document.getElementById("permanent_street").value = '';
        document.getElementById("permanent_state").value = '';
        document.getElementById("permanent_city").value = '';
        document.getElementById("permanent_pincode").value = '';
    }
}