<div class="modal" id="edit{{ $doctor->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content modal-content-demo">
            <form method="POST" action="{{ route('doctors.update', $doctor->id) }}" enctype="multipart/form-data">
                <div class="modal-header">
                    <h6 class="modal-title">{{ __('EditDoctorForm.Edit Doctor') }}</h6>
                    <button aria-label="Close"
                            class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                </div>
                @method('PUT')
                @csrf
                <div class="modal-body px-4">

                    <h6 class="modal-title">{{ __('EditDoctorForm.Update Doctor\'s Information') }}</h6>

                    <div class="form-group">
                        <div class="row mt-2">
                            <div class="col-lg-6">
                                <label for="name_en"
                                       class="font-weight-bold">{{ __('EditDoctorForm.Name in English') }}</label>
                                <input type="text" class="form-control" id="name_en{{ $doctor->id }}" name="name_en"
                                       placeholder="{{ __('EditDoctorForm.Enter doctor name in English') }}"
                                       value="{{ $doctor->translate('en')->name }}">
                            </div>
                            <div class="col-lg-6">
                                <label for="name_ar"
                                       class="font-weight-bold">{{ __('EditDoctorForm.Name in Arabic') }}</label>
                                <input type="text" class="form-control" id="name_ar{{ $doctor->id }}" name="name_ar"
                                       placeholder="{{ __('EditDoctorForm.Enter doctor name in Arabic') }}"
                                       value="{{ $doctor->translate('ar')->name }}">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-6">
                                <label for="email"
                                       class="font-weight-bold">{{ __('EditDoctorForm.Email') }}</label>
                                <input type="email" class="form-control" id="email{{ $doctor->id }}" name="email"
                                       placeholder="{{ __('EditDoctorForm.Enter doctor email') }}"
                                       value="{{ $doctor->email }}">
                            </div>

                            <div class="col-lg-6">
                                <label for="password"
                                       class="font-weight-bold">{{ __('EditDoctorForm.Password') }}</label>
                                <input type="password" class="form-control" id="password{{ $doctor->id }}"
                                       name="password"
                                       placeholder="{{ __('EditDoctorForm.Enter new password') }}">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-6">
                                <label for="phone"
                                       class="font-weight-bold">{{ __('EditDoctorForm.Phone') }}</label>
                                <input type="text" class="form-control" id="phone{{ $doctor->id }}" name="phone"
                                       placeholder="{{ __('EditDoctorForm.Enter doctor phone number') }}"
                                       value="{{ $doctor->phone }}">
                            </div>

                            <div class="col-lg-6">
                                <label for="price"
                                       class="font-weight-bold">{{ __('EditDoctorForm.Visit Price') }}</label>
                                <input type="text" class="form-control" id="price{{ $doctor->id }}" name="price"
                                       placeholder="{{ __('EditDoctorForm.Enter doctor visit price') }}"
                                       value="{{ $doctor->price }}">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-6 ">
                                <label for="section{{ $doctor->id }}"
                                       class="font-weight-bold">{{ __('EditDoctorForm.Section') }}</label>
                                <select id="section{{ $doctor->id }}" name="section_id" class="form-control">
                                    <option value="" selected
                                            disabled>{{ __('EditDoctorForm.Select section') }}...
                                    </option>
                                    @foreach($sections as $section)
                                        <option
                                            value="{{ $section->id }}"
                                            @if($doctor->section_id == $section->id) selected @endif
                                        >{{ $section->translate(App::getLocale())->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="schedule{{ $doctor->id }}" style="display: block;"
                                       class="font-weight-bold">{{ __('EditDoctorForm.Schedule') }}</label>
                                <select id="schedule{{ $doctor->id }}" multiple name="schedule[]"
                                        class="form-control testselect2"
                                        style="width: 100%">

                                    @foreach($working_days as $working_day)
                                        <option value="{{ $working_day->id }}"
                                                @if(in_array($working_day->id, $doctor->working_days->pluck('id')->toArray())) selected @endif>
                                            {{ $working_day->translate(App::getLocale())->working_day_name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-sm-12 col-md-4 mg-t-10 mg-sm-t-0 form-group">
                                <input type="file" name="profile_image" class="dropify" accept="image/*"
                                       style="z-index: 5 !important;"
                                       data-default-file="{{URL::asset('assets/uploads/doctors/'.$doctor->image->file_url)}}"
                                       data-height="200">
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
