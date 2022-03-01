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
                    data: "name",
                        render: function(data) {
                            return '<a data-companyid="' + data[0] + '" href="#" class="modify-company">' + data[1] + '</a>'
                        }
                },
                {
                    title: "Type",
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
});