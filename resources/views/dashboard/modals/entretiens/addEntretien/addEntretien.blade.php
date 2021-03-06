<div class="modal fade" id="addEntretien-modal" tabindex="-1" role="modal" aria-labelledby="modal-label-4"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" style="box-shadow: 1px 1px 1px black;">
        <div class="modal-content">

            <div class="modal-header">
                <h4 id="modal-label-4" class="modal-title text-primary">Ajouter un entretien</h4>
                <button aria-hidden="true" data-bs-dismiss="modal" class="btn-close float-right" style="font-size:2em"
                    type="button">×</button>
            </div>

            <div class="modal-body">
                <div class="row">

                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <label class="form-label" for="utilisateur">Société</label>
                        <select title="Veuillez sélectionner" class="form-control required form_company" name="company"
                            data-live-search="true" style="border: 1px solid; border-color:grey">

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
                            <option disabled selected value style="display :none"></option>
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
                        <label class="form-label" for="dateMaintenance">Date d'entretien</label><br>
                        <input type="date" title="dateMaintenance" name="dateMaintenance"
                            class="form-control required" />
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <label class="form-label" for="dateOutPlanned">Date de sortie planifié</label><br>
                        <input type="date" title="dateOutPlanned" name="dateOutPlanned" class="form-control required" />
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <label class="form-label" for="maintenanceatKAMEO">Entretien à l'atelier ?</label>
                        <input type="checkbox" name="maintenanceatKAMEO">
                        <div>
                            <label class="form-label" for="address">Adresse : </label>
                            <input class="form-control" type="text" name="address">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <label class="form-label" for="clientWarned">Client prévenu ?</label>
                        <input type="checkbox" name="clientWarned">
                    </div>
                </div>

                <div class="separator"></div>
                <div class="row manualWorkload">
                    <div class="col-md-12">
                        <h4 class="text-primary">Main d'oeuvre : </h4>
                    </div>
                    <div class="col-md-12">
                        <i class="fa fa-calculator"></i>
                        <span class="manualWorkloadNumber">0</span>
                        <input type="hidden" name="manualWorkloadNumber" value="0" />
                        <button class="btn btn-primary btn-sm" type="button" style="font-size: 20px"
                            name="btn-plus-manualWork">+</button>
                        <button class="btn btn-danger btn-sm" type="button" style="display: none; font-size: 20px"
                            name="btn-less-manualWork">-</button>
                    </div>
                    <table style="width: 100%" id="entretien-manualWork-table"
                        class="table table-condensed tableFixed manualWork">
                        <thead>
                            <th class="col-md-2">Catégorie</th>
                            <th class="col-md-2">Description</th>
                            <th class="col-md-2">Durée (min)</th>
                            <th class="col-md-2">Total (€ HTVA)</th>
                            <th class="col-md-2">Total (€ TVAC)</th>
                            <th class="col-md-2">Action</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="separator"></div>
                <div class="row maintenanceAccessories">
                    <div class="col-md-12">
                        <h4 class="text-primary">Accessoires catalogue : </h4>
                    </div>
                    <div class="col-md-12 accessoriesButtons">
                        <i class="fa fa-calculator"></i> <span class="accessoriesNumber">0</span>
                        <button class="btn btn-primary btn-sm" type="button" style="font-size: 20px"
                            name="catalog-plus">+</button>
                    </div>
                    <table class="table table-condensed tableFixed accessoriesTable" id="table-catalog">
                        <thead>
                            <th class="accessoriesCategory">
                                <label for="aCategory">Catégorie</label>
                            </th>
                            <th class="accessoriesAccessory">
                                <label for="aAccessory">Accessoire</label>
                            </th>
                            <th class="accessoriesBuyingPrice">
                                <label for="aBuyingPrice">Prix achat</label>
                            </th>
                            <th class="accessoriesPriceHTVA">
                                <label for="aPriceHTVA">Prix Vente HTVA</label>
                            </th>
                            <th class="accessoriesPriceHTVA">
                                <label for="aPriceTVAC">Prix Vente TVAC</label>
                            </th>
                            <th>ID Stock
                            </th>
                            <th>Action</th>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div class="separator"></div>
                <div class="row otherAccessoriesMaintenance">
                    <div class="col-md-12">
                        <h4 class="text-primary">Accessoires autres : </h4>
                    </div>
                    <div class="col-md-12">
                        <i class="fa fa-calculator"></i> <span class="otherAccessoriesNumber">0</span>
                        <button class="btn btn-primary btn-sm" type="button" style="font-size: 20px"
                            name="other-plus">+</button>
                    </div>
                    <table class="table table-condensed tableFixed otherAccessoriesTable" id="table-other"
                        style="width: 100%">
                        <thead>
                            <th class="otherAccessoryDescription" style='width:50%'>
                                <label for="otherAccessoryDescription">Description</label>
                            </th>
                            <th class="otherAccessoryHTVA">
                                <label for="otherAccessoryHTVA">Prix HTVA</label>
                            </th>
                            <th class="otherAccessoryTVAC">
                                <label for="otherAccessoryTVAC">Prix TVAC</label>
                            </th>
                            <th class="otherAccessoryAction">
                                <label for="otherAccessoryAction">Action</label>
                            </th>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div class="separator"></div>
                <h4 class="text-primary">Informations pour client</h4>
                <div class="col-md-12">
                    <label for="comment">Description</label>
                    <textarea class="form-control" rows="5" name="comment"
                        style="border: 1px solid; border-color:grey"></textarea>
                </div>
                <div class="separator"></div>
                <h4 class="text-primary">Informations confidentielles</h4>
                <div class="col-md-12">
                    <label for="internalComment">Description</label>
                    <textarea class="form-control" rows="5" name="internalComment"
                        style="border: 1px solid; border-color:grey"></textarea>
                </div>
                <br>
                <div class="modal-footer">
                    <button class="btn btn-b" type="button" id="sendButtonAddEntretien">Envoyer</button>
                    <button data-bs-dismiss="modal" class="btn btn-b" type="button">Fermer</button>
                </div>
            </div>

        </div>
    </div>
</div>
</div>

<script src="{{ asset('js/dashboard/modals/entretiens/addEntretien/addEntretien.js') }}"></script>
