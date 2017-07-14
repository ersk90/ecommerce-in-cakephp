$(document).ready(function(){

    $('#AddressSameaddress').bind('change', function () {

        if($('#AddressSameaddress').prop('checked')) {

            $('#AddressShippingAddress').val($('#AddressBillingAddress').val());
            $('#AddressShippingAddress2').val($('#AddressBillingAddress2').val());
            $('#AddressShippingCity').val($('#AddressBillingCity').val());
            $('#AddressShippingState').val($('#AddressBillingState').val());
            $('#AddressShippingZip').val($('#AddressBillingZip').val());
            $('#AddressShippingCountry').val($('#AddressBillingCountry').val());


        } else {

            $("#AddressShippingAddress").val('');
            $('#AddressShippingAddress2').val('');
            $('#AddressShippingCity').val('');
            $('#AddressShippingState').val('');
            $('#AddressShippingZip').val('');
            $('#AddressShippingCountry').val('');

        }

    });

});