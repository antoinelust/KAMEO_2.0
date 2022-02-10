// Load and display all data to groupedOrders modal
$("#clientsAndProspects-modal").on("click", '.modify-company', function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "get",
        url: "get-all-by-company-id", // Route companies
        data: {
            "company_id": $(this).data("companyid")
        },
        dataType: "json",
        success: function (response) {
            $("#modifyCompany-modal input[name=id]").remove();
            $('#modifyCompany-modal').append('<input class="hidden" name="id" value="' + response.data.company.id + '" />');
            $("#modifyCompany-modal .modal-title").html("Modifier les informations de " + response.data.company.name);
            $("#modifyCompany-modal img[name=logo]").attr('src', '../storage/app/public/companies_logo/' + response.data.company.logo)
            $("#modifyCompany-modal input[name=name]").val(response.data.company.name);
            $("#modifyCompany-modal input[name=tva]").val(response.data.company.vat_number);
            $("#modifyCompany-modal input[name=street]").val(response.data.company.street);
            $("#modifyCompany-modal input[name=city]").val(response.data.company.city);
            $("#modifyCompany-modal input[name=zip]").val(response.data.company.zip);
            $("#modifyCompany-modal #billing_group").html(`
                <option value="` + response.data.company.billing_group + `" selected disabled>` + response.data.company.billing_group + `</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            `);
            $("#modifyCompany-modal #type").html(`
                <option value="` + response.data.company.type + `" selected disabled>` + response.data.company.type + `</option>
                <option value="client">client</option>
                <option value="prospect">prospect</option>
                <option value="old_prospect">old_prospect</option>
                <option value="old_client">old_client</option>
                <option value="not_interested">not_interested</option>
            `);
            $("#modifyCompany-modal #aquisition").html(`
                <option value="` + response.data.company.aquisition + `" selected disabled>` + response.data.company.aquisition + `</option>
                <option value="KAMEO">KAMEO</option>
                <option value="SECUREX">SECUREX</option>
                <option value="ACERTA">ACERTA</option>
            `);
            $("#modifyCompany-modal #audience").html(`
                <option value="` + response.data.company.audience + `" selected disabled>` + response.data.company.audience + `</option>
                <option value="B2C">B2C</option>
                <option value="B2B">B2B</option>
                <option value="INDEPENDANT">INDEPENDANT</option>
            `);
            $("#modifyCompany-modal #status").html(`
                <option value="` + response.data.company.status + `" selected disabled>` + response.data.company.status + `</option>
                <option value="actif">actif</option>
                <option value="inactif">inactif</option>
            `);
            $("#modifyCompany-modal").modal("toggle");
        }
    });
});

// Upload company action
$('#upload-action-btn').click(function (e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "post",
        url: "update-company", // Route companies
        data: {
            "id":               $("#modifyCompany-modal input[name=id]").val(),
            "name":             $("#modifyCompany-modal input[name=name]").val(),
            "vat_number":       $("#modifyCompany-modal input[name=tva]").val(),
            "street":           $("#modifyCompany-modal input[name=street]").val(),
            "city":             $("#modifyCompany-modal input[name=city]").val(),
            "zip":              $("#modifyCompany-modal input[name=zip]").val(),
            "billing_group":    $("#modifyCompany-modal #billing_group option:selected").val(),
            "type":             $("#modifyCompany-modal #type option:selected").val(),
            "aquisition":       $("#modifyCompany-modal #aquisition option:selected").val(),
            "audience":         $("#modifyCompany-modal #audience option:selected").val(),
            "status":           $("#modifyCompany-modal #status option:selected").val()
        },
        dataType: "json",
        success: function (response) {
            if (response.response == 'success') {
                $("#modifyCompany-modal input[name=id]").remove();
                $("#companies-table").DataTable().ajax.reload();
                $("#modifyCompany-modal").modal("toggle");
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

// Instant change and upload logo 
$("#modifyCompany-modal #upload-logo-form").change(function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    let companyId = $("#modifyCompany-modal input[name=id]").val();
    formData.append('companyId', companyId);
    $.ajax({
        type: "post",
        url: "upload-logo", // Route companies
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function (response) {
            if (response.response == 'success') {
                $("#modifyCompany-modal #upload-logo-form img[name=logo]").attr('src', '../storage/app/public/companies_logo/' + response.data);
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