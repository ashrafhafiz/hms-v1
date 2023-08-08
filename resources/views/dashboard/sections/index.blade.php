@extends('dashboard.layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/dashboard/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/dashboard/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/dashboard/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/dashboard/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/dashboard/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Owl Carousel css-->
    <link href="{{ URL::asset('assets/dashboard/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <!---Internal  Multislider css-->
    <link href="{{ URL::asset('assets/dashboard/plugins/multislider/multislider.css') }}" rel="stylesheet">
    <!--- Select2 css -->
    <link href="{{ URL::asset('assets/dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
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
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="my-auto mb-0 content-title">Pages</h4><span class="mt-1 mb-0 mr-2 text-muted tx-13">/
                    Empty</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="ml-2 btn btn-info btn-icon"><i class="mdi mdi-filter-variant"></i></button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="ml-2 btn btn-danger btn-icon"><i class="mdi mdi-star"></i></button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="ml-2 btn btn-warning btn-icon"><i class="mdi mdi-refresh"></i></button>
            </div>
            <div class="mb-3 mb-xl-0">
                <div class="btn-group dropdown">
                    <button type="button" class="btn btn-primary">14 Aug 2019</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                        id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate"
                        data-x-placement="bottom-end">
                        <a class="dropdown-item" href="#">2015</a>
                        <a class="dropdown-item" href="#">2016</a>
                        <a class="dropdown-item" href="#">2017</a>
                        <a class="dropdown-item" href="#">2018</a>
                    </div>
                </div>
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
                            href="#modaldemo8">{{ __('dashboard.sidebar.Add Section') }}</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-5p border-bottom-0">{{ __('dashboard.tables.#') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('dashboard.tables.Name') }}
                                        ({{ App::getLocale() }})</th>
                                    <th class="wd-20p border-bottom-0">{{ __('dashboard.tables.Description') }}
                                        ({{ App::getLocale() }})</th>
                                    <th class="wd-15p border-bottom-0">{{ __('dashboard.tables.Created At') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('dashboard.tables.Modified At') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('dashboard.tables.Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sections as $section)
                                    <tr>
                                        <td>{{ $section->id }}</td>
                                        <td><a href="">{{ $section->name }}</a></td>
                                        <td>{{ Str::limit($section->description, 100) }}</td>
                                        <td>{{ $section->created_at->diffForHumans() }}</td>
                                        <td>{{ $section->updated_at->diffForHumans() }}</td>
                                        <td>
                                            <div class="row">
                                                <a class="ml-2 modal-effect btn ripple btn-primary btn-icon"
                                                    data-effect="effect-scale" data-toggle="modal"
                                                    data-target="#edit{{ $section->id }}"
                                                    href="#edit{{ $section->id }}">
                                                    <i class="typcn typcn-edit"></i>
                                                </a>
                                                <a class="ml-2 modal-effect btn btn-danger btn-icon"
                                                    data-effect="effect-scale" data-toggle="modal"
                                                    data-target="#modaldemo8_delete{{ $section->id }}"
                                                    href="#modaldemo8_delete{{ $section->id }}">
                                                    <i class="typcn typcn-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('dashboard.sections.edit')
                                    @include('dashboard.sections.delete')
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

    @include('dashboard.sections.add')
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
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/dashboard/plugins/select2/js/select2.min.js') }}"></script>
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
@endsection
