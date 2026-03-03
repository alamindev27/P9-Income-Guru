<script src="{{ asset('backend/assets') }}/libs/jquery/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script src="{{ asset('backend/assets') }}/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="{{ asset('backend/assets') }}/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="{{ asset('backend/dist') }}/js/app.min.js"></script>
<script src="{{ asset('backend/dist') }}/js/app.init.js"></script>
<script src="{{ asset('backend/dist') }}/js/app-style-switcher.js"></script>
<script src="{{ asset('backend/assets') }}/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="{{ asset('backend/assets') }}/extra-libs/sparkline/sparkline.js"></script>
<script src="{{ asset('backend/dist') }}/js/waves.js"></script>
<script src="{{ asset('backend/dist') }}/js/sidebarmenu.js"></script>
<script src="{{ asset('backend/dist') }}/js/custom.min.js"></script>
<script src="{{ asset('backend/assets') }}/libs/chartist/dist/chartist.min.js"></script>
<script src="{{ asset('backend/assets') }}/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<script src="{{ asset('backend/assets') }}/extra-libs/c3/d3.min.js"></script>
<script src="{{ asset('backend/assets') }}/extra-libs/c3/c3.min.js"></script>
<script src="{{ asset('backend/assets') }}/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
<script src="{{ asset('backend/assets') }}/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
<script src="{{ asset('backend/dist') }}/js/pages/dashboards/dashboard1.js"></script>

<script>
toastr.options = {
    "positionClass": "toast-top-right",
    "timeOut": "3000",
    "extendedTimeOut": "0",
    "closeButton": false,
    "progressBar": false,
    "newestOnTop": true,
    "showDuration": "0",
    "hideDuration": "0",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};
</script>

@stack('scripts')
