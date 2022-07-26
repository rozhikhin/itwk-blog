
    <div id="confirm-delete" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger">{{ __('blog.confirm-delete-title') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ __('blog.confirm-delete-text') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-ok" data-dismiss="modal">{{ __('blog.destroy') }}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('blog.cancel') }}</button>
                </div>
            </div>
        </div>
    </div>

