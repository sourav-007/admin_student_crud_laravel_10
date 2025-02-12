
$(document).ready(function() {
    $.get("{{ route('countries') }}", function(data) {
        console.log("API Response:", data);
        $('#country').append(data.map(country => 
            `<option value="${country.id}" data-nationality="${country.nationality}">${country.name}</option>`
        ));
    });

    function loadStates(countryId, stateSelector, citySelector) {
        $(stateSelector).html('<option value="">-- Select State --</option>');
        $(citySelector).html('<option value="">-- Select City --</option>');

        if (countryId) {
            $.get(`/states/${countryId}`, function(data) {
                $(stateSelector).append(data.map(state => 
                    `<option value="${state.id}">${state.name}</option>`
                ));
            });
        }
    }

    function loadCities(stateId, citySelector) {
        $(citySelector).html('<option value="">-- Select City --</option>');

        if (stateId) {
            $.get(`/cities/${stateId}`, function(data) {
                $(citySelector).append(data.map(city => 
                    `<option value="${city.id}">${city.name}</option>`
                ));
            });
        }
    }

    // For Current Address
    $('#country').change(function() {
        let countryId = $(this).val();
        let nationality = $(this).find(":selected").data("nationality");
        $('#nationality').val(nationality);  
        loadStates(countryId, '#current_state', '#current_city');
        loadStates(countryId, '#permanent_state', '#permanent_city');
    });

    $('#current_state').change(function() {
        loadCities($(this).val(), '#current_city');
    });

    // For Permanent Address
    $('#permanent_state').change(function() {
        loadCities($(this).val(), '#permanent_city');
    });
});