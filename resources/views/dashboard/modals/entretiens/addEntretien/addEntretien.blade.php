<div class="modal fade" id="addEntretien-modal" tabindex="-1" role="modal" aria-labelledby="modal-label-3" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="box-shadow: 1px 1px 1px black;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="modal-label-3" class="modal-title text-primary">Ajouter un entretien</h4>
                <button aria-hidden="true" data-bs-dismiss="modal" class="btn-close float-right" style="font-size:2em" type="button">×</button>
            </div>
            <div class="modal-body">
                <div style="margin-bottom: 10px;">
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label for="utilisateur">Société</label>
                            <select title="Veuillez sélectionner" class="form-control required form_company" name="company" data-live-search="true" style="border: 1px solid; border-color:grey"></select>
                            <label for="utilisateur">Vélo</label>
                            <select title="velo" class="form-control required form_velo" name="velo" style="border: 1px solid; border-color:grey"></select>
                            <label for="utilisateur">Status</label>
                            <select title="status" class="form-control required" name="status" style="border: 1px solid; border-color:grey">
                                <option value="CONFIRMED">Confirmé</option>
                                <option value="AUTOMATICALY_PLANNED">Planifié automatiquement</option>
                                <option value="MANUALLY_PLANNED">Planifié manuellement</option>
                                <option value="DONE">FAIT</option>
                                <option value="CANCELLED">ANNULE</option>
                                <option value="IN_SHOP">A L'atelier</option>
                                <option value="TO_PLAN">EN Attente de validation du client</option>
                                <option value="WAITING_PIECES">En attente de pièces</option>
                                <option value="DELIVERED_TO_CLIENT">Livré au client</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="dateMaintenance">Date d'entretien</label>
                            <input type="date" title="dateMaintenance" name="dateMaintenance" class="required" />
                        </div>
                        <div class="col-md-4">
                            <label for="dateOutPlanned">Date de sortie planifié</label>
                            <input type="date" title="dateOutPlanned" name="dateOutPlanned" class="required" />
                        </div>
                        <div class="col-md-4 text-center">
                            <label for="maintenanceatKAMEO">Entretien à l'atelier ?</label>
                            <input type="checkbox" name="maintenanceatKAMEO">
                        <div>
                            <label for="address">Adresse : </label>
                            <input type="text" name="address">
                        </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <label for="clientWarned">Client prévenu ?</label>
                            <input type="checkbox" name="clientWarned">
                        </div>
                    </div>
                    <h4 class="text-primary">Informations pour client</h4>
                    <div class="col-md-12">
                        <label for="comment">Description</label>
                        <textarea class="form-control" rows="5" name="comment" style="border: 1px solid; border-color:grey"></textarea>
                    </div>
                    <h4 class="text-primary">Informations confidentielles</h4>
                    <div class="col-md-12">
                        <label for="internalComment">Description</label>
                        <textarea class="form-control" rows="5" name="internalComment" style="border: 1px solid; border-color:grey"></textarea>
                    </div>
                    <button class="btn btn-b" type="button" id="sendButtonAddEntretien">Envoyer</button>
                </div>
            </div>
            <div class="modal-footer">
                <button data-bs-dismiss="modal" class="btn btn-b" type="button">Fermer</button>
            </div>
        </div>
    </div>
</div>

<script src="../resources/views/dashboard/modals/entretiens/addEntretien/addEntretien.js"></script>

<script type="text/javascript">

</script>
