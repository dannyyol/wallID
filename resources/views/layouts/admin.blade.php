<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>Wall-ID | Admin Dashboard</title>

   <!-- Styles -->
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">

   <link rel="stylesheet" href="{{asset('vendors/feather/feather.css')}}">
  	<link rel="stylesheet" href="{{asset('vendors/ti-icons/css/themify-icons.css')}}">
  	<link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
  	<link rel="stylesheet" href="/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="/vendors/datatables.net-bs4/select.dataTables.min.css">
	  
	<!-- End plugin css for this page -->
	<link rel="stylesheet" href="/css/vendor/vertical-layout-light/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

	<link rel="shortcut icon" href="/images/favicon.png" />

</head>
<body>

	<div class="container-scroller" id="app">

		<vue-confirm-dialog></vue-confirm-dialog>
    	<notifications></notifications>

		@include('admin/partials/navbar')

		<main class="container-fluid page-body-wrapper">
			@include('admin/partials/sidebar')
			@yield('content')
		</main>

	</div>

  	<!-- Vendor Scripts -->
  	<script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
	<script src="/vendors/datatables.net/jquery.dataTables.js"></script>
	<script src="/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
	<script src="/vendors/js/dataTables.select.min.js"></script>
	<script src="/vendors/js/off-canvas.js"></script>
	<script src="/vendors/js/hoverable-collapse.js"></script>
	<script src="/vendors/js/template.js"></script>

	<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="/vendors/js/vendor.bundle.base.js"></script>

    <!-- End custom js for this page-->
    <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
</body>
</html>