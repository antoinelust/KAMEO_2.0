// Open add client modal
$('#addEntretien-btn').click(function (e) {
    $("#addEntretien-modal").modal("toggle");

    $('#addEntretien-modal input[name=dateMaintenance]').val(null);
    $('#addEntretien-modal input[name=dateOutPlanned]').val(null);
    $('#addEntretien-modal input[name=maintenanceatKAMEO]').prop('checked', true);;
    $('#addEntretien-modal input[name=address]').val(null);
    $('#addEntretien-modal input[name=clientWarned]').val(null);

    $('#addEntretien-modal input[name=address]').parent().fadeOut();

});

$('#addEntretien-modal input[name=maintenanceatKAMEO]').change(function () {
    if ($(this).is(":checked")) {
        $('#addEntretien-modal input[name=address]').parent().fadeOut();
    }
    else {
        $('#addEntretien-modal input[name=address]').parent().fadeIn();
    }
});

$('#sendButtonAddEntretien').click(function () {
    console.log($('#addEntretien-modal input[name=address]').val());
    let address = "";
    if ($('#addEntretien-modal input[name=maintenanceatKAMEO]').is(":checked")) {
        console.log('dans le if');
        address = "8 Rue de la brasserie, 4000 Liège";
        console.log(address);
    }
    else {
        address = $('#addEntretien-modal input[name=address]').val();
    }

    let data = {
        'company':          $('#addEntretien-modal input[name=company]').val(),
        'model':            $('#addEntretien-modal input[name=velo]').val(),
        'status':           $('#addEntretien-modal input[name=status]').val(),
        'date':             $('#addEntretien-modal input[name=dateMaintenance]').val(),
        'outDate':          $('#addEntretien-modal input[name=dateOutPlanned]').val(),
        'address':          address,
        'clientWarned':     $('input[name=clientWarned]').val(),
        'comment':          $('#addEntretien-modal input[name=comment]').val(),
        'internalComment':  $('#addEntretien-modal input[name=internalComment]').val()
    }
    console.log(data);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "post",
        url: "add-entretien", // Companies route
        data: data,
        dataType: "json",
        success: function (response) {
            if (response.response == 'success') {
                $("#entretiens-table").DataTable().ajax.reload();
                $("#addEntretien-modal").modal("toggle");
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
});

