// Load data and show modal
$("#bikesClients-modal").on('click', '#addBike-btn', function (e) {
    e.preventDefault();
    $('#addBikeClient-modal').find('input').each(function () {
        $(this).val(null);
    });
    $('#addBikeClient-modal').find('option').each(function () {
        $(this).remove();
    });
    $("#addBikeClient-modal #employe").parent().show();
    $("#addBikeClient-modal #email").parent().show();
    $("#addBikeClient-modal #type").append(`<option value="partage">Partage</option><option value="personnel">Personnel</option>`);
    $.ajax({
        type: "get",
        url: "retrieve-brands", // Bikes route
        dataType: "json",
        success: function (response) {
            if (response.response == 'success') {
                response.data.brands.forEach(function (brand) {
                    let option = '<option value="' + brand.brand + '">' + brand.brand + '</option>';
                    $('#addBikeClient-modal select[id=brand]').append(option);
                })
                $.ajax({
                    type: "get",
                    url: "retrieve-models-by-brand", // Bikes route
                    data: {
                        "brand": $('#addBikeClient-modal #brand option:selected').val()
                    },
                    dataType: "json",
                    success: function (response) {
                        if (response.response == "success") {
                            response.data.models.forEach(function (model) {
                                let option = '<option data-modelid="' + model.id + '" value="' + model.model + '">' + model.model + '</option>';
                                $('#addBikeClient-modal select[id=model]').append(option);
                            })
                            $.ajax({
                                type: "get",
                                url: "retrieve-bike-img", // Bikes route
                                data: {
                                    "id": $('#addBikeClient-modal #model option:selected').data('modelid')
                                },
                                dataType: "json",
                                success: function (response) {
                                    $("#addBikeClient-modal #imgBike").attr('src', 'storage/' + response.data.img);
                                }
                            });
                            $.ajax({
                                type: "get",
                                url: "retrieve-sizes-by-model", // Bikes route
                                data: {
                                    "id": $('#addBikeClient-modal #model option:selected').data('modelid')
                                },
                                dataType: "json",
                                success: function (response) {
                                    if (response.response == "success") {
                                        $.each(response.data.sizes[0].sizes.split(","), function(i, size){
                                            let option = '<option value="' + size + '">' + size + '</option>';
                                            $('#addBikeClient-modal select[id=size]').append(option);
                                        });
                                        $.ajax({
                                            type: "get",
                                            url: "retrieve-companies", // Companies route
                                            dataType: "json",
                                            success: function (response) {
                                                if (response.response == "success") {
                                                    response.data.companies.forEach(function (compagnie) {
                                                        let option = '<option value="' + compagnie.id + '">' + compagnie.name + '</option>';
                                                        $('#addBikeClient-modal select[id=company]').append(option);
                                                    })
                                                    $.ajax({
                                                        type: "get",
                                                        url: "retrieve-employes-by-company-id", // Users route
                                                        data: {
                                                            "company_id": $('#addBikeClient-modal #company option:selected').val()
                                                        },
                                                        dataType: "json",
                                                        success: function (response) {
                                                            if(response.response == 'success'){
                                                                response.data.employes.forEach(function (employe) {
                                                                    let option = '<option data-employemail="' + employe.email + '" value="' + employe.id + '">' + employe.firstname + ' ' + employe.lastname + '</option>';
                                                                    $('#addBikeClient-modal select[id=employe]').append(option);
                                                                })
                                                                $("#addBikeClient-modal #email").val($('#addBikeClient-modal #employe option:selected').data('employemail'));
                                                                $("#addBikeClient-modal").modal('toggle');
                                                            }
                                                            else{
                                                                "Une erreur est survenue lors du chargement des employés de la compagnie",
                                                                "error"
                                                            }
                                                        }
                                                    });
                                                } else {
                                                    $.notify(
                                                        "Une erreur est survenue lors du chargement des compagnies",
                                                        "error"
                                                    );
                                                }
                                            }
                                        });
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

// If option of the select change .....
$("#addBikeClient-modal #type").change(function(){
    if($("#addBikeClient-modal #type option:selected").val() == 'partage'){
        $("#addBikeClient-modal #employe").parent().show();
        $("#addBikeClient-modal #email").parent().show();
    }else{
        $("#addBikeClient-modal #employe").parent().hide();
        $("#addBikeClient-modal #email").parent().hide();
    }
})

// If option of the select change .....
$("#addBikeClient-modal #employe").change(function(){
    $('#addBikeClient-modal #email').val($('#addBikeClient-modal #employe option:selected').data('employemail'));
})

// If option of the select change .....
$("#addBikeClient-modal #brand").change(function(){
    $("#addBikeClient-modal #model").find('option').each(function () {
        $(this).remove();
    });
    $("#addBikeClient-modal #size").find('option').each(function () {
        $(this).remove();
    });
    $.ajax({
        type: "get",
        url: "retrieve-models-by-brand", // Bikes route
        data: {
            "brand": $('#addBikeClient-modal #brand option:selected').val()
        },
        dataType: "json",
        success: function (response) {
            if (response.response == "success") {
                response.data.models.forEach(function (model) {
                    let option = '<option data-modelid="' + model.id + '" value="' + model.model + '">' + model.model + '</option>';
                    $('#addBikeClient-modal select[id=model]').append(option);
                })
                $.ajax({
                    type: "get",
                    url: "retrieve-bike-img", // Bikes route
                    data: {
                        "id": $('#addBikeClient-modal #model option:selected').data('modelid')
                    },
                    dataType: "json",
                    success: function (response) {
                        $("#addBikeClient-modal #imgBike").attr('src', 'storage/' + response.data.img);
                    }
                });
                $.ajax({
                    type: "get",
                    url: "retrieve-sizes-by-model", // Bikes route
                    data: {
                        "id": $('#addBikeClient-modal #model option:selected').data('modelid')
                    },
                    dataType: "json",
                    success: function (response) {
                        if (response.response == "success") {
                            if(response.data.sizes[0].sizes == 'unique'){
                                let option = '<option value="' + response.data.sizes[0].sizes + '">' + response.data.sizes[0].sizes + '</option>';
                                $('#addBikeClient-modal select[id=size]').append(option);
                            }
                            else if(response.data.sizes[0].sizes === null){
                                let option = '<option value="">Aucune taille</option>';
                                $('#addBikeClient-modal select[id=size]').append(option);
                            }
                            else{
                                $.each(response.data.sizes[0].sizes.split(","), function(i, size){
                                    let option = '<option value="' + size + '">' + size + '</option>';
                                    $('#addBikeClient-modal select[id=size]').append(option);
                                });
                            }
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
})

// If option of the select change .....
$("#addBikeClient-modal #model").change(function(){
    $("#addBikeClient-modal #size").find('option').each(function () {
        $(this).remove();
    });
    $.ajax({
        type: "get",
        url: "retrieve-sizes-by-model", // Bikes route
        data: {
            "id": $('#addBikeClient-modal #model option:selected').data('modelid')
        },
        dataType: "json",
        success: function (response) {
            if (response.response == "success") {
                if(response.data.sizes[0].sizes == 'unique'){
                    let option = '<option value="' + response.data.sizes[0].sizes + '">' + response.data.sizes[0].sizes + '</option>';
                    $('#addBikeClient-modal select[id=size]').append(option);
                }
                else if(response.data.sizes[0].sizes === null){
                    let option = '<option value="">Aucune taille</option>';
                    $('#addBikeClient-modal select[id=size]').append(option);
                }
                else{
                    $.each(response.data.sizes[0].sizes.split(","), function(i, size){
                        let option = '<option value="' + size + '">' + size + '</option>';
                        $('#addBikeClient-modal select[id=size]').append(option);
                    });
                }
            } else {
                $.notify(
                    "Une erreur est survenue lors du chargement des tailles",
                    "error"
                );
            }
        }
    });
})

// If option of the select change .....
$("#addBikeClient-modal #company").change(function(){
    $("#addBikeClient-modal #employe").find('option').each(function () {
        $(this).remove();
    });
    $.ajax({
        type: "get",
        url: "retrieve-sizes-by-model", // Bikes route
        data: {
            "id": $('#addBikeClient-modal #model option:selected').data('modelid')
        },
        dataType: "json",
        success: function (response) {
            if (response.response == "success") {
                $.ajax({
                    type: "get",
                    url: "retrieve-employes-by-company-id", // Users route
                    data: {
                        "company_id": $('#addBikeClient-modal #company option:selected').val()
                    },
                    dataType: "json",
                    success: function (response) {
                        if(response.response == 'success'){
                            response.data.employes.forEach(function (employe) {
                                let option = '<option data-employemail="' + employe.email + '" value="' + employe.id + '">' + employe.firstname + ' ' + employe.lastname + '</option>';
                                $('#addBikeClient-modal select[id=employe]').append(option);
                            })
                            $("#addBikeClient-modal #email").val($('#addBikeClient-modal #employe option:selected').data('employemail'));
                        }
                        else{
                            "Une erreur est survenue lors du chargement des emplyés de la compagnie",
                            "error"
                        }
                    }
                });
            } else {
                $.notify(
                    "Une erreur est survenue lors du chargement des employés de la compagnie",
                    "error"
                );
            }
        }
    });
})

// Add one action 
$("#add-bikeClient-action-btn").click(function (e) { 
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "add-bike-client", // Bikes route
        data: {
            "price":                        $('#addBikeClient-modal #price').val(),
            "brand":                        $('#addBikeClient-modal #brand option:selected').val(),
            "model":                        $('#addBikeClient-modal #model option:selected').val(),
            "size":                         $('#addBikeClient-modal #size option:selected').val(),
            "color":                        $('#addBikeClient-modal #color').val(),
            "type":                         $('#addBikeClient-modal #type option:selected').val(),
            "employe":                      $('#addBikeClient-modal #employe option:selected').val(),
            "email_employe":                $('#addBikeClient-modal #email option:selected').val(),
            "bike_buying_date":             $("#addBikeClient-modal #sellingDate").val(),
            "estimated_delivery_date":      $("#addBikeClient-modal #estimatedDeliveryDate").val(),
            "bikes_catalog_id":             $('#addBikeClient-modal #model option:selected').data('modelid'),
            "companies_id":                 $('#addBikeClient-modal #company option:selected').val(),
        },
        dataType: "json",
        success: function (response) {
            if(response.response == "success"){
                $("#bikesClients-table").DataTable().ajax.reload();
                $("#addBikeClient-modal").modal('toggle');
                $.notify(
                    response.message,
                    response.response
                )
            }
            else{
                $.notify(
                    response.message,
                    response.response
                )
            }
        }
    });
});