</div>
</div>
</div>
<!-- Vendor js -->
<script src="{{url('/')}}/assets/js/vendor.min.js"></script>

<!-- Daterangepicker js -->
<script src="{{url('/')}}/assets/vendor/daterangepicker/moment.min.js"></script>
<script src="{{url('/')}}/assets/vendor/daterangepicker/daterangepicker.js"></script>

<!-- Apex Charts js -->
{{-- <script src="{{url('/')}}/assets/vendor/apexcharts/apexcharts.min.js"></script> --}}

<!-- Vector Map js -->
<script src="{{url('/')}}/assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{url('/')}}/assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>

<!-- Dashboard App js -->
{{-- <script src="{{url('/')}}/assets/js/pages/dashboard.js"></script> --}}


<!-- App js -->
<script src="{{url('/')}}/assets/js/app.min.js"></script>
<!-- Datatables js -->
<script src="{{url('/')}}/assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{url('/')}}/assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="{{url('/')}}/assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{url('/')}}/assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="{{url('/')}}/assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js"></script>
<script src="{{url('/')}}/assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="{{url('/')}}/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{url('/')}}/assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="{{url('/')}}/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{url('/')}}/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{url('/')}}/assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{url('/')}}/assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="{{url('/')}}/assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.17.2/ckeditor.js"></script>

<!-- Datatable Demo Aapp js -->
<script src="{{url('/')}}/assets/js/pages/datatable.init.js"></script>
<script src="{{url('/')}}/assets1/sweetalert/sweetalert.min.js"></script>
@yield('script')

<script>
    $(document).ready(function() {
        var url = document.location.toString();
        if (url.match('#')) {
            $('.nav-pills a[href="#' + url.split('#')[1] + '"]').tab('show');
        }
        // Change hash for page-reload
        $('.nav-pills a').on('shown.bs.tab', function (e) {
            window.location.hash = e.target.hash;
        })
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excelFlash', 'excel', 'pdf', 'print', {
                    text: 'Reload',
                    action: function(e, dt, node, config) {
                        dt.ajax.reload();
                    }
                }
            ]
        });
        $('.example1').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        // Function to toggle the sidebar and content classes
        function toggleSidebar() {
            $("#sidebar").toggleClass("side_normal side_small");
            $("#content").toggleClass("content_normal content_big");
        }
        // Toggle sidebar on button click
        $("#menu-btn").click(function() {
            toggleSidebar();
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        //jquery for toggle sub menus
        $('.sub-btn').click(function() {
            $(this).next('.sub-menu').slideToggle();
            $(this).find('.dropdown').toggleClass('rotate');
        });
        //jquery for expand and collapse the sidebar
        $('.menu-btn').click(function() {
            $('.side-bar').addClass('active');
            $('.menu-btn').css("visibility", "hidden");
        });
        $('.close-btn').click(function() {
            $('.side-bar').removeClass('active');
            $('.menu-btn').css("visibility", "visible");
        });
    });
</script>
</body>
</html>
