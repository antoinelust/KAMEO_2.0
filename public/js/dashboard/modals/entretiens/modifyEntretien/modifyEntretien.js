// Load and display all data to clients and prospects modal
$("#entretiens-modal").on("click", '.modify-entretien', function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "get",
        url: "get-all-by-entretien-id", // Route companies
        data: {
            "entretien_id": $(this).data("entretienid")
        },
        dataType: "json",
        success: function (response) {

            $("#modifyCompany-modal input[name=id]").remove();

            $("#modifyCompany-modal input[name=name]").val(response.data.entretien.company);

            $("#modifyEntretien-modal").modal("toggle");
        }
    });
});