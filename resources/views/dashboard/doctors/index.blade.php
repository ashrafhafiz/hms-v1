@extends('dashboard.layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/dashboard/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/dashboard/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/dashboard/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/dashboard/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/dashboard/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal Sumoselect css-->
    @if (App::getLocale() == 'ar')
    <link rel="stylesheet" href="{{URL::asset('assets/dashboard/plugins/sumoselect/sumoselect-rtl.css')}}">
    @else
    <link href="{{ URL::asset('assets/dashboard/plugins/sumoselect/sumoselect.css') }}" rel="stylesheet">
    @endif
    <!---Internal Owl Carousel css-->
    <link href="{{ URL::asset('assets/dashboard/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <!---Internal  Multislider css-->
    <link href="{{ URL::asset('assets/dashboard/plugins/multislider/multislider.css') }}" rel="stylesheet">
    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/dashboard/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/dashboard/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/dashboard/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
    <!--Internal  Font Awesome -->
    <link href="{{ URL::asset('assets/dashboard/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/dashboard/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
    <!--Internal  treeview -->
    <link href="{{ URL::asset('assets/dashboard/plugins/treeview/treeview.css') }}" rel="stylesheet" type="text/css" />
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{ URL::asset('assets/dashboard/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css') }}"
          rel="stylesheet">
    <link href="{{ URL::asset('assets/dashboard/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css') }}"
          rel="stylesheet">
    <link href="{{ URL::asset('assets/dashboard/plugins/pickerjs/picker.min.css') }}" rel="stylesheet">
    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{ URL::asset('assets/dashboard/plugins/spectrum-colorpicker/spectrum.css') }}" rel="stylesheet">

    <!---Internal Fileupload css-->
    <link href="{{URL::asset('assets/dashboard/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <!---Internal Fancy uploader css-->
    <link href="{{URL::asset('assets/dashboard/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="my-auto mb-0 content-title">{{ __('dashboard.Display Doctors\' Information') }}{{ config('app.languages')[App::getLocale()] }}</h4>
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
                        <a class="modal-effect btn ripple btn-primary" data-effect="effect-scale" data-toggle="modal"
                            href="#scrollmodal">{{ __('dashboard.sidebar.Add Doctor') }}</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-3p border-bottom-0">{{ __('dashboard.tables.#') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('dashboard.tables.Name') }}</th>
                                    <th class="wd-10p border-bottom-0">{{ __('dashboard.tables.Image') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('dashboard.tables.Section') }}</th>
                                    <th class="wd-10p border-bottom-0">{{ __('dashboard.tables.Phone') }}</th>
                                    <th class="wd-5p border-bottom-0">{{ __('dashboard.tables.Price') }}</th>
                                    <th class="wd-10p border-bottom-0">{{ __('dashboard.tables.Status') }}</th>
                                    <th class="wd-10p border-bottom-0">{{ __('dashboard.tables.Created At') }}</th>
                                    <th class="wd-10p border-bottom-0">{{ __('dashboard.tables.Modified At') }}</th>
                                    <th class="wd-10p border-bottom-0">{{ __('dashboard.tables.Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($doctors as $doctor)
                                    <tr>
                                        <td>{{ $doctor->id }}</td>
                                        <td>{{ $doctor->name }}</td>
                                        <td><img src="{{ $doctor->image->file_url }}" alt="{{ $doctor->name }}"
                                                width="64" height="48"></td>
                                        <td>{{ $doctor->section->translate(App::getLocale())->name }}</td>
                                        <td>{{ $doctor->phone }}</td>
                                        <td>{{ $doctor->price }}</td>
                                        <td>
                                            <div class="dot-label bg-{{ $doctor->status ? 'success' : 'danger' }}">
                                            </div>
                                            <div class="ml-3">
                                                {{ $doctor->status ? __('dashboard.tables.Available') : __('dashboard.tables.Not available') }}
                                            </div>

                                        </td>
                                        <td>{{ $doctor->created_at->diffForHumans() }}</td>
                                        <td>{{ $doctor->updated_at->diffForHumans() }}</td>
                                        <td>
                                            <div class="row">
                                                <a class="ml-2 modal-effect btn ripple btn-primary btn-icon"
                                                    data-effect="effect-scale" data-toggle="modal"
                                                    data-target="#edit{{ $doctor->id }}"
                                                    href="#edit{{ $doctor->id }}">
                                                    <i class="typcn typcn-edit"></i>
                                                </a>
                                                <a class="ml-2 modal-effect btn btn-danger btn-icon"
                                                    data-effect="effect-scale" data-toggle="modal"
                                                    data-target="#modaldemo8_delete{{ $doctor->id }}"
                                                    href="#modaldemo8_delete{{ $doctor->id }}">
                                                    <i class="typcn typcn-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('dashboard.doctors.edit')
                                    @include('dashboard.doctors.delete')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>
    <!-- row closed -->

    @include('dashboard.doctors.add')
    <!-- modal closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/dashboard/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/dashboard/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
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
    <!--- Tabs JS-->
    <script src="{{ URL::asset('assets/dashboard/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/js/tabs.js') }}"></script>
    <!--Internal  Clipboard js-->
    <script src="{{ URL::asset('assets/dashboard/plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/clipboard/clipboard.js') }}"></script>
    <!-- Internal Prism js-->
    <script src="{{ URL::asset('assets/dashboard/plugins/prism/prism.js') }}"></script>
    <!-- Internal Treeview js -->
    <script src="{{ URL::asset('assets/dashboard/plugins/treeview/treeview.js') }}"></script>
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('assets/dashboard/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/notify/js/notifit-custom.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/dashboard/js/table-data.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/dashboard/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/dashboard/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/dashboard/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{ URL::asset('assets/dashboard/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{ URL::asset('assets/dashboard/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}">
    </script>
    <!-- Ionicons js -->
    <script src="{{ URL::asset('assets/dashboard/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}">
    </script>
    <!--Internal  pickerjs js -->
    <script src="{{ URL::asset('assets/dashboard/plugins/pickerjs/picker.min.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/dashboard/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/dashboard/plugins/sumoselect/custom-jquery.sumoselect.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/dashboard/js/form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/js/advanced-form-elements.js') }}"></script>

@endsection
