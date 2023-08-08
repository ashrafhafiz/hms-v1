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
    <!---Internal Spectrum css-->
{{--    <link href="{{ URL::asset('assets/dashboard/plugins/spectrum-colorpicker/spectrum.css') }}" rel="stylesheet">--}}
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
                <h4 class="my-auto mb-0 content-title">{{ __('EditDoctorForm.Edit Doctor') }}</h4>
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
                    <div class="col-12">
                        <h6 class="modal-title">{{ __('EditDoctorForm.Update Doctor\'s Information') }}</h6>
                        <h6 class="modal-title">{{ __('EditDoctorForm.ID') }}: {{ $doctor->id }}</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-sm-12 col-xl-10">
                        <form method="POST" action="{{ route('doctors.update', $doctor) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6 mt-2">
                                    <label for="name_en"
                                           class="font-weight-bold">{{ __('EditDoctorForm.Name in English') }}</label>
                                    <input type="text" class="form-control" id="name_en{{ $doctor->id }}" name="name_en"
                                           placeholder="{{ __('EditDoctorForm.Enter doctor name in English') }}"
                                           value="{{ $doctor->translate('en')->name }}">
                                </div>
                                <div class="col-lg-6 mt-2">
                                    <label for="name_ar"
                                           class="font-weight-bold">{{ __('EditDoctorForm.Name in Arabic') }}</label>
                                    <input type="text" class="form-control" id="name_ar{{ $doctor->id }}" name="name_ar"
                                           placeholder="{{ __('EditDoctorForm.Enter doctor name in Arabic') }}"
                                           value="{{ $doctor->translate('ar')->name }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 mt-2">
                                    <label for="email"
                                           class="font-weight-bold">{{ __('EditDoctorForm.Email') }}</label>
                                    <input type="email" class="form-control" id="email{{ $doctor->id }}" name="email"
                                           placeholder="{{ __('EditDoctorForm.Enter doctor email') }}"
                                           value="{{ $doctor->email }}">
                                </div>

                                <div class="col-lg-6 mt-2">
                                    <label for="password"
                                           class="font-weight-bold">{{ __('EditDoctorForm.Password') }}</label>
                                    <input type="password" class="form-control" id="password{{ $doctor->id }}"
                                           name="password"
                                           placeholder="{{ __('EditDoctorForm.Enter new password') }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 mt-2">
                                    <label for="phone"
                                           class="font-weight-bold">{{ __('EditDoctorForm.Phone') }}</label>
                                    <input type="text" class="form-control" id="phone{{ $doctor->id }}" name="phone"
                                           placeholder="{{ __('EditDoctorForm.Enter doctor phone number') }}"
                                           value="{{ $doctor->phone }}">
                                </div>

                                <div class="col-lg-6 mt-2">
                                    <label for="price"
                                           class="font-weight-bold">{{ __('EditDoctorForm.Visit Price') }}</label>
                                    <input type="text" class="form-control" id="price{{ $doctor->id }}" name="price"
                                           placeholder="{{ __('EditDoctorForm.Enter doctor visit price') }}"
                                           value="{{ $doctor->price }}">
                                </div>
                            </div>

                            <div class="row">
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
                                <div class="col-lg-6 mt-2">
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

                            <div class="row">
                                <div class="col-sm-12 col-md-4 mg-t-10 mg-sm-t-0 form-group">
                                    <input type="file" name="profile_image" class="dropify" accept="image/*"
                                           style="z-index: 5 !important;"
                                           data-default-file="{{URL::asset('assets/uploads/doctors/'.$doctor->image->file_url)}}"
                                           data-height="200">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 mt-2">
                                    <button class="btn ripple btn-primary" type="submit">{{ __('dashboard.buttons.Save') }}</button>
                                    <button class="btn ripple btn-secondary mx-2" data-dismiss="modal"
                                            onclick="window.history.go(-1); return false;"
                                            type="button">{{ __('dashboard.buttons.Cancel') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
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
    <!--Internal Spectrum js-->
{{--    <script src="{{ URL::asset('assets/dashboard/plugins/spectrum-colorpicker/spectrum.js') }}"></script>--}}
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/dashboard/js/form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/js/advanced-form-elements.js') }}"></script>

@endsection
