<div class="modal fade" id="entretiens-modal" tabindex="-1" role="modal" aria-labelledby="modal-label-3" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="modal-label-3" class="modal-title text-primary"></h4>
                <button aria-hidden="true" data-bs-dismiss="modal" class="btn-close float-right" style="font-size:2em" type="button">×</button>
            </div>
            <div class="modal-body">
                <div style="margin-bottom: 10px;">
                    <button id="addEntretien-btn" type="button" class="btn btn-primary btn-sm">+ Ajouter un Entretien</button>
                </div>
                <div class="row">
                    <div class="col">
                        <div>
                            <table style="width: 100%;" id="entretiens-table" class="table">
                                <thead>
                                    <tr>
                                        <th style="text-align: left;" scope="col">ID</th>
                                        <th style="text-align: left;" scope="col">ID Vélo</th>
                                        <th style="text-align: left;" scope="col">Client</th>
                                        <th style="text-align: left;" scope="col">Modèle</th>
                                        <th style="text-align: left;" scope="col">Date de sortie planifiée</th>
                                        <th style="text-align: left;" scope="col">Date</th>
                                        <th style="text-align: left;" scope="col">Statut</th>
                                        <th style="text-align: left;" scope="col">Adresse</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button data-bs-dismiss="modal" class="btn btn-b" type="button">Fermer</button>
            </div>
        </div>
    </div>
</div>

<script src="../resources/views/dashboard/modals/entretiens/entretiens.js"></script>

<script type="text/javascript">

</script>
