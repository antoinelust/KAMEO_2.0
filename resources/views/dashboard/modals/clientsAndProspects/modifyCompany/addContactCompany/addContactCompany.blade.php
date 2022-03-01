<div class="modal fade" id="add-contactCompany-modal" tabindex="-1" role="modal" aria-labelledby="modal-label-3" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="add-contactCompany-modal-title" class="modal-title"></h4>
                <button aria-hidden="true" data-bs-dismiss="modal" class="btn-close float-right" style="font-size:2em" type="button">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <input type="text" name="firstname" class="form-control" placeholder="Prénom" aria-label="Prénom">
                    </div>
                    <div class="col">
                        <input type="text" name="lastname" class="form-control" placeholder="Non" aria-label="Non">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <input type="text" name="email" class="form-control" placeholder="Email" aria-label="Email">
                    </div>
                    <div class="col">
                        <input type="text" name="phone" class="form-control" placeholder="Gsm" aria-label="Gsm">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <input type="text" name="function" class="form-control" placeholder="Fonction" aria-label="Fonction">
                    </div>
                    <div class="col">
                        <select class="form-control" name="type" id="type">
                            <option value="contact" selected>contact</option>
                            <option value="billing">billing</option>
                            <option value="ccBilling">ccBilling</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="add-companyContact-action-btn" class="btn btn-b" type="button">Ajouter</button>
                <button data-bs-dismiss="modal" class="btn btn-b" type="button">Fermer</button>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/dashboard/modals/clientsAndProspects/modifyCompany/addContactCompany/addContactCompany.js') }}"></script>