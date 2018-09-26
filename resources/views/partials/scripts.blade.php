<!--   Core JS Files   -->
<script src="{{{ URL::asset('js/core/jquery.min.js') }}}"></script>
<script src="{{{ URL::asset('js/core/popper.min.js') }}}"></script>
<script src="{{{ URL::asset('js/bootstrap-material-design.js') }}}"></script>
<script src="{{{ URL::asset('js/plugins/perfect-scrollbar.jquery.min.js') }}}"></script>

<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="{{{ URL::asset('js/plugins/chartist.min.js') }}}"></script>

<!-- Library for adding dinamically elements -->
<script src="{{{ URL::asset('js/plugins/arrive.min.js') }}}" type="text/javascript"></script>

<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="{{{ URL::asset('js/plugins/bootstrap-notify.js') }}}"></script>

<!-- Material Dashboard Core initialisations of plugins and Bootstrap Material Design Library -->
<script src="{{{ URL::asset('js/material-dashboard.js') }}}"></script>

<!-- demo init -->
<script src="{{{ URL::asset('js/plugins/demo.js') }}}"></script>

<!-- JsPdf Generar PDF -->

<script src="{{{ URL::asset('js/core/jspdf.min.js') }}}" type="text/javascript"></script>

<script src="{{{ URL::asset('js/core/html2pdf.js') }}}" type="text/javascript"></script>

<!-- Datatables -->
<script src="{{{ URL::asset('js/jquery.dataTables.min.js') }}}"></script>

<script src="{{{ URL::asset('js/plugins/dataTables/dataTables.buttons.min.js') }}}"></script>
<script src="{{{ URL::asset('js/plugins/dataTables/buttons.flash.min.js') }}}"></script>
<script src="{{{ URL::asset('js/plugins/dataTables/jszip.min.js') }}}"></script>
<script src="{{{ URL::asset('js/plugins/dataTables/pdfmake.min.js') }}}"></script>
<script src="{{{ URL::asset('js/plugins/dataTables/vfs_fonts.js') }}}"></script>
<script src="{{{ URL::asset('js/plugins/dataTables/buttons.html5.min.js') }}}"></script>
<script src="{{{ URL::asset('js/plugins/dataTables/buttons.print.min.js') }}}"></script>

<!-- Archivo de funciones JS -->
<script src="{{{ URL::asset('js/app/custom.js') }}}"></script>
<script src="{{{ URL::asset('js/app/edifice.js') }}}"></script>
<script src="{{{ URL::asset('js/app/place.js') }}}"></script>
<script src="{{{ URL::asset('js/app/role.js') }}}"></script>
<script src="{{{ URL::asset('js/app/user.js') }}}"></script>
<script src="{{{ URL::asset('js/app/visitor.js') }}}"></script>

<script type="text/javascript">
    $(document).ready(function() {

        demo.initDashboardPageCharts();

        demo.initCharts();

    });
</script>



