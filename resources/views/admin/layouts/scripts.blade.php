<!-- REQUIRED SCRIPTS -->
@vite('resources/js/app.js')
<!-- jQuery -->
<script src="{{asset("/admin/plugins/jquery/jquery.min.js")}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset("/admin/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{asset("/admin/dist/js/adminlte.min.js")}}"></script>

<!-- DataTables  & Plugins -->
<script src="{{asset("/admin/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>
<script src="{{asset("/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js")}}"></script>
<script src="{{asset("/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js")}}"></script>
<script src="{{asset("/admin/plugins/jszip/jszip.min.js")}}"></script>
<script src="{{asset("/admin/plugins/pdfmake/pdfmake.min.js")}}"></script>
<script src="{{asset("/admin/plugins/pdfmake/vfs_fonts.js")}}"></script>
<script src="{{asset("/admin/plugins/datatables-buttons/js/buttons.html5.min.js")}}"></script>
<script src="{{asset("/admin/plugins/datatables-buttons/js/buttons.print.min.js")}}"></script>
<script src="{{asset("/admin/plugins/datatables-buttons/js/buttons.colVis.min.js")}}"></script>



{{-- sweetalert --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);

    $("#dataTable").DataTable({
        "responsive": true, 
        "autoWidth": false,
    });

</script>


