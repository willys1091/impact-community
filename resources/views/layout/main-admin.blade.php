<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Impact Community Indonesia - Admin</title>
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/Logo_only.png')}}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="{{asset('vendor/fontawesome/css/all.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets_admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets_admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets_admin/plugins/jqvmap/jqvmap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets_admin/dist/css/adminlte.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets_admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets_admin/plugins/daterangepicker/daterangepicker.css')}}">
	<link rel="stylesheet" href="{{asset('assets_admin/plugins/summernote/summernote-bs4.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets_admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets_admin/plugins/select2/css/select2.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets_admin/plugins/pace-progress/themes/black/pace-theme-flat-top.css')}}">
	<link rel="stylesheet" href="{{asset('assets_admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
	<link rel="stylesheet" href="{{asset('assets_admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/venobox/1.8.6/venobox.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    @yield('additional_head')
    <link rel="stylesheet" href="{{asset('assets_admin/custom.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		@include('layout.menu-admin')
		@yield('content-wrapper')
		<div class="modal fade" id="myModal"><div class="modal-dialog modal-lg"><div class="modal-content"></div></div></div>   
		<footer class="main-footer">
			<strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">Impact Comunity Indonesia</a>.</strong> All rights reserved.
			<div class="float-right d-none d-sm-inline-block"><b>Version</b> 2.1.0</div>
		</footer>
		<aside class="control-sidebar control-sidebar-dark"></aside>
	</div>
<script src="{{asset('assets_admin/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets_admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets_admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets_admin/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('assets_admin/plugins/sparklines/sparkline.js')}}"></script>
<script src="{{asset('assets_admin/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('assets_admin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{asset('assets_admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<script src="{{asset('assets_admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('assets_admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('assets_admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('assets_admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('assets_admin/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('assets_admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{asset('assets_admin/dist/js/adminlte.js')}}"></script>
<script src="{{asset('assets_admin/dist/js/demo.js')}}"></script>
<script src="{{asset('assets_admin/dist/js/pages/dashboard.js')}}"></script>
<script>$.widget.bridge('uibutton', $.ui.button)</script>
@yield('additional_script')
<script>
	$(".numonly").on("keypress keyup blur",function (event) {
		$(this).val($(this).val().replace(/[^\d].+/, ""));
			if ((event.which < 48 || event.which > 57)) {
			event.preventDefault();
		}
	});

	$('#myModal').on('shown.bs.modal', function() {
		$('input:text:visible:first', this).trigger('focus');
	});
</script>
</body>
</html>
