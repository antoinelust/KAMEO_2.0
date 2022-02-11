<div class="modal fade" id="addClient-modal" tabindex="-1" role="modal" aria-labelledby="modal-label" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <h4 class="text-green">Ajouter un client</h4>
                    <div class="row">
                        <div style="margin-top: 5px; margin-bottom: 5px;" class="col">
                            <label for="audience">Audience</label>
                            <select title="Audience" class="form-control required" id="audience" name="audience">
                                <option value="B2B">Entreprise</option>
                                <option value="B2C" selected>Particulier</option>
                                <option value="INDEPENDANT">Indépendant</option>
                            </select>
                        </div>
                        <div style="margin-top: 5px; margin-bottom: 5px;" class="col">
                            <label for="type">Type</label>
                            <select title="Type" class="form-control required" id="type" name="type">
                                <option value="client" selected>Client</option>
                                <option value="prospect">Prospect</option>
                                <option value="old_prospect">Ancien prospect</option>
                                <option value="old_client">Ancien client</option>
                                <option value="not_interested">Pas intéressé</option>
                            </select>
                        </div>
                        <div style="margin-top: 5px; margin-bottom: 5px;" class="col">
                            <label for="aquisition">Aquisition</label>
                            <select title="Aquisition" class="form-control required" id="aquisition" name="aquisition">
                                <option value="KAMEO" selected>Kameo</option>
                                <option value="SECUREX">Securex</option>
                                <option value="ACERTA">Acerta</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div style="margin-top: 5px; margin-bottom: 5px;" class="col-md-4" style='display:none'>
                            <label for="description">Nom de la société</label>
                            <input type="text" class="form-control required" name="name">
                        </div>
                        <div style="margin-top: 5px; margin-bottom: 5px;" class="col-md-4" style='display:none'>
                            <label for="vat_number">Numéro de TVA</label>
                            <input type="text" class="form-control" name="vat_number">
                        </div>
                        <div class="separator"></div>
                        <h4 class="text-green">Coordonnées de contact</h4>
                        <div style="margin-top: 5px; margin-bottom: 5px;" class="col-md-4">
                            <label for="name">Nom</label>
                            <input type="text" class="form-control required" name="lastname">
                        </div>
                        <div style="margin-top: 5px; margin-bottom: 5px;" class="col-md-4">
                            <label for="firstName">Prénom</label>
                            <input type="text" class="form-control required" name="firstname">
                        </div>
                        <div style="margin-top: 5px; margin-bottom: 5px;" class="col-md-4">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control required" name="email">
                        </div>
                        <div style="margin-top: 5px; margin-bottom: 5px;" class="col-md-4">
                            <label for="phone">Gsm</label>
                            <input type="text" class="form-control required" name="phone">
                        </div>
                        <div style="margin-top: 5px; margin-bottom: 5px;" class="col-md-4" style='display:none'>
                            <label for="function">Fonction</label>
                            <input type="text" class="form-control" name="function">
                        </div>
                        <div class="separator"></div>
                        <h4 class="text-green">Adresse</h4>
                        <div style="margin-top: 5px; margin-bottom: 5px;" class="col-sm-4">
                            <label for="street">Rue</label>
                            <input type="text" class="form-control" name="street">
                        </div>
                        <div style="margin-top: 5px; margin-bottom: 5px;" class="col-sm-4">
                            <label for="zipCode">Code Postal</label>
                            <input type="text" class="form-control" name="zip">
                        </div>
                        <div style="margin-top: 5px; margin-bottom: 5px;" class="col-sm-4">
                            <label for="city">Ville</label>
                            <input type="text" class="form-control" name="city">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="add-client-action" type="button" class="btn btn-b" data-dismiss="modal">Ajouter</button>
                <button data-bs-dismiss="modal" class="btn btn-b" type="button">Fermer</button>
            </div>
        </div>
    </div>
</div>

<script src="../resources/views/dashboard/modals/addClient/addClient.js"></script>
