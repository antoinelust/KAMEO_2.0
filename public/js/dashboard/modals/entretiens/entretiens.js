$(document).ready(function () {
    // Open entretiens modal
    $("#widget-list").on("click", '#entretiens-modal-btn', function(){
        // Load dynamics zones
        $("#entretiens-modal .modal-title").html("Entretiens:");
        // Load data for the companies data table
        $('#entretiens-table').DataTable({
            "retrieve": true,
            "pageLength": datatableLength,
            "lengthMenu": datatableLengthMenu,
            "language": datatableLang,
            "columnDefs": datatableColumnDef,
            "destroy": true,
            "ajax": {
                "url": "load-data-entretiens-table", // Route entretiens
                "type": "get",
                "dataType": "json",
                "cache": false,
                "dataSrc": ""
            },
            "columns": [
                {
                    title: "ID",
                    data: "id",
                    render: function(data){
                        return '<a data-entretienid="' + data + '"href="#" class="modify-entretien">' + data + '</a>'
                    } 
                },
                {
                    title: "ID Vélo",
                    data: "idBike"
                },
                { 
                    title: "Client",
                    data: "client"
                },
                { 
                    title: "Modèle",
                    data: "model" 
                },
                { 
                    title: "Date de sortie estimée",
                    data: "outDate" 
                },
                { 
                    title: "Date",
                    data: "date" 
                },
                { 
                    title: "Status",
                    data: "status" 
                },
                { 
                    title: "Adresse",
                    data: "address" 
                }
            ],
        });
        $("#entretiens-modal").modal("toggle");
    });
});


