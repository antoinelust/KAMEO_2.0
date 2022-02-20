// Show delete confirmation modal
$("#modifyCompany-modal #companies-contact-table").on('click', '.delete', function(e){
    e.preventDefault();
    $("#delete-contactCompany-action-btn").removeData('contactid');
    $("#delete-contactCompany-action-btn").attr('data-contactid', $(this).data('contactid'));
    $("#delete-contactCompany-modal").modal('toggle');
})

// Delete one by id
$("#delete-contactCompany-action-btn").click(function(e){ 
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "delete-contact",
        data: {
            "contactid": $(this).data('contactid')
        },
        dataType: "json",
        success: function (response) {
            if(response.response == "success"){
                $("#delete-contactCompany-action-btn").removeData('contactid');
                $("#companies-contact-table").DataTable().ajax.reload();
                $("#delete-contactCompany-modal").modal('toggle');
                $.notify(
                    response.message,
                    response.response
                )
            }
            else{
                $.notify(
                    "Erreur lors de la suppression",
                    "error"
                )
            }
        }
    });
});