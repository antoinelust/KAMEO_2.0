$(document).ready(function () {
    // Open clients and prospects modal
    $("#widget-list").on("click", '#clientsAndProspects-modal-btn', function () {
        // Load dynamics zones
        $("#clientsAndProspects-modal .modal-title").html("Clients et propsects");
        // Load data for the companies data table
        $('#companies-table').DataTable({
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
                "url": "load-data-companies-table", // Route companies
            },
            "columns": [
                {
                    title: "Nom",
                    data: "name"
                },
                {
                    title: "type",
                    data: "type"
                },
                {
                    title: "Status",
                    data: "status"
                }
            ],
        });
        $("#clientsAndProspects-modal").modal("toggle");
    });
<<<<<<< HEAD
});
=======
});
>>>>>>> 266371308b35d26fe3421f5ff3fb290933857b93
