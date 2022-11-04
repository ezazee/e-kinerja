<footer class="footer mt-3">© 2020 E-kinerja by PT.GRAHA KARA DIGITAL</footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="/assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="/assets/node_modules/popper/popper.min.js"></script>
<script src="/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="/dist/js/perfect-scrollbar.jquery.min.js"></script>
<!--Wave Effects -->
<script src="/dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="/dist/js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
<script src="/assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
<!-- Chart JS -->
<script src="/assets/node_modules/Chart.js/chartjs.init.js"></script>
<script src="/assets/node_modules/Chart.js/Chart.min.js"></script>
<!--Custom JavaScript -->
<script src="/dist/js/custom.min.js"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<script src="/assets/node_modules/switchery/dist/switchery.min.js"></script>
<script src="/assets/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
<script src="/assets/node_modules/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
<script src="/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript">
</script>
<script src="/assets/node_modules/dff/dff.js" type="text/javascript"></script>
<script type="text/javascript" src="/assets/node_modules/multiselect/js/jquery.multi-select.js"></script>
<script src="/assets/node_modules/toast-master/js/jquery.toast.js"></script>
<script src="/dist/js/pages/toastr.js"></script>

<!-- Clock Plugin JavaScript -->
<script src="/assets/node_modules/clockpicker/dist/jquery-clockpicker.min.js"></script>
<!-- Date Picker Plugin JavaScript -->
<script src="/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<!-- Date range Plugin JavaScript -->
<script src="/assets/node_modules/timepicker/bootstrap-timepicker.min.js"></script>
<script src="/assets/node_modules/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- This is data table -->
<script src="/assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<!-- end - This is for export functionality only -->
<!-- jQuery peity -->
<script src="/assets/node_modules/tablesaw/dist/tablesaw.jquery.js"></script>
<script src="/assets/node_modules/tablesaw/dist/tablesaw-init.js"></script>
<!-- wysuhtml5 Plugin JavaScript -->
<script src="/assets/node_modules/tinymce/tinymce.min.js"></script>
<script>
    /// JS PT GRAHA KARA DIGITAL
    // Date Picker
    $(function() {
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
        });


    });

    $('body').tooltip({
        selector: '[data-toggle="tooltip"]'
    });

    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('txt').innerHTML =
            h + ":" + m + ":" + s;
        var t = setTimeout(startTime, 500);

    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i
        }; // add zero in front of numbers < 10
        return i;
    }
</script>
</body>

</html>