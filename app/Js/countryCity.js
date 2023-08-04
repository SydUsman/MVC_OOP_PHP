$(document).ready(function() {
    $('#country').change(function() {
        var countryId = $(this).val();
        
        $('#city').html('<option value="">Select a city</option>');
        
        $.ajax({
            url: '../ajax.php',
            method: 'POST',
            data: { country_id: countryId },
            dataType: 'json',
            success: function(response) {
                if (response.length > 0) {
                    $.each(response, function(index, city) {
                        $('#city').append('<option value="' + city.id + '">' + city.name + '</option>');
                    });
                }
            }
        });
    });
});

