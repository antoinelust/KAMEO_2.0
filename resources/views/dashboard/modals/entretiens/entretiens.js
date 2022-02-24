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
            "pageLength": 5,
            "lengthMenu": [ 5, 10, 25, 50, 75, 100 ],
            "destroy": true,
            "ajax": {
                "url": "load-data-entretiens-table", // Route entretiens
                "type": "get",
                "dataType": "json",
                "cache": false,
                "dataSrc": ""
            },
            "columns": [
                { data: "id",
                    render: function(data){
                        return '<a data-entretienid="' + data + '"href="#" class="modify-entretien">' + data + '</a>'
                } },
                { data: "idBike" },
                { data: "client" },
                { data: "model" },
                { data: "outDate" },
                { data: "date" },
                { data: "status" },
                { data: "address" }
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
        });
        $("#entretiens-modal").modal("toggle");
    });
});


