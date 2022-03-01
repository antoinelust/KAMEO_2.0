<div class="modal fade" id="entretiens-modal" tabindex="-1" role="modal" aria-labelledby="modal-label-3" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="modal-label-3" class="modal-title text-primary"></h4>
                <button aria-hidden="true" data-bs-dismiss="modal" class="btn-close float-right" style="font-size:2em" type="button">×</button>
            </div>
            <div class="modal-body">
                <div style="margin-bottom: 10px;">
                    <button id="addEntretien-btn" type="button" class="btn btn-primary btn-sm">Ajouter un Entretien</button>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="col table-responsive">
                            <table style="width: 100%;" id="entretiens-table" class="table responsive">
                                <thead>

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

<script src="{{ asset('js/dashboard/modals/entretiens/entretiens.js') }}"></script>
