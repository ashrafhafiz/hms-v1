<div class="modal" id="change_password{{ $doctor->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content modal-content-demo">
            <form method="POST" action="{{ route('doctor.change-password', $doctor) }}" enctype="multipart/form-data">
                <div class="modal-header">
                    <h6 class="modal-title">{{ __('ChangeDoctorPasswordForm.Update Doctor') }}</h6>
                    <button aria-label="Close"
                            class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                </div>
                @method('PUT')
                @csrf
                <div class="modal-body px-4">

                    <h6 class="modal-title">{{ __('ChangeDoctorPasswordForm.Change Doctor\'s Password') }} : <span class="text-danger">{{$doctor->translate(App::getLocale())->name}}</span></h6>

                    <div class="form-group">

                        <div class="">
                            <input type="hidden" name="id" value="{{ $doctor->id }}">
                            <div class="col-sm-12 mt-2">
                                <label for="password{{ $doctor->id }}"
                                       class="font-weight-bold">{{ __('ChangeDoctorPasswordForm.Password') }}</label>
                                <input type="password" class="form-control" id="password{{ $doctor->id }}"
                                       name="password"
                                       placeholder="{{ __('ChangeDoctorPasswordForm.Enter new password') }}">
                            </div>

                            <div class="col-sm-12 mt-2">
                                <label for="password_confirmation{{ $doctor->id }}"
                                       class="font-weight-bold">{{ __('ChangeDoctorPasswordForm.Confirm password') }}</label>
                                <input type="password" class="form-control" id="password_confirmation{{ $doctor->id }}"
                                       name="password_confirmation"
                                       placeholder="{{ __('ChangeDoctorPasswordForm.Confirm new password') }}">
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
