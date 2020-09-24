<form action="" method="post" class="remove-record-model">
    @method('DELETE')
    @csrf
    
    <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="custom-width-modalLabel"></h4>
                </div>
                <div class="modal-body">
                    <h4>Are You Sure You Want to do this ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary waves-effect remove-data-from-delete-form" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light">Proceed</button>
                </div>
            </div>
        </div>
    </div>
</form>
