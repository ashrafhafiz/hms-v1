<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
<!-- JQuery min js -->
<script src="{{ URL::asset('assets/dashboard/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap Bundle js -->
<script src="{{ URL::asset('assets/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Ionicons js -->
<script src="{{ URL::asset('assets/dashboard/plugins/ionicons/ionicons.js') }}"></script>
<!-- Moment js -->
<script src="{{ URL::asset('assets/dashboard/plugins/moment/moment.js') }}"></script>

<!-- Rating js-->
<script src="{{ URL::asset('assets/dashboard/plugins/rating/jquery.rating-stars.js') }}"></script>
<script src="{{ URL::asset('assets/dashboard/plugins/rating/jquery.barrating.js') }}"></script>

<!--Internal  Perfect-scrollbar js -->
<script src="{{ URL::asset('assets/dashboard/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ URL::asset('assets/dashboard/plugins/perfect-scrollbar/p-scroll.js') }}"></script>
<!--Internal Sparkline js -->
<script src="{{ URL::asset('assets/dashboard/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
<!-- Custom Scroll bar Js-->
<script src="{{ URL::asset('assets/dashboard/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<!-- right-sidebar js -->
@if (App::getLocale() == 'ar')
    <script src="{{ URL::asset('assets/dashboard/plugins/sidebar/sidebar-rtl.js') }}"></script>
@else
    <script src="{{ URL::asset('assets/dashboard/plugins/sidebar/sidebar.js') }}"></script>
@endif
<script src="{{ URL::asset('assets/dashboard/plugins/sidebar/sidebar-custom.js') }}"></script>
<!-- Eva-icons js -->
<script src="{{ URL::asset('assets/dashboard/js/eva-icons.min.js') }}"></script>
@yield('js')
<!-- Sticky js -->
<script src="{{ URL::asset('assets/dashboard/js/sticky.js') }}"></script>
<!-- custom js -->
<script src="{{ URL::asset('assets/dashboard/js/custom.js') }}"></script><!-- Left-menu js-->
<script src="{{ URL::asset('assets/dashboard/plugins/side-menu/sidemenu.js') }}"></script>
