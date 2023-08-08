<div class="modal" id="delete_selected" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <form method="POST" action="{{ route('doctors.destroy', $doctor) }}">
                @method('DELETE')
                @csrf
                <input type="hidden" name="delete_multiple_items" id="delete_selected_ids" value="">

                <div class="modal-header">
                    <h6 class="modal-title">{{ __('DeleteMultipleDoctorForm.Title') }}</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ __('DeleteMultipleDoctorForm.Warning Message') }}</p>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-danger" type="submit">{{ __('Buttons.Delete') }}</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">{{ __('Buttons.Cancel') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
