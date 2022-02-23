// Open add client modal
$('#addClient-btn').click(function (e) {
    $("#addClient-modal").modal("toggle");
    // Reset all input
    $('#addClient-modal input[name=name]').val(null);
    $('#addClient-modal input[name=firstname]').val(null);
    $('#addClient-modal input[name=lastname]').val(null);
    $('#addClient-modal input[name=street]').val(null);
    $('#addClient-modal input[name=zip]').val(null);
    $('#addClient-modal input[name=city]').val(null);
    $('#addClient-modal input[name=email]').val(null);
    $('#addClient-modal input[name=phone]').val(null);
    $('#addClient-modal input[name=description]').val(null);
    $('#addClient-modal input[name=vat_number]').val(null);
    $('#addClient-modal input[name=function]').val(null);

    $('#addClient-modal input[name=name]').parent().fadeOut();
    $('#addClient-modal input[name=firstName]').parent().fadeIn();
    $('#addClient-modal input[name=email]').parent().fadeIn();
    $('#addClient-modal input[name=phone]').parent().fadeIn();
    $('#addClient-modal input[name=description]').parent().fadeOut();
    $('#addClient-modal input[name=vat_number]').parent().fadeOut();
    $('#addClient-modal input[name=function]').parent().fadeOut();
});

// Condition according to audience
$('#addClient-modal select[name=audience]').change(function () {
    if ($(this).val() == "B2C") {
        $('#addClient-modal input[name=name]').parent().fadeOut();
        $('#addClient-modal input[name=firstName]').parent().fadeIn();
        $('#addClient-modal input[name=email]').parent().fadeIn();
        $('#addClient-modal input[name=phone]').parent().fadeIn();
        $('#addClient-modal input[name=vat_number]').parent().fadeOut();
        $('#addClient-modal input[name=function]').parent().fadeOut();
    } else if ($(this).val() == "B2B") {
        $('#addClient-modal input[name=name]').parent().fadeIn();
        $('#addClient-modal input[name=firstName]').parent().fadeIn();
        $('#addClient-modal input[name=lastName]').parent().fadeIn();
        $('#addClient-modal input[name=email]').parent().fadeIn();
        $('#addClient-modal input[name=phone]').parent().fadeIn();
        $('#addClient-modal input[name=vat_number]').parent().fadeIn();
        $('#addClient-modal input[name=function]').parent().fadeIn();
    } else {
        $('#addClient-modal input[name=name]').parent().fadeIn();
        $('#addClient-modal input[name=firstName]').parent().fadeIn();
        $('#addClient-modal input[name=email]').parent().fadeIn();
        $('#addClient-modal input[name=phone]').parent().fadeIn();
        $('#addClient-modal input[name=vat_number]').parent().fadeIn();
        $('#addClient-modal input[name=function]').parent().fadeIn();
    }
})

// Add client
$('#add-client-action').click(function (e) {
    e.preventDefault();
    if($('#addClient-modal #audience option:selected').val() == "B2B"){
        console.log("b2b");
        let data = {
            'audience':             $('#addClient-modal #audience option:selected').val(),
            'type':                 $('#addClient-modal #type option:selected').val(),
            'aquisition':           $('#addClient-modal #aquisition option:selected').val(),
            'name':                 $('#addClient-modal input[name=name]').val(),
            'vat_number':           $('#addClient-modal input[name=vat_number]').val(),
            'street':               $('#addClient-modal input[name=street]').val(),
            'zip':                  $('#addClient-modal input[name=zip]').val(),
            'city':                 $('#addClient-modal input[name=city]').val(),
            'contact_firstname':    $('#addClient-modal input[name=firstname]').val(),
            'contact_lastname':     $('#addClient-modal input[name=lastname]').val(),
            'contact_email':        $('#addClient-modal input[name=email]').val(),
            'contact_phone':        $('#addClient-modal input[name=phone]').val(),
            'contact_function':     $('#addClient-modal input[name=function]').val()
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: "add-company", // Companies route
            data: data,
            dataType: "json",
            success: function (response) {
                if (response.response == 'success') {
                    $("#companies-table").DataTable().ajax.reload();
                    $("#addClient-modal").modal("toggle");
                    $.notify(
                        response.message,
                        response.response
                    );
                }
                else {
                    $.notify(
                        response.message,
                        response.response
                    );
                }
            }
        });
    }
    else if($('#addClient-modal #audience option:selected').val() == "B2C"){
        let data = {
            'audience':             $('#addClient-modal #audience option:selected').val(),
            'type':                 $('#addClient-modal #type option:selected').val(),
            'aquisition':           $('#addClient-modal #aquisition option:selected').val(),
            'name':                 $('#addClient-modal input[name=firstname]').val() + ' ' + $('#addClient-modal input[name=lastname]').val(),
            'firstname':            $('#addClient-modal input[name=firstname]').val(),
            'lastname':             $('#addClient-modal input[name=lastname]').val(),
            'email':                $('#addClient-modal input[name=email]').val(),
            'phone':                $('#addClient-modal input[name=phone]').val(),
            'street':               $('#addClient-modal input[name=street]').val(),
            'zip':                  $('#addClient-modal input[name=zip]').val(),
            'city':                 $('#addClient-modal input[name=city]').val()
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: "add-company", // Company route
            data: data,
            dataType: "json",
            success: function (response) {
                if (response.response == 'success') {
                    $("#companies-table").DataTable().ajax.reload();
                    $("#addClient-modal").modal("toggle");
                    $.notify(
                        response.message,
                        response.response
                    );
                }
                else {
                    $.notify(
                        response.message,
                        response.response
                    );
                }
            }
        });
    }
    else if($('#addClient-modal #audience option:selected').val() == "INDEPENDANT"){
        let data = {
            'audience':             $('#addClient-modal #audience option:selected').val(),
            'type':                 $('#addClient-modal #type option:selected').val(),
            'aquisition':           $('#addClient-modal #aquisition option:selected').val(),
            'name':                 $('#addClient-modal input[name=name]').val(),
            'vat_number':           $('#addClient-modal input[name=vat_number]').val(),
            'street':               $('#addClient-modal input[name=street]').val(),
            'zip':                  $('#addClient-modal input[name=zip]').val(),
            'city':                 $('#addClient-modal input[name=city]').val(),
            'contact_firstname':    $('#addClient-modal input[name=firstname]').val(),
            'contact_lastname':     $('#addClient-modal input[name=lastname]').val(),
            'contact_email':        $('#addClient-modal input[name=email]').val(),
            'contact_phone':        $('#addClient-modal input[name=phone]').val(),
            'contact_function':     $('#addClient-modal input[name=function]').val()
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: "add-company", // Company route
            data: data,
            dataType: "json",
            success: function (response) {
                if (response.response == 'success') {
                    $("#companies-table").DataTable().ajax.reload();
                    $("#addClient-modal").modal("toggle");
                    $.notify(
                        response.message,
                        response.response
                    );
                }
                else {
                    $.notify(
                        response.message,
                        response.response
                    );
                }
            }
        });
    }
});
