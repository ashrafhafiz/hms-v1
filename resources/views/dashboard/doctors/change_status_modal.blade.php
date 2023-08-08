<div class="modal" id="change_status{{ $doctor->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content modal-content-demo">
            <form method="POST" action="{{ route('doctor.change-status', $doctor) }}" enctype="multipart/form-data">
                <div class="modal-header">
                    <h6 class="modal-title">{{ __('ChangeDoctorStatusForm.Update Doctor') }}</h6>
                    <button aria-label="Close"
                            class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                </div>
                @method('PUT')
                @csrf
                <div class="modal-body px-4">

                    <h6 class="modal-title">{{ __('ChangeDoctorStatusForm.Change Doctor\'s Status') }} : <span class="text-danger">{{$doctor->translate(App::getLocale())->name}}</span></h6>

                    <div class="form-group">

                        <div class="">
                            <div class="col-sm-12 mt-2">
                                <input type="hidden" name="id" value="{{ $doctor->id }}">
                                <label for="status{{ $doctor->id }}"
                                       class="font-weight-bold">{{ __('ChangeDoctorStatusForm.Status') }}</label>
                                <select class="form-control" id="status{{ $doctor->id }}" name="status">
                                    <option value="" disabled>{{ __('ChangeDoctorStatusForm.Select status') }}</option>
                                    <option value="1" @if($doctor->status == 1) selected @endif>{{ __('ChangeDoctorStatusForm.Active') }}</option>
                                    <option value="0" @if($doctor->status == 0) selected @endif>{{ __('ChangeDoctorStatusForm.Inactive') }}</option>
                                </select>
                            </div>


                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-primary" type="submit">{{ __('dashboard.buttons.Save') }}</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal"
                            type="button">{{ __('dashboard.buttons.Close') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
