// Load bikes table and open modal
$("#widget-list").on('click', '#bikes-modal-btn', function (e) {
    e.preventDefault();
    $('#bikesClients-table').DataTable({
        "retrieve": true,
        "pageLength": datatableLength,
        "lengthMenu": datatableLengthMenu,
        "language": datatableLang,
        "columnDefs": datatableColumnDef,
        "ajax": {
            "headers": datatableToken,
            "type": "get",
            "dataType": "json",
            "cache": false,
            "dataSrc": "",
            "url": "load-data-clients-bikes-table", // Route bikes
        },
        "columns": [
            {
                title: "ID",
                data: "id",
                render: function(data, type, row){
                    return data;
                }
            },
            {
                title: "Société",
                data: "company",
                render: function(data, type, row){
                    return data;
                }
            },
            {
                title: "Marque",
                data: "brand",
                render: function(data, type, row){
                    return data;
                }
            },
            {
                title: "Modèle",
                data: "model",
                render: function(data, type, row){
                    return data;
                }
            },
            {
                title: "Début du contrat",
                data: "contract_start",
                render: function(data, type, row){
                    return data;
                }
            },
            {
                title: "Fin du contrat",
                data: "contract_end",
                render: function(data, type, row){
                    return data;
                }
            },
            {
                title: "Prix de location",
                data: "leasing_price",
                render: function(data){
                    return data + "€";
                }
            },
            {
                title: "Assurance",
                data: "insurance",
                render: function(data){
                    if(data == "Y"){
                        return '<i style="color: #3cb395;" class="fa fa-check"> </i>';
                    }
                    else{
                        return '<i style="color: #dc3545;" class="fa fa-xmark"> </i>';
                    }
                }
            },
            {
                title: "État",
                data: "usable",
                render: function(data){
                    if(data == "OK"){
                        return '<i style="color: #3cb395;" class="fa fa-check"> </i>';
                    }
                    else{
                        return '<i style="color: #dc3545;" class="fa fa-xmark"> </i>';
                    }
                }
            },
        ],
    });
    $("#bikesClients-modal").modal('toggle');
})