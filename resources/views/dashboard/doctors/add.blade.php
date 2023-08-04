<div class="modal" id="scrollmodal" style="display: none;" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content modal-content-demo">
            <form method="POST" action="{{ route('doctors.store') }}" enctype="multipart/form-data">
                <div class="modal-header">
                    <h6 class="modal-title">{{ __('dashboard.sidebar.Add Doctor') }}</h6>
                    <button aria-label="Close"
                            class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                </div>
                @csrf
                <div class="modal-body px-4">

                    <h6 class="modal-title">{{ __('AddDoctorForm.Enter Doctor\'s Information') }}</h6>

                    <div class="form-group">
                        <div class="row mt-2">
                            <div class="col-lg-6">
                                <label for="name_en"
                                       class="font-weight-bold">{{ __('AddDoctorForm.Name in English') }}</label>
                                <input type="text" class="form-control" id="name_en" name="name_en"
                                       placeholder="{{ __('AddDoctorForm.Enter doctor name in English') }}">
                            </div>
                            <div class="col-lg-6">
                                <label for="name_ar"
                                       class="font-weight-bold">{{ __('AddDoctorForm.Name in Arabic') }}</label>
                                <input type="text" class="form-control" id="name_ar" name="name_ar"
                                       placeholder="{{ __('AddDoctorForm.Enter doctor name in Arabic') }}">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-6">
                                <label for="email"
                                       class="font-weight-bold">{{ __('AddDoctorForm.Email') }}</label>
                                <input type="email" class="form-control" id="email" name="email"
                                       placeholder="{{ __('AddDoctorForm.Enter doctor email') }}">
                            </div>

                            <div class="col-lg-6">
                                <label for="password"
                                       class="font-weight-bold">{{ __('AddDoctorForm.Password') }}</label>
                                <input type="password" class="form-control" id="password"
                                       name="password"
                                       placeholder="{{ __('AddDoctorForm.Enter doctor password') }}">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-6">
                                <label for="phone"
                                       class="font-weight-bold">{{ __('AddDoctorForm.Phone') }}</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                       placeholder="{{ __('AddDoctorForm.Enter doctor phone number') }}">
                            </div>

                            <div class="col-lg-6">
                                <label for="price"
                                       class="font-weight-bold">{{ __('AddDoctorForm.Visit Price') }}</label>
                                <input type="text" class="form-control" id="price" name="price"
                                       placeholder="{{ __('AddDoctorForm.Enter doctor visit price') }}">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-6 ">
                                <label for="section"
                                       class="font-weight-bold">{{ __('AddDoctorForm.Section') }}</label>
                                <select id="section" name="section_id" class="form-control">
                                    <option value="" selected
                                            disabled>{{ __('AddDoctorForm.Select section') }}...
                                    </option>
                                    @foreach($sections as $section)
                                        <option
                                            value="{{ $section->id }}">{{ $section->translate(App::getLocale())->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="schedule" style="display: block;"
                                       class="font-weight-bold">{{ __('AddDoctorForm.Schedule') }}</label>
                                <select id="schedule" multiple name="schedule[]" class="form-control testselect2"
                                        style="width: 100%">
                                    <option value="0">{{ __('AddDoctorForm.Sunday') }}</option>
                                    <option value="1">{{ __('AddDoctorForm.Monday') }}</option>
                                    <option value="2">{{ __('AddDoctorForm.Tuesday') }}</option>
                                    <option value="3">{{ __('AddDoctorForm.Wednesday') }}</option>
                                    <option value="4">{{ __('AddDoctorForm.Thursday') }}</option>
                                    <option value="5">{{ __('AddDoctorForm.Friday') }}</option>
                                    <option value="6">{{ __('AddDoctorForm.Saturday') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-sm-12 col-md-4 mg-t-10 mg-sm-t-0 form-group">
                                <input type="file" name="profile_image" class="dropify" accept="image/*" style="z-index: 5 !important;"
                                       data-default-file="{{URL::asset('assets/dashboard/img/photos/1.jpg')}}"
                                       data-height="200"/>
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
