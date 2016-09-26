<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Blibliotheque - Dashboard</title>
@section('css')
	<link href="{{ asset('lumino/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('lumino/css/datepicker3.css') }}" rel="stylesheet">
	<link href="{{ asset('lumino/css/styles.css') }}" rel="stylesheet">

	<!--Icons-->
	<script src="{{ asset('lumino/js/lumino.glyphs.js') }}"></script>
@show


<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body ng-app="app">
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		@include('partials/_headerBack')
	</nav>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		@include('partials/_leftsideBack')

	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    @section('content')

    @show

  </div>	<!--/.main-->

	{{-- <script src="{{ asset('lumino/js/jquery-1.11.1.min.js') }}"></script> --}}
  <script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
	<script src="{{ asset('lumino/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('lumino/js/chart.min.js') }}"></script>
	<script src="{{ asset('lumino/js/easypiechart.js') }}"></script>
	<script src="{{ asset('lumino/js//bootstrap-datepicker.js') }}"></script>


  <script src="https://opensource.keycdn.com/angularjs/1.5.8/angular.min.js "></script>
  {{-- angular app --}}
  <script src="{{ asset('js/app.js') }}"></script>
  {{-- angular controller --}}
  <script src="{{ asset('js/livreFormaulaireController.js') }}"></script>
  <script src="{{ asset('js/auteurFormaulaireController.js') }}"></script>
  <script src="{{ asset('js/livreEditController.js') }}"></script>
  <script src="{{ asset('js/DashboardController.js') }}"></script>
  <script src="{{ asset('mask/js/jquery.mask.min.js') }}"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$('.date').mask('00/00/0000',{placeholder: "__/__/____"});
		$('.money').mask('000.000.000.000.000.00', {reverse: true},{placeholder: "XX.XX€"});
		$('.ean').mask('000-0000000000', {placeholder: "000-0000000000"});
		$('.isbn').mask('00000000000000000', {reverse: true},{placeholder: "00000000000"});
		$('.deuxdigit').mask('00');
		});
	</script>
</body>

</html>
