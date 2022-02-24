<div class="modal fade" id="addBikeClient-modal" tabindex="-1" role="modal" aria-labelledby="modal-label-3" aria-hidden="true">
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
                            <img id="imgBike" style="width: 200px; height: 200px; margin-bottom: 10px; object-fit: contain;" alt="">
                        </div>
                        <div class="input-group">
                            <input id="price" name="price" type="text" class="form-control">
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
                    <select class="form-control" name="type" id="type">
                        
                    </select>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                    <label for="company" class="form-label">Société</label>
                    <select class="form-control" name="company" id="company">

                    </select>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                    <label for="employe" class="form-label">Employé</label>
                    <select class="form-control" name="employe" id="employe">

                    </select>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                    <label for="email" class="form-label">Email</label>
                    <input class="form-control" id="email" name="email" type="text" readonly>
                </div>
            </div>
            <div class="separator separator-small"></div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                    <label for="sellingDate" class="form-label">Date de la commande</label>
                    <input class="form-control" id="sellingDate" name="sellingDate" type="date">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                    <label for="estimatedDeliveryDate" class="form-label">Estimation de livraison</label>
                    <input class="form-control" id="estimatedDeliveryDate" name="estimatedDeliveryDate" type="date">
                </div>
            </div>
            <br>
            <div class="modal-footer">
                <button id="add-bikeClient-action-btn" class="btn btn-b" type="button">Ajouter</button>
                <button data-bs-dismiss="modal" class="btn btn-b" type="button">Fermer</button>
            </div>
        </div>
    </div>
</div>

<script src="../resources/views/dashboard/modals/bikesClients/addBike/addBike.js"></script>