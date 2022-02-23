<div class="modal fade" id="modifyCompany-modal" tabindex="-1" role="modal" aria-labelledby="modal-label-3" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="modifyCompany-modal-title" class="modal-title"></h4>
                <button aria-hidden="true" data-bs-dismiss="modal" class="btn-close float-right" style="font-size:2em" type="button">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form class="d-flex flex-column align-items-center text-center" method="POST" enctype="multipart/form-data" id="upload-logo-form" action="javascript:void(0)">
                        <img onclick="file.click()" id="logo" name="logo" class="rounded-circle" width="150px" style="width: 150px; height: 150px; margin-bottom: 10px;">
                        <input type="file" id="file" name="file" style="display: none;"/>
                        <button class="btn btn-b" id="upload-logo-btn" onclick="file.click()">Modifier la photo</button>
                    </form>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <input type="text" name="name" class="form-control" placeholder="Nom" aria-label="Nom">
                    </div>
                    <div class="col">
                        <input type="text" name="tva" class="form-control" placeholder="Numéro de tva" aria-label="Numéro de tva">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <input type="text" name="street" class="form-control" placeholder="Rue" aria-label="Rue">
                    </div>
                    <div class="col">
                        <input type="text" name="city" class="form-control" placeholder="Ville" aria-label="Ville">
                    </div>
                    <div class="col">
                        <input type="text" name="zip" class="form-control" placeholder="Code postal" aria-label="Code postal">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <select class="custom-select" id="billing_group">
                        </select>
                    </div>
                    <div class="col">
                        <select class="custom-select" id="type">
                        </select>
                    </div>
                    <div class="col">
                        <select class="custom-select" id="aquisition">
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <select class="custom-select" id="audience">
                        </select>
                    </div>
                    <div class="col">
                        <select class="custom-select" id="status">
                        </select>
                    </div>
                </div>
                <br>
                <div style="text-align: right;">
                    <button id="upload-action-btn" class="btn btn-b" type="button">Sauvegarder</button>
                </div>
            </div>
            <div id="company-datatable-row" class="row" style="display: none;">
                <div class="separator separator-small"></div>
                <div class="col">
                    <h3 style="text-align: center;" id="modal-label-3" class="modal-title">Liste de contact</h3>
                    <div class="col">
                        <div style="margin-bottom: 10px;">
                            <button id="add-contactCompany-btn" type="button" class="btn btn-primary btn-sm">Ajouter un contact</button>
                        </div>
                        <table style="width: 100%;" id="companies-contact-table" class="table">
                            <thead>
<<<<<<< HEAD
                                <tr>
                                    <th style="text-align: left" scope="col">Prénom</th>
                                    <th style="text-align: left" scope="col">Nom</th>
                                    <th style="text-align: left" scope="col">Email</th>
                                    <th style="text-align: left" scope="col">Gsm</th>
                                    <th style="text-align: left" scope="col">Fonction</th>
                                    <th style="text-align: left" scope="col">Type</th>
                                    <th style="text-align: right" scope="col"></th>
                                </tr>
=======

>>>>>>> 266371308b35d26fe3421f5ff3fb290933857b93
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
                            <button id="add-bikeCompany-btn" type="button" class="btn btn-primary btn-sm">Ajouter un vélo</button>
                        </div>
                        <table style="width: 100%;" id="companies-bike-table" class="table">
                            <thead>
<<<<<<< HEAD
                                <tr>
                                    <th style="text-align: left" scope="col">Référence</th>
                                    <th style="text-align: left" scope="col">Modèle</th>
                                    <th style="text-align: left" scope="col">Début</th>
                                    <th style="text-align: left" scope="col">Fin</th>
                                    <th style="text-align: right" scope="col"></th>
                                </tr>
=======
                                
>>>>>>> 266371308b35d26fe3421f5ff3fb290933857b93
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

<script src="../resources/views/dashboard/modals/clientsAndProspects/modifyCompany/modifyCompany.js"></script>