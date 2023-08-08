<div class="modal" id="modaldemo8_delete{{ $doctor->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <form method="POST" action="{{ route('doctors.destroy', $doctor) }}">
                @method('DELETE')
                @csrf
                <input type="hidden" name="delete_single_item" value="1">
                <input type="hidden" name="id" value="{{ $doctor->id }}">
                <input type="hidden" name="profile_image" value="{{ $doctor->image->file_url }}">
                <div class="modal-header">
                    <h6 class="modal-title">
                        {{ __('DeleteDoctorForm.Title') }}: {{ $doctor->translate(App::getLocale())->name }}
                    </h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('DeleteDoctorForm.Warning Message') }}</p>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-danger" type="submit">{{ __('dashboard.buttons.Delete') }}</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal"
                            type="button">{{ __('DeleteDoctorForm.Cancel') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
