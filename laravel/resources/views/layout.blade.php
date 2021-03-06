<!DOCTYPE html>
<html>
    <head>
        <title>Blibliotheque</title>
        @section('css')
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Exo+2|Monoton|Oswald|Ruslan+Display" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap-theme.min.css') }}">
        <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/stylefront.css') }}">
        @show
    </head>
    <body ng-app="app">

      @include('partials/_header')

      <div class="container-fluid" id="front">
        <div class="row">

          @include('partials/_leftside')

          <div class="col-sm-12 col-md-8 col-lg-8">
            @section('content')

            @show
          </div>
        </div>
      </div>

      <script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
      {{-- angular --}}
      <script src="{{ asset('bower_components/angular/angular.min.js') }}"></script>
      <script src="{{ asset('bower_components/angular-route/angular-route.min.js') }}"></script>
      {{-- momentjs --}}
      <script src="{{ asset('bower_components/moment/min/moment-with-locales.min.js') }}"></script>
      {{-- angular app --}}
      <script src="{{ asset('js/app.js') }}"></script>
      {{-- angular controller --}}
      <script src="{{ asset('js/front/FrontController.js') }}"></script>
      {{-- angular route --}}
      <script src="{{ asset('js/route/routing.js') }}"></script>
      {{-- bootstrap js --}}
      <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    </body>
</html>
