// Load data and show modal
$("#modifyCompany-modal").on('click', '#add-bikeCompany-btn', function (e) {
    e.preventDefault();
    $('#add-bikeCompany-modal').find('input, select, option').each(function () {
        $(this).val(null);
    });
    $.ajax({
        type: "get",
        url: "retrieve-brands", // Bikes route
        dataType: "json",
        success: function (response) {
            if (response.response == 'success') {
                response.data.brands.forEach(function (brand) {
                    let option = '<option value="' + brand + '">' + brand + '</option>';
                    $('#add-bikeCompany-modal select[id=brand]').append(option);
                })
                $.ajax({
                    type: "get",
                    url: "retrieve-models-by-brand",
                    data: {
                        "brand": $('#add-bikeCompany-modal #brand option:selected').val()
                    },
                    dataType: "json",
                    success: function (response) {
                        if (response.response == "success") {
                            response.data.models.forEach(function (model) {
                                let option = '<option value="' + model + '">' + model + '</option>';
                                $('#add-bikeCompany-modal select[id=model]').append(option);
                            })
                            $.ajax({
                                type: "get",
                                url: "retrieve-sizes-by-model",
                                data: {
                                    "model": $('#add-bikeCompany-modal #model option:selected').val()
                                },
                                dataType: "json",
                                success: function (response) {
                                    if (response.response == "success") {
                                        response.data.sizes.forEach(function (size) {
                                            let option = '<option value="' + size + '">' + size + '</option>';
                                            $('#add-bikeCompany-modal select[id=size]').append(option);
                                        })
                                    } else {
                                        $.notify(
                                            "Une erreur est survenue lors du chargement des tailles",
                                            "error"
                                        );
                                    }
                                }
                            });
                        } else {
                            $.notify(
                                "Une erreur est survenue lors du chargement des modèles",
                                "error"
                            );
                        }
                    }
                });
                $("#add-bikeCompany-modal").modal("toggle");
            }
            else {
                $.notify(
                    "Une erreur est survenue lors du chargement des marques",
                    "error"
                );
            }
        }
    })
})

$("#add-bikeCompany-modal #brand").change(function(){
    $.ajax({
        type: "get",
        url: "retrieve-models-by-brand",
        data: {
            "brand": $('#add-bikeCompany-modal #brand option:selected').val()
        },
        dataType: "json",
        success: function (response) {
            if(response.response == "success"){
                $('#add-bikeCompany-modal select[id=model]').find('option').remove();
                response.data.models.forEach(function(model){
                    let option = '<option value="' + model + '">' + model + '</option>';
                    $('#add-bikeCompany-modal select[id=model]').append(option);
                })
            }
            else{
                $.notify(
                    "Une erreur est survenue lors du chargement des modèles",
                    "error"
                );
            }
        }
    })
})