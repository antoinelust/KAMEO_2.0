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
        $('#addEntretien-modal select[name=company]').append('<option disabled selected value style="display :none"></option>');
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

$('#addEntretien-modal button[name=other-plus]').click(function () {
    $('#table-other > tbody:last-child')
    .append(`<tr>
                <td><input type="text" name="other-description" style="width:100%"></td>
                <td><input type="number" step="0.01" name="other-htva" style="width:100%"></td>
                <td><input type="number" step="0.01" name="other-tvac" style="width:100%"></td>
                <td><button class="btn btn-danger btn-sm" type="button" style="font-size: 20px"  name="other-minus">-</button></td>
            </tr>
    `);
    $('#addEntretien-modal #table-other button[name=other-minus]').click(function () {
        $(this).parent().parent().remove();
    });
    $('#addEntretien-modal #table-other input[name=other-tvac]').change(function () {
        $(this).closest('tr').find('[name=other-htva]').val(Math.round($(this).val()/1.21*100)/100);
    });
    $('#addEntretien-modal #table-other input[name=other-htva]').change(function () {
        $(this).closest('tr').find('[name=other-tvac]').val(Math.round($(this).val()*1.21*100)/100);
    });
});


$('#sendButtonAddEntretien').click(function () {

    let checkAtelier = $('#addEntretien-modal input[name=maintenanceatKAMEO]');
    let address = $('#addEntretien-modal input[name=address]');

    let listTr = $('#addEntretien-modal #table-other').find("tr");
    let listValuesTr = [];

    $.each(listTr, function() {
        if($(this).find('[name=other-htva]').val() && $(this).find('[name=other-description]').val()){
            listValuesTr.push([$(this).find('[name=other-htva]').val(),$(this).find('[name=other-description]').val()]);
        }
    });

    console.log(listTr);
    console.log(listValuesTr);

    let data = {
        'company':          $('#addEntretien-modal select[name=company]').val(),
        'bike':             $('#addEntretien-modal select[name=velo]').val(),
        'status':           $('#addEntretien-modal select[name=status]').val(),
        'date':             $('#addEntretien-modal input[name=dateMaintenance]').val(),
        'outDate':          $('#addEntretien-modal input[name=dateOutPlanned]').val(),
        'address':          checkAtelier.is(":checked") ? "8 Rue de la brasserie, 4000 Liège" : address.val(),
        'clientWarned':     $('#addEntretien-modal input[name=clientWarned]').is(":checked") ? 1 : 0,
        'comment':          $('#addEntretien-modal textarea[name=comment]').val(),
        'internalComment':  $('#addEntretien-modal textarea[name=internalComment]').val(),
        'otherTable':       listValuesTr
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

$('#addEntretien-modal button[name=btn-plus-manualWork]').click(function () {
    $('#addEntretien-modal').find('.manualWorkload tbody')
        .append(`<tr class="manualWorkloadRow form-group">
            <td class="category">
                <select title="status" class="form-control required" name="manualWork-category" style="border: 1px solid; border-color:grey">
                    <option disabled selected value style="display :none"></option>
                    <option value="Autres">Autres</option>
                    <option value="Cadre">Cadre</option>
                    <option value="Direction et pédalier">Direction et pédalier</option>
                    <option value="Freins">Freins</option>
                    <option value="Pack">Pack</option>
                    <option value="Roues">Roues</option>
                    <option value="Transmission">Transmission</option>
                </select>
            </td>
            <td class="service">
              <select name="manualWork-description" class="form-control required"></select>
            </td>
            <td class="manualWorkloadLength">
              <input type="number" step='5' class="form-control required" name="manualWorkloadLength[]" value="" />
            </td>
            <td class="manualWorkloadTotal">
              <input type="number" step='0.01' class="form-control required" name="manualWorkloadTotal[]" value="" />
            </td>
            <td class="manualWorkloadTotalTVAC">
              <input type="number" step='0.01' class="form-control required" name="manualWorkloadTotalTVAC[]" value="" />
            </td>
            <td><button class="btn btn-danger btn-sm" type="button" style="font-size: 20px"  name="manualWork-delete">-</button></td>
            <tr>
        `);
    $('#addEntretien-modal #entretien-manualWork-table button[name=manualWork-delete]').click(function () {
        $(this).parent().parent().remove();
    });
    $('#addEntretien-modal .manualWorkloadTotal input').off()
    $('#addEntretien-modal .manualWorkloadTotal input').change(function(){
      $(this).closest('tr').find('.manualWorkloadTotalTVAC input').val(Math.round($(this).val()*1.06*100)/100);
    });
    $('#addEntretien-modal .manualWorkloadTotalTVAC input').off()
    $('#addEntretien-modal .manualWorkloadTotalTVAC input').change(function(){
      $(this).closest('tr').find('.manualWorkloadTotal input').val(Math.round($(this).val()/1.06*100)/100);
    });
    $('#addEntretien-modal select[name=manualWork-category]').change(function () {

        $('#addEntretien-modal select[name=manualWork-description]').empty();
    
            let data = {'category-id':          $(this).val(),}
            $.post("retrieve-manualwork-description-by-category", data, function(data){
                $.each(JSON.parse(data).data, function(index, element) {
                $('#addEntretien-modal select[name=manualWork-description]').append(new Option(element, element));
            });
        });
    });
});

