<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap-theme.min.css') }}">

        <meta name="csrf-token" value="{{ csrf_token() }}">
    </head>
    <body ng-app="app">

      @include('partials/_header')

      <div class="container-fluid">
        <div class="row">

          @include('partials/_leftside')

          <div class="col-sm-9 col-md-6 col-lg-6">
            @section('content')

            @show
          </div>
        </div>
      </div>

      <script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
      <script src="https://opensource.keycdn.com/angularjs/1.5.8/angular.min.js "></script>
      {{-- angular app --}}
      <script src="{{ asset('js/app.js') }}"></script>
      {{-- angular controller --}}
      <script src="{{ asset('js/livreFormaulaireController.js') }}"></script>
      <script src="{{ asset('js/auteurFormaulaireController.js') }}"></script>
      {{-- bootstrap js --}}
      <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    </body>
</html>
