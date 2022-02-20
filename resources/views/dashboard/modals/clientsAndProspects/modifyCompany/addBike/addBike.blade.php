<div class="modal fade" id="add-bikeCompany-modal" tabindex="-1" role="modal" aria-labelledby="modal-label-3" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ajouter un vélo</h4>
                <button aria-hidden="true" data-bs-dismiss="modal" class="btn-close float-right" style="font-size:2em" type="button">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div style="margin: 25px auto 25px auto;" class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                        <div style="text-align: center">
                            <img style="width: 200px; height: 200px; margin-bottom: 10px;" src="" alt="">
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control">
                            <span class="input-group-text">€</span>
                        </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                        <label for="brand" class="form-label">Maqrue</label>
                        <select class="form-control" name="brand" id="brand">

                        </select>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                        <label for="model" class="form-label">Modèle</label>
                        <select class="form-control" name="model" id="model">
                            
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                        <label for="size" class="form-label">Taille</label>
                        <select class="form-control" name="size" id="size">
                            
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                        <label for="color" class="form-label">Couleur</label>
                        <input class="form-control" id="color" name="color" type="text">
                    </div>
                </div>
            </div>
            <div class="separator separator-small"></div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                    <label for="type" class="form-label">Type</label>
                    <input class="form-control" id="type" name="color" type="type">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                    <label for="company" class="form-label">Société</label>
                    <input class="form-control" id="company" name="company" type="text">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                    <label for="employee" class="form-label">Employé</label>
                    <input class="form-control" id="employee" name="employee" type="text">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                    <label for="email" class="form-label">Email</label>
                    <input class="form-control" id="email" name="email" type="text" readonly>
                </div>
            </div>
            <br>
            <div class="modal-footer">
                <button id="add-bikeCompany-action-btn" class="btn btn-b" type="button">Ajouter</button>
                <button data-bs-dismiss="modal" class="btn btn-b" type="button">Fermer</button>
            </div>
        </div>
    </div>
</div>

<script src="../resources/views/dashboard/modals/clientsAndProspects/modifyCompany/addBike/addBike.js"></script>