<div class="modal fade" id="modifyEntretien-modal" tabindex="-1" role="modal" aria-labelledby="modal-label-3"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h4 id="modal-label-4" class="modal-title text-primary">Modifier un entretien</h4>
                <button aria-hidden="true" data-bs-dismiss="modal" class="btn-close float-right" style="font-size:2em"
                    type="button">×</button>
            </div>

            <div class="modal-body">

                        <div class="row">

                            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                <label class="form-label" for="utilisateur">Société</label>
                                <select title="Veuillez sélectionner" class="form-control required form_company"
                                    name="company" data-live-search="true"
                                    style="border: 1px solid; border-color:grey">
                                
                                </select>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                <label class="form-label" for="utilisateur">Vélo</label>
                                <select title="velo" class="form-control required form_velo" name="velo"
                                    style="border: 1px solid; border-color:grey">
                                
                                </select>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                <label class="form-label" for="utilisateur">Status</label>
                                <select title="status" class="form-control required" name="status"
                                    style="border: 1px solid; border-color:grey">
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

                        </div>

                        <br>

                        <div class="row">

                            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                <label class="form-label" for="dateMaintenance">Date d'entretien</label>
                                <input type="date" title="dateMaintenance" name="dateMaintenance" class="required form-control" />
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                <label class="form-label" for="dateOutPlanned">Date de sortie planifié</label>
                                <input type="date" title="dateOutPlanned" name="dateOutPlanned" class="required form-control" />
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 text-center">
                                <label class="form-label" for="maintenanceatKAMEO">Entretien à l'atelier ?</label>
                                <input type="checkbox" name="maintenanceatKAMEO">
                                <div>
                                    <input class="form-control" type="text" name="address" placeholder="Adresse">
                                </div>
                            </div>

                        </div>

                        <br>

                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 text-center">
                                <label for="clientWarned">Client prévenu ?</label>
                                <input type="checkbox" name="clientWarned">
                            </div>
                        </div>

                        <br>

                        <div class="row">

                            <h3 style="text-align: center;" id="modal-label-3" class="modal-title">Informations complémentaires</h3>

                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <textarea placeholder="Informations sur le client..." class="form-control" rows="5" name="comment" style="border: 1px solid; border-color:grey; color: black; resize: none;">
                                </textarea>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <textarea placeholder="Informations confidentiels..." class="form-control" rows="5" name="internalComment" style="border: 1px solid; border-color:grey; color: black; resize: none;">
                                </textarea>
                            </div>

                        </div>

                        <br>

                        <div style="text-align: right;">
                            <button style="text-align: right;" class="btn btn-b" type="button" id="sendButtonModifyEntretien">Envoyer</button>
                        </div>
            </div>


            <div id="entretien-datatable-row" class="row" style="display: none;">
                <div class="separator separator-small"></div>
                <div class="col">
                    <h3 style="text-align: center;" id="modal-label-3" class="modal-title">Liste de contact</h3>
                    <div class="col">
                        <div style="margin-bottom: 10px;">
                            <button id="add-contactEntretien-btn" type="button" class="btn btn-primary btn-sm">Ajouter
                                un contact</button> <!-- ///// -->
                        </div>
                        <table style="width: 100%;" id="companies-contact-table" class="table">
                            <thead>
                                <tr>
                                    <th style="text-align: left" scope="col">Prénom</th>
                                    <th style="text-align: left" scope="col">Nom</th>
                                    <th style="text-align: left" scope="col">Email</th>
                                    <th style="text-align: left" scope="col">Gsm</th>
                                    <th style="text-align: left" scope="col">Fonction</th>
                                    <th style="text-align: left" scope="col">Type</th>
                                    <th style="text-align: right" scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="bike-datatable-row" class="row">
                <div class="separator separator-small"></div>
                <div class="col">
                    <h3 style="text-align: center;" id="modal-label-3" class="modal-title">Liste de vélo</h3>
                    <div class="col">
                        <div style="margin-bottom: 10px;">
                            <button id="add-bikeEntretien-btn" type="button" class="btn btn-primary btn-sm">Ajouter un
                                vélo</button>
                        </div>
                        <table style="width: 100%;" id="companies-bike-table" class="table">
                            <thead>
                                <tr>
                                    <th style="text-align: left" scope="col">Référence</th>
                                    <th style="text-align: left" scope="col">Modèle</th>
                                    <th style="text-align: left" scope="col">Début</th>
                                    <th style="text-align: left" scope="col">Fin</th>
                                    <th style="text-align: right" scope="col"></th>
                                </tr>

                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <div class="modal-footer">
                <button data-bs-dismiss="modal" class="btn btn-b" type="button">Fermer</button>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/dashboard/modals/entretiens/modifyEntretien/modifyEntretien.js') }}"></script>
