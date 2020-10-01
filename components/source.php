<link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
<link href="assets/demo/demo.css" rel="stylesheet" />
<!-- Core JS Files -->
<script src="assets/js/core/jquery.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap-material-design.min.js"></script>
<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Plugin for the momentJs  -->
<script src="assets/js/plugins/moment.min.js"></script>
<!-- Forms Validations Plugin -->
<script src="assets/js/plugins/jquery.validate.min.js"></script>
<!-- DataTable -->
<link rel="stylesheet" type="text/css" href="plugin/datatable/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="plugin/datatable/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="plugin/datatable/dataTables.responsive.min.js"></script>
<script type="text/javascript" charset="utf8" src="plugin/datatable/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="assets/js/plugins/jquery.bootstrap-wizard.js"></script>
<!-- Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="assets/js/plugins/bootstrap-selectpicker.js"></script>
<!-- Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="assets/js/plugins/bootstrap-tagsinput.js"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="assets/js/plugins/jasny-bootstrap.min.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="assets/js/plugins/nouislider.min.js"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<!-- Library for adding dinamically elements -->
<script src="assets/js/plugins/arrive.min.js"></script>
<!-- Notifications Plugin -->
<script src="assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/demo/demo.js"></script>
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Kanit:300&display=swap" rel="stylesheet">
<!-- FullCalendar -->
<link href='plugin/fullcalendar/packages/core/main.css' rel='stylesheet' />
<link href='plugin/fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
<link href='plugin/fullcalendar/packages/timegrid/main.css' rel='stylesheet' />
<link href='plugin/fullcalendar/packages/list/main.css' rel='stylesheet' />
<script src='plugin/fullcalendar/packages/core/main.js'></script>
<script src='plugin/fullcalendar/packages/interaction/main.js'></script>
<script src='plugin/fullcalendar/packages/daygrid/main.js'></script>
<script src='plugin/fullcalendar/packages/timegrid/main.js'></script>
<script src='plugin/fullcalendar/packages/list/main.js'></script>
<!-- DatePicker -->
<link rel="stylesheet" href="plugin/datepicker/jquery.datetimepicker.css">
<script type="text/javascript" charset="utf8" src="plugin/datepicker/jquery.datetimepicker.full.js"></script>
<!-- SweetAlert -->
<script src="plugin/sweetalert/sweetalert.min.js"></script>
<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/4.14.1/basic/ckeditor.js"></script>
<!-- Autocomplete -->
<script type="text/javascript" charset="utf8" src="plugin/autocomplete/autocomplete.js"></script>
<link rel="stylesheet" href="plugin/autocomplete/autocomplete.css">
<!-- ChartJS -->
<script src="plugin/chart.js/Chart.min.js"></script>
<!-- Select2 -->
<link href="plugin/select2/select2.min.css" rel="stylesheet" />
<script src="plugin/select2/select2.min.js"></script>
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="plugin/icheck-bootstrap/icheck-bootstrap.min.css">
<script>
$(document).ready(function() {
    $('#tableList').DataTable({
        responsive: true,
        order: [
            [0, "desc"]
        ]
    });
});
$(document).ready(function() {
    var table = $('#reportTable').DataTable({
        responsive: true,
        "pageLength": 20,
        "lengthMenu": [
            [20, 50, 100, -1],
            [20, 50, 100, "All"]
        ],
        dom: 'Bfrtip',
        buttons: [{
            extend: 'excel',
            text: '<i class="fa fa-file-excel"></i> บันทึกเป็นไฟล์ Excel',
            className: "btn btn-success btn-sm",
        }],
    });
});

$(document).ready(function() {
    $('#timelist').DataTable({
        responsive: true,
        paging: true,
        info: false,
        searching: false,
        order: [
            [0, "desc"]
        ],
        lengthMenu: [
            [10],
        ],
        bLengthChange: false,
    });
});

$(document).ready(function() {
    $('#lostlist').DataTable({
        responsive: true,
        paging: true,
        info: false,
        searching: false,
        order: [
            [0, "asc"]
        ],
        lengthMenu: [
            [10],
        ],
        bLengthChange: false,
    });
});
</script>