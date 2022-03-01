// Add contact company
$('#add-contactCompany-btn').click(function (e) { 
    e.preventDefault();
    $("#modifyCompany-modal input[name=id]").val();
    $('#add-contactCompany-modal').find('input')
                    .each(function () {
                        $(this).val(null);
                    });
    $("#add-contactCompany-modal").modal("toggle");
    $("#add-contactCompany-modal #add-contactCompany-modal-title").val("Ajouter un contact à " + $(this).data('companyname'));
    $("#add-companyContact-action-btn").click(function(e){ 
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "add-contact-company", // Companies route
            data: {
                "company_id":   $("#modifyCompany-modal input[name=id]").val(),
                "firstname":    $("#add-contactCompany-modal input[name=firstname]").val(),
                "lastname":     $("#add-contactCompany-modal input[name=lastname]").val(),
                "email":        $("#add-contactCompany-modal input[name=email]").val(),
                "phone":        $("#add-contactCompany-modal input[name=phone]").val(),
                "function":     $("#add-contactCompany-modal input[name=function]").val(),
                "type":         $("#add-contactCompany-modal #type option:selected").val(),
            },
            dataType: "json",
            success: function (response) {
                if (response.response == 'success') {
                    $("#addContactCompany-btn").removeData('companyid'); 
                    $("#addContactCompany-btn").removeData('companyname'); 
                    $("#companies-contact-table").DataTable().ajax.reload();
                    $("#add-contactCompany-modal").modal("toggle");
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
});