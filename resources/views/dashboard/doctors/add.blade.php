@extends('dashboard.layouts.master')
@section('css')
    <!--Internal Select2 & Sumoselect css-->
    <link href="{{ URL::asset('assets/dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    @if (App::getLocale() == 'ar')
        <link rel="stylesheet" href="{{URL::asset('assets/dashboard/plugins/sumoselect/sumoselect-rtl.css')}}">
    @else
        <link href="{{ URL::asset('assets/dashboard/plugins/sumoselect/sumoselect.css') }}" rel="stylesheet">
    @endif
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/dashboard/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/dashboard/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}"
          rel="stylesheet">
    <!--Internal  Font Awesome -->
    <link href="{{ URL::asset('assets/dashboard/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet"/>
    <!---Internal Fileupload css-->
    <link href="{{URL::asset('assets/dashboard/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet"
          type="text/css"/>
    <!---Internal Fancy uploader css-->
    <link href="{{URL::asset('assets/dashboard/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet"/>

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="my-auto mb-0 content-title">{{ __('dashboard.sidebar.Add Doctor') }}</h4>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('dashboard.alerts')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="pb-0 card-header">
                    <div class="col-sm-6 col-md-4 col-xl-3">
                        <h6 class="modal-title">{{ __('AddDoctorForm.Enter Doctor\'s Information') }}</h6>
                    </div>
                </div>
                <div class="card-body">

                                <form method="POST" action="{{ route('doctors.store') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                            <div class="row mt-2">
                                                <div class="col-lg-4">
                                                    <label for="name_en"
                                                           class="font-weight-bold">{{ __('AddDoctorForm.Name in English') }}</label>
                                                    <input type="text" class="form-control" id="name_en" name="name_en"
                                                           placeholder="{{ __('AddDoctorForm.Enter doctor name in English') }}" autofocus>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label for="name_ar"
                                                           class="font-weight-bold">{{ __('AddDoctorForm.Name in Arabic') }}</label>
                                                    <input type="text" class="form-control" id="name_ar" name="name_ar"
                                                           placeholder="{{ __('AddDoctorForm.Enter doctor name in Arabic') }}">
                                                </div>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col-lg-4">
                                                    <label for="email"
                                                           class="font-weight-bold">{{ __('AddDoctorForm.Email') }}</label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                           placeholder="{{ __('AddDoctorForm.Enter doctor email') }}">
                                                </div>

                                                <div class="col-lg-4">
                                                    <label for="password"
                                                           class="font-weight-bold">{{ __('AddDoctorForm.Password') }}</label>
                                                    <input type="password" class="form-control" id="password"
                                                           name="password"
                                                           placeholder="{{ __('AddDoctorForm.Enter doctor password') }}">
                                                </div>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col-lg-4">
                                                    <label for="phone"
                                                           class="font-weight-bold">{{ __('AddDoctorForm.Phone') }}</label>
                                                    <input type="text" class="form-control" id="phone" name="phone"
                                                           placeholder="{{ __('AddDoctorForm.Enter doctor phone number') }}">
                                                </div>

                                                <div class="col-lg-4">
                                                    <label for="price"
                                                           class="font-weight-bold">{{ __('AddDoctorForm.Visit Price') }}</label>
                                                    <input type="text" class="form-control" id="price" name="price"
                                                           placeholder="{{ __('AddDoctorForm.Enter doctor visit price') }}">
                                                </div>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col-lg-4 ">
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
                                                <div class="col-lg-4">
                                                    <label for="schedule" style="display: block;"
                                                           class="font-weight-bold">{{ __('AddDoctorForm.Schedule') }}</label>
                                                    <select id="schedule" multiple name="schedule[]" class="form-control testselect2"
                                                            style="width: 100%">
                                                        <option value="1">{{ __('WeekDay.Sunday') }}</option>
                                                        <option value="2">{{ __('WeekDay.Monday') }}</option>
                                                        <option value="3">{{ __('WeekDay.Tuesday') }}</option>
                                                        <option value="4">{{ __('WeekDay.Wednesday') }}</option>
                                                        <option value="5">{{ __('WeekDay.Thursday') }}</option>
                                                        <option value="5">{{ __('WeekDay.Friday') }}</option>
                                                        <option value="7">{{ __('WeekDay.Saturday') }}</option>
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

                                    <div class="modal-footer">
                                        <button class="btn ripple btn-primary" type="submit">{{ __('dashboard.buttons.Save') }}</button>
                                        <button class="btn ripple btn-secondary" data-dismiss="modal"
                                                type="button">{{ __('dashboard.buttons.Close') }}</button>
                                    </div>
                                </form>

                </div>
            </div>
        </div>
        <!--/div-->
    </div>
    <!-- row closed -->

    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal Fileuploads js-->
    <script src="{{URL::asset('assets/dashboard/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{URL::asset('assets/dashboard/plugins/fileuploads/js/file-upload.js')}}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{URL::asset('assets/dashboard/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
    <script src="{{URL::asset('assets/dashboard/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
    <script src="{{URL::asset('assets/dashboard/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
    <script src="{{URL::asset('assets/dashboard/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
    <script src="{{URL::asset('assets/dashboard/plugins/fancyuploder/fancy-uploader.js')}}"></script>
    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/dashboard/js/modal.js') }}"></script>
    <!-- Internal Jquery.mCustomScrollbar js-->
    <script src="{{ URL::asset('assets/dashboard/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}">
    </script>
    <!-- Internal Input tags js-->
    <script src="{{ URL::asset('assets/dashboard/plugins/inputtags/inputtags.js') }}"></script>
    <!--Internal  Clipboard js-->
    <script src="{{ URL::asset('assets/dashboard/plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/clipboard/clipboard.js') }}"></script>
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('assets/dashboard/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/notify/js/notifit-custom.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/dashboard/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!-- Ionicons js -->
    <script src="{{ URL::asset('assets/dashboard/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}">
    </script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/dashboard/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/dashboard/plugins/sumoselect/custom-jquery.sumoselect.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/dashboard/js/form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/js/advanced-form-elements.js') }}"></script>

@endsection
