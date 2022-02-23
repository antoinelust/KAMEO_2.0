// Open add client modal
$('#addEntretien-btn').click(function (e) {
    $("#addEntretien-modal").modal("toggle");

    $('#addEntretien-modal input[name=dateMaintenance]').val(null);
    $('#addEntretien-modal input[name=dateOutPlanned]').val(null);
    $('#addEntretien-modal input[name=maintenanceatKAMEO]').prop('checked', true);;
    $('#addEntretien-modal input[name=address]').val(null);
    $('#addEntretien-modal input[name=clientWarned]').val(null);

    $('#addEntretien-modal input[name=address]').parent().fadeOut();



    $.get("retrieve-company-names-and-id", function(data, status){
        $.each(JSON.parse(data), function(index, element) {
            $('#addEntretien-modal select[name=company]').append(new Option(element.name, element.id));
        });
    });
});

$('#addEntretien-modal input[name=maintenanceatKAMEO]').change(function () {
    if ($(this).is(":checked")) {
        $('#addEntretien-modal input[name=address]').parent().fadeOut();
    }
    else {
        $('#addEntretien-modal input[name=address]').parent().fadeIn();
    }
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#addEntretien-modal select[name=company]').change(function () {

    $('#addEntretien-modal select[name=velo]').empty();

    let data = {'company_id':          $('#addEntretien-modal select[name=company]').val(),}

    $.post("retrieve-bikesId-by-company-id", data, function(data, status){
        $.each(JSON.parse(data).data, function(index, element) {
            $('#addEntretien-modal select[name=velo]').append(new Option(element.id, element.id));
        });
    });
});

$('#sendButtonAddEntretien').click(function () {

    let checkAtelier = $('#addEntretien-modal input[name=maintenanceatKAMEO]');
    let address = $('#addEntretien-modal input[name=address]');

    let data = {
        'company':          $('#addEntretien-modal select[name=company]').val(),
        'bike':             $('#addEntretien-modal select[name=velo]').val(),
        'status':           $('#addEntretien-modal select[name=status]').val(),
        'date':             $('#addEntretien-modal input[name=dateMaintenance]').val(),
        'outDate':          $('#addEntretien-modal input[name=dateOutPlanned]').val(),
        'address':          checkAtelier.is(":checked") ? "8 Rue de la brasserie, 4000 Liège" : address.val(),
        'clientWarned':     $('#addEntretien-modal input[name=clientWarned]').is(":checked") ? 1 : 0,
        'comment':          $('#addEntretien-modal textarea[name=comment]').val(),
        'internalComment':  $('#addEntretien-modal textarea[name=internalComment]').val()
    }

    $.ajax({
        type: "post",
        url: "add-entretien",
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
