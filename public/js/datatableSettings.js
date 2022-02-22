const datatableLang = {
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
}
const datatableLength = 5;
const datatableLengthMenu = [5, 10, 25, 50, 75, 100];
const datatableColumnDef = [
    {
        "targets": -1,
        "className": 'dt-body-right'
    }
]
const datatableToken = {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
}