// Show modify contact company modal
$("#modifyCompany-modal #companies-contact-table").on('click', '.modify', function (e) {
    e.preventDefault();
    $.ajax({
        type: "get",
        url: "retrieve-contact", // Company_contacts route
        data: {
            "contactid": $(this).data('contactid')
        },
        dataType: "json",
        success: function (response) {
            if (response.response == 'success') {
                $("#modify-contactCompany-modal #modify-companyContact-action-btn").removeAttr();
                $("#modify-contactCompany-modal #modify-companyContact-action-btn").attr('data-contactid', response.data.contact.id);
                $("#modify-contactCompany-modal input[name=firstname]").val(response.data.contact.firstname);
                $("#modify-contactCompany-modal input[name=lastname]").val(response.data.contact.lastname);
                $("#modify-contactCompany-modal input[name=email]").val(response.data.contact.email);
                $("#modify-contactCompany-modal input[name=phone]").val(response.data.contact.phone);
                $("#modify-contactCompany-modal input[name=function]").val(response.data.contact.function);
                $("#modify-contactCompany-modal #type option:selected").val(response.data.contact.type);
                $("#modify-contactCompany-modal").modal('toggle');
            } else {
                $.notify(
                    "Problème lors du chargement du donnée du client",
                    "error"
                )
            }

        }
    });
})

// Modify contact by contact id
$('#modify-companyContact-action-btn').click(function (e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "update-contact",
        data: {
            "id":           $(this).data('contactid'),
            "firstname":    $("#modify-contactCompany-modal input[name=firstname]").val(),
            "lastname":     $("#modify-contactCompany-modal input[name=lastname]").val(),
            "email":        $("#modify-contactCompany-modal input[name=email]").val(),
            "phone":        $("#modify-contactCompany-modal input[name=phone]").val(),
            "function":     $("#modify-contactCompany-modal input[name=function]").val(),
            "type":         $("#modify-contactCompany-modal #type option:selected").val(),

        },
        dataType: "json",
        success: function (response) {
            if (response.response == 'success') {
                $("#modify-contactCompany-modal #modify-companyContact-action-btn").removeAttr();
                $("#companies-contact-table").DataTable().ajax.reload();
                $("#modify-contactCompany-modal").modal('toggle');
                $.notify(
                    response.message,
                    response.response
                );
            }
            else {
                $.notify(
                    "Problème lors de la mise à jour",
                    "error"
                );
            }
        }
    });
});