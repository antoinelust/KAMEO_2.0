$(document).ready(function () {
    // Open clients and prospects modal
    $("#widget-list").on("click", '#clientsAndProspects-modal-btn', function(){
        // Load dynamics zones
        $("#clientsAndProspects-modal .modal-title").html("Clients et propsects");
        // Load data for the companies data table
        $('#companies-table').DataTable({
            "destroy": true,
            "ajax": {
                "url": "load-data-companies-table", // Route companies
                "type": "get",
                "dataType": "json",
                "cache": false,
                "dataSrc": ""
            },
            "columns": [
                { data: "name" },
                { data: "type" },
                { data: "status" }
            ],
            "language": {
                "sProcessing": "Traitement en cours ...",
                "sLengthMenu": "Afficher _MENU_ lignes",
                "sZeroRecords": "Aucun résultat trouvé",
                "sEmptyTable": "Aucune donnée disponible",
                "sInfo": "Lignes _START_ à _END_ sur _TOTAL_",
                "sInfoEmpty": "Aucune ligne affichée",
                "sInfoFiltered": "(Filtrer un maximum de_MAX_)",
                "sInfoPostFix": "",
                "sSearch": "Chercher:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Chargement...",
                "oPaginate": {
                    "sFirst": "Premier", "sLast": "Dernier", "sNext": "Suivant", "sPrevious": "Précédent"
                },
                "oAria": {
                    "sSortAscending": ": Trier par ordre croissant", "sSortDescending": ": Trier par ordre décroissant"
                }
            },
            "columnDefs": [
                {
                    "targets": -1,
                    "className": 'dt-body-right'
                }
            ]
        });
        $("#clientsAndProspects-modal").modal("toggle");
    });
});


