<div class="modal" id="modaldemo8_delete{{ $section->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <form method="POST" action="{{ route('sections.destroy', $section) }}">
                @method('DELETE')
                @csrf
                <input type="hidden" name="id" value="{{ $section->id }}">
                <div class="modal-header">
                    <h6 class="modal-title">
                        {{ __('dashboard.sidebar.Delete Section') }}: {{ $section->translate(App::getLocale())->name }}
                    </h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('dashboard.Are you sure') }}</p>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-danger" type="submit">{{ __('dashboard.buttons.Delete') }}</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal"
                        type="button">{{ __('dashboard.buttons.Cancel') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
