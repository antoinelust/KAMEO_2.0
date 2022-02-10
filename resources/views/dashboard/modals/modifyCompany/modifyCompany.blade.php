<div class="modal fade" id="modifyCompany-modal" tabindex="-1" role="modal" aria-labelledby="modal-label-3" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="modal-label-3" class="modal-title"></h4>
                <button aria-hidden="true" data-bs-dismiss="modal" class="btn-close" type="button">×</button>
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
            </div>
            <div class="modal-footer">
                <button id="upload-action-btn" class="btn btn-b" type="button">Sauvegarder</button>
                <button data-bs-dismiss="modal" class="btn btn-b" type="button">Fermer</button>
            </div>
        </div>
    </div>
</div>

<script src="../resources/views/dashboard/modals/modifyCompany/modifyCompany.js"></script>